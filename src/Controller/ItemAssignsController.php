<?php
namespace App\Controller;

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
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $itemAssign = $this->ItemAssigns->patchEntity($itemAssign, $data);
            if ($this->ItemAssigns->save($itemAssign)) {
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
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $itemAssign = $this->ItemAssigns->patchEntity($itemAssign, $data);
            if ($this->ItemAssigns->save($itemAssign)) {
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

    /**
     * Delete method
     *
     * @param string|null $id Item Assign id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $itemAssign = $this->ItemAssigns->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $itemAssign = $this->ItemAssigns->patchEntity($itemAssign, $data);
        if ($this->ItemAssigns->save($itemAssign)) {
            $this->Flash->success('The item assign has been deleted.');
        } else {
            $this->Flash->error('The item assign could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
