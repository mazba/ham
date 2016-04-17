<?php
namespace App\Controller;

use App\Controller\AppController;

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
            'Items.title' => 'desc'
        ]
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
$items = $this->Items->find('all', [
            'conditions' =>['Items.status !=' => 99]
        ]);

        $items = $this->Items->find('all', [
            'conditions' =>['Items.status !=' => 99],
            'contain' => ['ParentItems', 'Manufacturers', 'Suppliers', 'AssetNatures', 'AssetTypes', 'ItemCategories', 'Offices', 'OfficeWarehouses']
        ]);
        $this->set('items', $this->paginate($items) );
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
        $user=$this->Auth->user();
        $item = $this->Items->get($id, [
            'contain' => ['ParentItems', 'Manufacturers', 'Suppliers', 'AssetNatures', 'AssetTypes', 'ItemCategories', 'Offices', 'OfficeWarehouses', 'ItemAssigns', 'ItemDepreciations', 'ItemDocuments', 'ItemMaintenanceHistories', 'ItemMaintenances', 'ItemVehicles', 'ChildItems']
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
        $user=$this->Auth->user();
        $time=time();
        $item = $this->Items->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $item = $this->Items->patchEntity($item, $data);
            if ($this->Items->save($item))
            {
                $this->Flash->success('The item has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item could not be saved. Please, try again.');
            }
        }
        $parentItems = $this->Items->ParentItems->find('list', ['limit' => 200]);
        $manufacturers = $this->Items->Manufacturers->find('list', ['limit' => 200]);
        $suppliers = $this->Items->Suppliers->find('list', ['limit' => 200]);
        $assetNatures = $this->Items->AssetNatures->find('list', ['limit' => 200]);
        $assetTypes = $this->Items->AssetTypes->find('list', ['limit' => 200]);
        $itemCategories = $this->Items->ItemCategories->find('list', ['limit' => 200]);
        $offices = $this->Items->Offices->find('list', ['limit' => 200]);
        $officeWarehouses = $this->Items->OfficeWarehouses->find('list', ['limit' => 200]);
        $this->set(compact('item', 'parentItems', 'manufacturers', 'suppliers', 'assetNatures', 'assetTypes', 'itemCategories', 'offices', 'officeWarehouses'));
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
        $user=$this->Auth->user();
        $time=time();
        $item = $this->Items->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $item = $this->Items->patchEntity($item, $data);
            if ($this->Items->save($item))
            {
                $this->Flash->success('The item has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item could not be saved. Please, try again.');
            }
        }
        $parentItems = $this->Items->ParentItems->find('list', ['limit' => 200]);
        $manufacturers = $this->Items->Manufacturers->find('list', ['limit' => 200]);
        $suppliers = $this->Items->Suppliers->find('list', ['limit' => 200]);
        $assetNatures = $this->Items->AssetNatures->find('list', ['limit' => 200]);
        $assetTypes = $this->Items->AssetTypes->find('list', ['limit' => 200]);
        $itemCategories = $this->Items->ItemCategories->find('list', ['limit' => 200]);
        $offices = $this->Items->Offices->find('list', ['limit' => 200]);
        $officeWarehouses = $this->Items->OfficeWarehouses->find('list', ['limit' => 200]);
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

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $item = $this->Items->patchEntity($item, $data);
        if ($this->Items->save($item))
        {
            $this->Flash->success('The item has been deleted.');
        }
        else
        {
            $this->Flash->error('The item could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
