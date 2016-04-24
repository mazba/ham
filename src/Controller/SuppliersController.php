<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suppliers Controller
 *
 * @property \App\Model\Table\SuppliersTable $Suppliers
 */
class SuppliersController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'Suppliers.title' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
			$suppliers = $this->Suppliers->find('all', [
	'conditions' =>['Suppliers.status !=' => 99],
	'contain' => ['ParentSuppliers', 'Offices']
	]);
		$this->set('suppliers', $this->paginate($suppliers) );
	$this->set('_serialize', ['suppliers']);
	}

    /**
     * View method
     *
     * @param string|null $id Supplier id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $supplier = $this->Suppliers->get($id, [
            'contain' => ['ParentSuppliers', 'Offices']
        ]);
        $this->set('supplier', $supplier);
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user=$this->Auth->user();
        $time=time();
        $supplier = $this->Suppliers->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_time']=$time;
            $data['office_id']=$user['office_id'];
            $supplier = $this->Suppliers->patchEntity($supplier, $data);
            if ($this->Suppliers->save($supplier))
            {
                $this->Flash->success('The supplier has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The supplier could not be saved. Please, try again.');
            }
        }
        $parentSuppliers = $this->Suppliers->ParentSuppliers->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('supplier', 'parentSuppliers', 'offices'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Supplier id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $supplier = $this->Suppliers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_time']=$time;
            $supplier = $this->Suppliers->patchEntity($supplier, $data);
            if ($this->Suppliers->save($supplier))
            {
                $this->Flash->success('The supplier has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The supplier could not be saved. Please, try again.');
            }
        }
        $parentSuppliers = $this->Suppliers->ParentSuppliers->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('supplier', 'parentSuppliers', 'offices'));
        $this->set('_serialize', ['supplier']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Supplier id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $supplier = $this->Suppliers->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $supplier = $this->Suppliers->patchEntity($supplier, $data);
        if ($this->Suppliers->save($supplier))
        {
            $this->Flash->success('The supplier has been deleted.');
        }
        else
        {
            $this->Flash->error('The supplier could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
