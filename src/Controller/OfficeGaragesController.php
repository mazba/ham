<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * OfficeGarages Controller
 *
 * @property \App\Model\Table\OfficeGaragesTable $OfficeGarages
 */
class OfficeGaragesController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'OfficeGarages.title' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $officeGarages = $this->OfficeGarages->find('all', [
            'conditions' => ['OfficeGarages.status !=' => 99],
            'contain' => ['Offices', 'OfficeBuildings', 'OfficeRooms']
        ]);
        $this->set('officeGarages', $this->paginate($officeGarages));
        $this->set('_serialize', ['officeGarages']);
    }

    /**
     * View method
     *
     * @param string|null $id Office Garage id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $officeGarage = $this->OfficeGarages->get($id, [
            'contain' => ['Offices', 'OfficeBuildings', 'OfficeRooms']
        ]);
        $this->set('officeGarage', $officeGarage);
        $this->set('_serialize', ['officeGarage']);
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
        $officeGarage = $this->OfficeGarages->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $officeGarage = $this->OfficeGarages->patchEntity($officeGarage, $data);
            if ($this->OfficeGarages->save($officeGarage)) {
                $this->Flash->success('The office garage has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The office garage could not be saved. Please, try again.');
            }
        }
        $offices = $this->OfficeGarages->Offices->find('list');
        $officeBuildings = $this->OfficeGarages->OfficeBuildings->find('list');
        $officeRooms = $this->OfficeGarages->OfficeRooms->find('list');
        $this->set(compact('officeGarage', 'offices', 'officeBuildings', 'officeRooms'));
        $this->set('_serialize', ['officeGarage']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Office Garage id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $officeGarage = $this->OfficeGarages->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $officeGarage = $this->OfficeGarages->patchEntity($officeGarage, $data);
            if ($this->OfficeGarages->save($officeGarage)) {
                $this->Flash->success('The office garage has been updated.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The office garage could not be updated. Please, try again.');
            }
        }
        $offices = $this->OfficeGarages->Offices->find('list');
        $officeBuildings = $this->OfficeGarages->OfficeBuildings->find('list');
        $officeRooms = $this->OfficeGarages->OfficeRooms->find('list');
        $this->set(compact('officeGarage', 'offices', 'officeBuildings', 'officeRooms'));
        $this->set('_serialize', ['officeGarage']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Office Garage id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $officeGarage = $this->OfficeGarages->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $officeGarage = $this->OfficeGarages->patchEntity($officeGarage, $data);
        if ($this->OfficeGarages->save($officeGarage)) {
            $this->Flash->success('The office garage has been deleted.');
        } else {
            $this->Flash->error('The office garage could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
