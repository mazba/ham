<?php
namespace App\Controller;

use Cake\Datasource\ConnectionManager;

/**
 * Items Controller
 *
 * @property \App\Model\Table\ItemsTable $Items
 */
class ItemsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'Items.id' => 'desc'
        ]
    ];

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('FileUpload');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $items = $this->Items->find('all', [
            'conditions' => ['Items.status' => 1],
            'contain' => ['ParentItems', 'Manufacturers', 'Suppliers', 'AssetNatures', 'AssetTypes', 'ItemCategories', 'Offices', 'OfficeWarehouses']
        ]);
        $this->set('items', $this->paginate($items));
        $this->set('_serialize', ['items']);
    }

    /**
     * View method
     *
     * @param string|null $id Item id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $item = $this->Items->get($id, [
            'contain' => ['ParentItems', 'Manufacturers', 'Suppliers', 'AssetNatures', 'AssetTypes', 'ItemCategories', 'Offices', 'OfficeWarehouses']
        ]);
        $this->set('item', $item);
        $this->set('_serialize', ['item']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Auth->user();
        $time = time();

        if ($this->request->is('post')) {


            try {
                $data = $this->request->data;
                $saveStatus = 0;
                $conn = ConnectionManager::get('default');

                $conn->transactional(function () use ($user, $time, $data, &$saveStatus) {

                    $data['create_by'] = $user['id'];
                    $data['create_date'] = $time;

                    //picture_file
                    $result = $this->FileUpload->upload_file($data['picture_file'], 'u_load/items', ['jpg', 'png']);
                    if ($result['status']) {
                        $data['picture_file'] = $result['file_path'];
                    } else {
                        if (isset($result['message'])) {
                            $this->Flash->error($result['message']);
                            return false;
                        }
                    }

                    //purchase_order_attach_file
                    $result = $this->FileUpload->upload_file($data['purchase_order_attach_file'], 'u_load/items', ['jpg', 'png', 'pdf']);
                    if ($result['status']) {
                        $data['purchase_order_attach_file'] = $result['file_path'];
                    } else {
                        if (isset($result['message'])) {
                            $this->Flash->error($result['message']);
                            return false;
                        }
                    }

                    for ($i = 0; $i < $data['quantity']; $i++) {
                        $item = $this->Items->newEntity();
                        $data['serial_number'] = $data['serial_number'][$i];
                        $data['office_serial_number'] = $data['office_serial_number'][$i];
                        $item = $this->Items->patchEntity($item, $data);
                        if (!$item = $this->Items->save($item)) {
                            if (file_exists(WWW_ROOT . DS . $data['picture_file'])) {
                                unlink(WWW_ROOT . DS . $data['picture_file']);
                            }
                            if (file_exists(WWW_ROOT . DS . $data['purchase_order_attach_file'])) {
                                unlink(WWW_ROOT . DS . $data['purchase_order_attach_file']);
                            }
                            return false;
                        }

                        if (isset($data['ItemVehicles'])) {
                            $this->loadModel('ItemVehicles');

                            $data['ItemVehicles']['office_id'] = $data['office_id'];
                            $data['ItemVehicles']['item_id'] = $item['id'];
                            $data['ItemVehicles']['create_time'] = $time;
                            $data['ItemVehicles']['create_by'] = $user['id'];
                            $itemVehicle = $this->ItemVehicles->newEntity();
                            $itemVehicle = $this->ItemVehicles->patchEntity($itemVehicle, $data['ItemVehicles']);
                            if (!$this->ItemVehicles->save($itemVehicle)) {
                                return false;
                            }
                        }

                        if (isset($data['ItemDocuments'])) {


                            $result = $this->FileUpload->upload_file($data['ItemDocuments']['attach_file'], 'u_load/item_documents', ['jpg', 'png', 'pdf']);
                            if ($result['status']) {
                                $data['ItemDocuments']['attach_file'] = $result['file_path'];
                            } else {
                                if (isset($result['message'])) {
                                    $this->Flash->error($result['message']);
                                    return false;
                                }
                            }
                            $data['ItemDocuments']['office_id'] = $data['office_id'];
                            $data['ItemDocuments']['item_id'] = $item['id'];
                            $data['ItemDocuments']['create_time'] = $time;
                            $data['ItemDocuments']['create_by'] = $user['id'];
                            $this->loadModel('ItemDocuments');
                            $itemDocument = $this->ItemDocuments->newEntity();
                            $itemDocument = $this->ItemDocuments->patchEntity($itemDocument, $data['ItemDocuments']);
                            /*echo "<pre>";
                            print_r($itemDocument);
                            echo "</pre>";
                            die;*/
                            if ($this->ItemDocuments->save($itemDocument)) {

                                if (file_exists(WWW_ROOT . DS . $data['ItemDocuments']['attach_file'])) {
                                    unlink(WWW_ROOT . DS . $data['ItemDocuments']['attach_file']);
                                }
                                return false;
                            }
                        }

                        if (isset($data['item_depreciations'])) {
                            $this->loadModel('ItemDepreciations');

                            $data['item_depreciations']['office_id'] = $data['office_id'];
                            $data['item_depreciations']['item_id'] = $item['id'];
                            $data['item_depreciations']['item_use_start_time'] = strtotime($data['item_depreciations']['item_use_start_time']);
                            $data['item_depreciations']['create_time'] = $time;
                            $data['item_depreciations']['create_by'] = $user['id'];
                            $itemDepreciation = $this->ItemDepreciations->newEntity();
                            $itemDepreciation = $this->ItemDepreciations->patchEntity($itemDepreciation, $data['item_depreciations']);
                            if (!$this->ItemDepreciations->save($itemDepreciation)) {
                                return false;
                            }
                        }

                        if (isset($data['item_maintenances'])) {
                            $this->loadModel('ItemMaintenances');

                            $data['item_maintenances']['office_id'] = $data['office_id'];
                            $data['item_maintenances']['item_id'] = $item['id'];
                            $data['item_maintenances']['supplier_id'] = $data['supplier_id'];
                            $data['item_maintenances']['create_time'] = $time;
                            $data['item_maintenances']['create_by'] = $user['id'];
                            $itemMaintenance = $this->ItemMaintenances->newEntity();
                            $itemMaintenance = $this->ItemMaintenances->patchEntity($itemMaintenance, $data['item_maintenances']);
                            if (!$this->ItemMaintenances->save($itemMaintenance)) {
                                return false;
                            }
                        }
                    }

                    $this->Flash->success('The item has been saved.');
                    return $this->redirect('/items');
                });


            } catch (\Exception $e) {
                $this->Flash->error('The item could not be saved. Please, try again.');
            }


        }

        $item = $this->Items->newEntity();
        $parentItems = $this->Items->ParentItems->find('list', ['conditions' => ['status' => 1]]);
        $parentItemDocuments = $this->Items->ItemDocuments->find('list', ['conditions' => ['status' => 1]]);
        $manufacturers = $this->Items->Manufacturers->find('list', ['conditions' => ['status' => 1]]);
        $suppliers = $this->Items->Suppliers->find('list', ['conditions' => ['status' => 1]]);
        $assetNatures = $this->Items->AssetNatures->find('list', ['conditions' => ['status' => 1, 'parent_id' => 0]]);
        $assetTypes = $this->Items->AssetTypes->find('list', ['conditions' => ['status' => 1, 'parent_id' => 0]]);
        $itemCategories = $this->Items->ItemCategories->find('list', ['conditions' => ['status' => 1, 'parent_id' => 0]]);
        $offices = $this->Items->Offices->find('list', ['conditions' => ['status' => 1]]);
        $officeWarehouses = $this->Items->OfficeWarehouses->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('item', 'parentItems', 'parentItemDocuments', 'manufacturers', 'suppliers', 'assetNatures', 'assetTypes', 'itemCategories', 'offices', 'officeWarehouses'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $item = $this->Items->patchEntity($item, $data);
            if ($this->Items->save($item)) {
                $this->Flash->success('The item has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The item could not be saved. Please, try again.');
            }
        }
        $parentItems = $this->Items->ParentItems->find('list', ['conditions' => ['status' => 1]]);
        $manufacturers = $this->Items->Manufacturers->find('list', ['conditions' => ['status' => 1]]);
        $suppliers = $this->Items->Suppliers->find('list', ['conditions' => ['status' => 1]]);
        $assetNatures = $this->Items->AssetNatures->find('list', ['conditions' => ['status' => 1]]);
        $assetTypes = $this->Items->AssetTypes->find('list', ['conditions' => ['status' => 1]]);
        $itemCategories = $this->Items->ItemCategories->find('list', ['conditions' => ['status' => 1]]);
        $offices = $this->Items->Offices->find('list', ['conditions' => ['status' => 1]]);
        $officeWarehouses = $this->Items->OfficeWarehouses->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('item', 'parentItems', 'manufacturers', 'suppliers', 'assetNatures', 'assetTypes', 'itemCategories', 'offices', 'officeWarehouses'));
        $this->set('_serialize', ['item']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $item = $this->Items->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $item = $this->Items->patchEntity($item, $data);
        if ($this->Items->save($item)) {
            $this->Flash->success('The item has been deleted.');
        } else {
            $this->Flash->error('The item could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function ajax($action = null)
    {
        if ($this->request->is('ajax')) {

            if ($action == 'getAssetNatures') {
                $this->loadModel('AssetNatures');
                $assetNatures = $this->AssetNatures->find('list', ['conditions' => ['parent_id' => $this->request->data('nature_id'), 'status' => 1]])->toArray();
                $this->viewBuilder()->layout('ajax');
                /*echo "<pre>";
                print_r($assetNatures->toArray());
                echo "</pre>";
                die;*/
                $this->set(compact('assetNatures', 'action'));
            }

            if ($action == 'getAssetTypes') {
                $this->loadModel('AssetTypes');
                $assetTypes = $this->AssetTypes->find('list', ['conditions' => ['parent_id' => $this->request->data('type_id'), 'status' => 1]])->toArray();
                $this->viewBuilder()->layout('ajax');
                $this->set(compact('assetTypes', 'action'));
            }

            if ($action == 'getItemCategories') {
                $this->loadModel('ItemCategories');
                $itemCategories = $this->ItemCategories->find('list', ['conditions' => ['parent_id' => $this->request->data('type_id'), 'status' => 1]])->toArray();
                $this->viewBuilder()->layout('ajax');
                $this->set(compact('itemCategories', 'action'));
            }


        }
    }
}
