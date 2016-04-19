<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * SupplierDealingDetails Controller
 *
 * @property \App\Model\Table\SupplierDealingDetailsTable $SupplierDealingDetails
 */
class SupplierDealingDetailsController extends AppController
{

    public $paginate = [
        'limit' => 15,
        'order' => [
            'SupplierDealingDetails.id' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $supplierDealingDetails = $this->SupplierDealingDetails->find('all', [
            'conditions' => ['SupplierDealingDetails.status !=' => 99],
            'contain' => ['Committees', 'Users', 'ItemCategories']
        ]);
        $this->set('supplierDealingDetails', $this->paginate($supplierDealingDetails));
        $this->set('_serialize', ['supplierDealingDetails']);
    }

    /**
     * View method
     *
     * @param string|null $id Supplier Dealing Detail id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Auth->user();
        $supplierDealingDetail = $this->SupplierDealingDetails->get($id, [
            'contain' => ['Committees', 'Users', 'ItemCategories']
        ]);
        $this->set('supplierDealingDetail', $supplierDealingDetail);
        $this->set('_serialize', ['supplierDealingDetail']);
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
        $supplierDealingDetail = $this->SupplierDealingDetails->newEntity();
        if ($this->request->is('post')) {

            $data = $this->request->data;
            $data['create_by'] = $user['id'];
            $data['create_date'] = $time;
            $supplierDealingDetail = $this->SupplierDealingDetails->patchEntity($supplierDealingDetail, $data);
            if ($this->SupplierDealingDetails->save($supplierDealingDetail)) {
                $this->Flash->success('The supplier dealing detail has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The supplier dealing detail could not be saved. Please, try again.');
            }
        }
        $committees = $this->SupplierDealingDetails->Committees->find('list', ['conditions' => ['status' => 1]]);
        $users = $this->SupplierDealingDetails->Users->find('list', ['conditions' => ['status' => 1]]);
        $itemCategories = $this->SupplierDealingDetails->ItemCategories->find('list', ['conditions' => ['status' => 1]]);
        $manufacturers = TableRegistry::get('manufacturers')->find('list', ['conditions' => ['status' => 1]]);
        $offices = TableRegistry::get('offices')->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('supplierDealingDetail', 'committees', 'users', 'itemCategories','manufacturers','offices'));
        $this->set('_serialize', ['supplierDealingDetail']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier Dealing Detail id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $supplierDealingDetail = $this->SupplierDealingDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $supplierDealingDetail = $this->SupplierDealingDetails->patchEntity($supplierDealingDetail, $data);
            if ($this->SupplierDealingDetails->save($supplierDealingDetail)) {
                $this->Flash->success('The supplier dealing detail has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The supplier dealing detail could not be saved. Please, try again.');
            }
        }
        $committees = $this->SupplierDealingDetails->Committees->find('list', ['conditions' => ['status' => 1]]);
        $users = $this->SupplierDealingDetails->Users->find('list', ['conditions' => ['status' => 1]]);
        $itemCategories = $this->SupplierDealingDetails->ItemCategories->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('supplierDealingDetail', 'committees', 'users', 'itemCategories'));
        $this->set('_serialize', ['supplierDealingDetail']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier Dealing Detail id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $supplierDealingDetail = $this->SupplierDealingDetails->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $supplierDealingDetail = $this->SupplierDealingDetails->patchEntity($supplierDealingDetail, $data);
        if ($this->SupplierDealingDetails->save($supplierDealingDetail)) {
            $this->Flash->success('The supplier dealing detail has been deleted.');
        } else {
            $this->Flash->error('The supplier dealing detail could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
