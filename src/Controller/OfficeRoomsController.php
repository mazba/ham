<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OfficeRooms Controller
 *
 * @property \App\Model\Table\OfficeRoomsTable $OfficeRooms
 */
class OfficeRoomsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'OfficeRooms.title' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $officeRooms = $this->OfficeRooms->find('all', [
            'conditions' => ['OfficeRooms.status !=' => 99],
            'contain' => ['ParentOfficeRooms', 'Offices', 'OfficeBuildings', 'OfficeUnits']
        ]);
        $this->set('officeRooms', $this->paginate($officeRooms));
        $this->set('_serialize', ['officeRooms']);
    }

    /**
     * View method
     *
     * @param string|null $id Office Room id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $officeRoom = $this->OfficeRooms->get($id, [
            'contain' => ['ParentOfficeRooms', 'Offices', 'OfficeBuildings', 'OfficeUnits', 'ItemAssigns', 'OfficeGarages', 'ChildOfficeRooms', 'OfficeWarehouses']
        ]);
        $this->set('officeRoom', $officeRoom);
        $this->set('_serialize', ['officeRoom']);
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
        $officeRoom = $this->OfficeRooms->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $officeRoom = $this->OfficeRooms->patchEntity($officeRoom, $data);
            if ($this->OfficeRooms->save($officeRoom)) {
                $this->Flash->success('The office room has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The office room could not be saved. Please, try again.');
            }
        }
        $parentOfficeRooms = $this->OfficeRooms->ParentOfficeRooms->find('list', ['limit' => 200]);
        $offices = $this->OfficeRooms->Offices->find('list', ['limit' => 200]);
        $officeBuildings = $this->OfficeRooms->OfficeBuildings->find('list', ['limit' => 200]);
        $officeUnits = $this->OfficeRooms->OfficeUnits->find('list', ['limit' => 200]);
        $this->set(compact('officeRoom', 'parentOfficeRooms', 'offices', 'officeBuildings', 'officeUnits'));
        $this->set('_serialize', ['officeRoom']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Office Room id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $officeRoom = $this->OfficeRooms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $officeRoom = $this->OfficeRooms->patchEntity($officeRoom, $data);
            if ($this->OfficeRooms->save($officeRoom)) {
                $this->Flash->success('The office room has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The office room could not be saved. Please, try again.');
            }
        }
        $parentOfficeRooms = $this->OfficeRooms->ParentOfficeRooms->find('list', ['limit' => 200]);
        $offices = $this->OfficeRooms->Offices->find('list', ['limit' => 200]);
        $officeBuildings = $this->OfficeRooms->OfficeBuildings->find('list', ['limit' => 200]);
        $officeUnits = $this->OfficeRooms->OfficeUnits->find('list', ['limit' => 200]);
        $this->set(compact('officeRoom', 'parentOfficeRooms', 'offices', 'officeBuildings', 'officeUnits'));
        $this->set('_serialize', ['officeRoom']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Office Room id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $officeRoom = $this->OfficeRooms->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $officeRoom = $this->OfficeRooms->patchEntity($officeRoom, $data);
        if ($this->OfficeRooms->save($officeRoom)) {
            $this->Flash->success('The office room has been deleted.');
        } else {
            $this->Flash->error('The office room could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
