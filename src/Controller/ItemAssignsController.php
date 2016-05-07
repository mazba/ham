<?php
namespace App\Controller;

use Cake\Core\Configure;

/**
 * ItemAssigns Controller
 *
 * @property \App\Model\Table\ItemAssignsTable $ItemAssigns
 */
class ItemAssignsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'ItemAssigns.title' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $itemAssigns = $this->ItemAssigns->find('all', [
            'conditions' => ['ItemAssigns.status !=' => 99],
            'contain' => ['Offices', 'OfficeBuildings', 'OfficeRooms', 'OfficeWarehouses', 'OfficeUnits', 'Designations', 'DesignatedUsers', 'Items']
        ]);
        $this->set('itemAssigns', $this->paginate($itemAssigns));
        $this->set('roles', $this->roles[strtolower($this->request->param('controller'))]);
        $this->set('_serialize', ['itemAssigns']);
    }

    /**
     * View method
     *
     * @param string|null $id Item Assign id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $itemAssign = $this->ItemAssigns->get($id, [
            'contain' => ['Offices', 'OfficeBuildings', 'OfficeRooms', 'OfficeWarehouses', 'OfficeUnits', 'Designations', 'DesignatedUsers', 'Items']
        ]);
        $this->set('itemAssign', $itemAssign);
        $this->set('_serialize', ['itemAssign']);
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
        $itemAssign = $this->ItemAssigns->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $this->loadModel('Items');
            $item_id = $data['item_id'];

            $item = $this->Items->get($item_id);
            $itemUpdateData['quantity'] = $item['quantity']-$data['quantity'];
            $itemUpdateData['update_by'] = $user['id'];
            $itemUpdateData['update_date'] = $time;

            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            if (!isset($data['office_id'])) {
                $data['office_id'] = $user['office_id'];
            }

            $itemAssign = $this->ItemAssigns->patchEntity($itemAssign, $data);
            $itemUpdate = $this->Items->patchEntity($item, $itemUpdateData);

            if ($this->ItemAssigns->save($itemAssign) && $this->Items->save($itemUpdate)) {
                $this->Flash->success('The item assign has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The item assign could not be saved. Please, try again.');
            }
        }

        if ($user['user_group_id'] == Configure::read('user_group.super_admin')) {
            $offices = $this->ItemAssigns->Offices->find('list', ['conditions' => ['status' => 1]]);
            $this->set(compact('offices'));
        } else {
            $officeBuildings = $this->ItemAssigns->OfficeBuildings->find('list', ['conditions' => ['status' => 1, 'office_id' => $user['office_id']]]);
//            $officeRooms = $this->ItemAssigns->OfficeRooms->find('list', ['conditions' => ['status' => 1, 'office_id' => $user['office_id']]]);
            $officeWarehouses = $this->ItemAssigns->OfficeWarehouses->find('list', ['conditions' => ['status' => 1, 'office_id' => $user['office_id']]]);
            $officeUnits = $this->ItemAssigns->OfficeUnits->find('list', ['conditions' => ['status' => 1, 'office_id' => $user['office_id']]]);
//            $designations = $this->ItemAssigns->Designations->find('list', ['conditions' => ['status' => 1, 'office_id' => $user['office_id']]]);
//            $designatedUsers = $this->ItemAssigns->DesignatedUsers->find('list', ['conditions' => ['status' => 1, 'office_id' => $user['office_id']]]);
        }

        $this->loadModel('ItemCategories');
        $itemCategories = $this->ItemCategories->find('list', ['conditions' => ['status' => 1, 'parent_id' => 0]]);
        $this->set(compact('itemAssign', 'officeBuildings', 'officeWarehouses', 'officeUnits', 'itemCategories'));
        $this->set('_serialize', ['itemAssign']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Assign id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $itemAssign = $this->ItemAssigns->get($id, [
            'contain' => []
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {

            $data = $this->request->data;
            $this->loadModel('Items');
            $item_id = $data['item_id'];

            $item = $this->Items->get($item_id);
            if($itemAssign['quantity'] != $data['quantity'])
            {
                if($data['quantity']>$itemAssign['quantity'])
                {
                    $itemUpdateData['quantity'] = $item['quantity']-($data['quantity']-$itemAssign['quantity']);
                }
                else
                {
                    $itemUpdateData['quantity'] = $item['quantity']+($itemAssign['quantity']-$data['quantity']);
                }
            }
            else
            {
                $itemUpdateData['quantity'] = $item['quantity'];
            }

            $itemUpdateData['update_by'] = $user['id'];
            $itemUpdateData['update_date'] = $time;

            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $itemAssign = $this->ItemAssigns->patchEntity($itemAssign, $data);
            $itemUpdate = $this->Items->patchEntity($item, $itemUpdateData);

            if ($this->ItemAssigns->save($itemAssign) && $this->Items->save($itemUpdate)) {
                $this->Flash->success('The item assign has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The item assign could not be saved. Please, try again.');
            }
        }
        $offices = $this->ItemAssigns->Offices->find('list', ['conditions' => ['status' => 1]]);
        $officeBuildings = $this->ItemAssigns->OfficeBuildings->find('list', ['conditions' => ['status' => 1]]);
        $officeRooms = $this->ItemAssigns->OfficeRooms->find('list', ['conditions' => ['status' => 1]]);
        $officeWarehouses = $this->ItemAssigns->OfficeWarehouses->find('list', ['conditions' => ['status' => 1]]);
        $officeUnits = $this->ItemAssigns->OfficeUnits->find('list', ['conditions' => ['status' => 1]]);
        $designations = $this->ItemAssigns->Designations->find('list', ['conditions' => ['status' => 1]]);
        $designatedUsers = $this->ItemAssigns->DesignatedUsers->find('list', ['conditions' => ['status' => 1]]);
        $items = $this->ItemAssigns->Items->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('itemAssign', 'offices', 'officeBuildings', 'officeRooms', 'officeWarehouses', 'officeUnits', 'designations', 'designatedUsers', 'items'));
        $this->set('_serialize', ['itemAssign']);
    }

    public function ajax($action = null)
    {
        if ($action == 'get_office_buliding') {

            $this->loadModel('OfficeBuildings');
            $lists = $this->OfficeBuildings->find('list', ['conditions' => ['office_id' => $this->request->data('office_id')]]);
            $this->response->body(json_encode($lists));
            return $this->response;

        } else if ($action == 'get_office_units') {

            $this->loadModel('OfficeUnits');
            $lists = $this->OfficeUnits->find('list', ['conditions' => ['office_id' => $this->request->data('office_id')]]);
            $this->response->body(json_encode($lists));
            return $this->response;

        } else if ($action == 'get_warehouses') {

            $this->loadModel('OfficeWarehouses');
            $lists = $this->OfficeWarehouses->find('list', ['conditions' => ['office_id' => $this->request->data('office_id')]]);
            $this->response->body(json_encode($lists));
            return $this->response;

        } else if ($action == 'get_rooms') {

            $user = $this->Auth->user();
            $this->loadModel('OfficeRooms');

            if ($user['user_group_id'] == Configure::read('user_group.super_admin')) {
                $lists = $this->OfficeRooms->find('list', ['conditions' => ['office_id' => $this->request->data('office_id'), 'office_building_id' => $this->request->data('office_building_id')]]);
            } else {
                $lists = $this->OfficeRooms->find('list', ['conditions' => ['office_id' => $user['office_id'], 'office_building_id' => $this->request->data('office_building_id')]]);
            }
            $this->response->body(json_encode($lists));
            return $this->response;

        } else if ($action == 'get_unit_designation') {

            $user = $this->Auth->user();
            $this->loadModel('OfficeUnitDesignations');
            if ($user['user_group_id'] == Configure::read('user_group.super_admin')) {
                $lists = $this->OfficeUnitDesignations->find('list', ['conditions' => ['office_unit_id' => $this->request->data('office_unit_id'), 'office_id' => $this->request->data('office_id')]]);
            } else {
                $lists = $this->OfficeUnitDesignations->find('list', ['conditions' => ['office_unit_id' => $this->request->data('office_unit_id'), 'office_id' => $user['office_id']]]);
            }
            $this->response->body(json_encode($lists));
            return $this->response;

        } else if ($action == 'get_unit_designated_user') {

            $user = $this->Auth->user();
            $this->loadModel('UserDesignations');
            if ($user['user_group_id'] == Configure::read('user_group.super_admin')) {
                $lists = $this->UserDesignations->find('all', ['contain' => ['Users'], 'conditions' => ['UserDesignations.designation_id' => $this->request->data('office_unit_designation_id'), 'UserDesignations.office_id' => $this->request->data('office_id'), 'UserDesignations.is_basic' => 0]])->select(['Users.id', 'Users.full_name_bn'])->toArray();
            } else {
                $lists = $this->UserDesignations->find('all', ['contain' => ['Users'], 'conditions' => ['UserDesignations.designation_id' => $this->request->data('office_unit_designation_id'), 'UserDesignations.office_id' => $user['office_id'], 'UserDesignations.is_basic' => 0]])->select(['Users.id', 'Users.full_name_bn'])->toArray();
            }

            $this->response->body(json_encode($lists));
            return $this->response;

        } else if ($action == 'getItemCategories') {

            $user = $this->Auth->user();
            $this->loadModel('ItemCategories');
            if ($user['user_group_id'] == Configure::read('user_group.super_admin')) {
                $itemCategories = $this->ItemCategories->find('list', ['conditions' => ['parent_id' => $this->request->data('type_id'), 'status' => 1]])->toArray();
                if (empty($itemCategories)) {
                    $this->loadModel('Items');
                    $items = $this->Items->find('list', ['conditions' => ['office_warehouse_id' => $this->request->data('warehouse_id'), 'item_category_id' => $this->request->data('type_id'), 'office_id' => $this->request->data('office_id')]]);
                    $this->response->body(json_encode($items));
                    return $this->response;
                } else {
                    $this->viewBuilder()->layout('ajax');
                    $this->set(compact('itemCategories', 'action'));
                    $this->render('/Items/ajax');
                }
            } else {
                $itemCategories = $this->ItemCategories->find('list', ['conditions' => ['parent_id' => $this->request->data('type_id'), 'status' => 1]])->toArray();
                if (empty($itemCategories)) {
                    $this->loadModel('Items');
                    $items = $this->Items->find('list', ['conditions' => ['office_warehouse_id' => $this->request->data('warehouse_id'), 'item_category_id' => $this->request->data('type_id'), 'office_id' => $user['office_id']]]);
                    $this->response->body(json_encode($items));
                    return $this->response;
                } else {
                    $this->viewBuilder()->layout('ajax');
                    $this->set(compact('itemCategories', 'action'));
                    $this->render('/Items/ajax');
                }
            }


        }

    }
}
