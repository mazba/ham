<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OfficeBuildings Controller
 *
 * @property \App\Model\Table\OfficeBuildingsTable $OfficeBuildings
 */
class OfficeBuildingsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'OfficeBuildings.title' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $officeBuildings = $this->OfficeBuildings->find('all', [
            'conditions' => ['OfficeBuildings.status !=' => 99],
            'contain' => ['ParentOfficeBuildings', 'Offices']
        ]);
        $this->set('officeBuildings', $this->paginate($officeBuildings));
        $this->set('_serialize', ['officeBuildings']);
    }

    /**
     * View method
     *
     * @param string|null $id Office Building id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $officeBuilding = $this->OfficeBuildings->get($id, [
            'contain' => ['ParentOfficeBuildings', 'Offices', 'ItemAssigns', 'ChildOfficeBuildings', 'OfficeGarages', 'OfficeRooms', 'OfficeWarehouses']
        ]);
        $this->set('officeBuilding', $officeBuilding);
        $this->set('_serialize', ['officeBuilding']);
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
        $officeBuilding = $this->OfficeBuildings->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $officeBuilding = $this->OfficeBuildings->patchEntity($officeBuilding, $data);
            if ($this->OfficeBuildings->save($officeBuilding)) {
                $this->Flash->success('The office building has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The office building could not be saved. Please, try again.');
            }
        }
        $parentOfficeBuildings = $this->OfficeBuildings->ParentOfficeBuildings->find('list', ['limit' => 200]);
        $offices = $this->OfficeBuildings->Offices->find('list', ['limit' => 200]);
        $this->set(compact('officeBuilding', 'parentOfficeBuildings', 'offices'));
        $this->set('_serialize', ['officeBuilding']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Office Building id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $officeBuilding = $this->OfficeBuildings->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $officeBuilding = $this->OfficeBuildings->patchEntity($officeBuilding, $data);
            if ($this->OfficeBuildings->save($officeBuilding)) {
                $this->Flash->success('The office building has been updated.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The office building could not be updated. Please, try again.');
            }
        }
        $parentOfficeBuildings = $this->OfficeBuildings->ParentOfficeBuildings->find('list', ['limit' => 200]);
        $offices = $this->OfficeBuildings->Offices->find('list', ['limit' => 200]);
        $this->set(compact('officeBuilding', 'parentOfficeBuildings', 'offices'));
        $this->set('_serialize', ['officeBuilding']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Office Building id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $officeBuilding = $this->OfficeBuildings->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $officeBuilding = $this->OfficeBuildings->patchEntity($officeBuilding, $data);
        if ($this->OfficeBuildings->save($officeBuilding)) {
            $this->Flash->success('The office building has been deleted.');
        } else {
            $this->Flash->error('The office building could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
