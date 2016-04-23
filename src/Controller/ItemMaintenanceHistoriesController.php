<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemMaintenanceHistories Controller
 *
 * @property \App\Model\Table\ItemMaintenanceHistoriesTable $ItemMaintenanceHistories
 */
class ItemMaintenanceHistoriesController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'ItemMaintenanceHistories.title' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
			$itemMaintenanceHistories = $this->ItemMaintenanceHistories->find('all', [
	'conditions' =>['ItemMaintenanceHistories.status !=' => 99],
	'contain' => ['Offices', 'Suppliers', 'Items']
	]);
		$this->set('itemMaintenanceHistories', $this->paginate($itemMaintenanceHistories) );
	$this->set('_serialize', ['itemMaintenanceHistories']);
	}

    /**
     * View method
     *
     * @param string|null $id Item Maintenance History id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $itemMaintenanceHistory = $this->ItemMaintenanceHistories->get($id, [
            'contain' => ['Offices', 'Suppliers', 'Items']
        ]);
        $this->set('itemMaintenanceHistory', $itemMaintenanceHistory);
        $this->set('_serialize', ['itemMaintenanceHistory']);
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
        $itemMaintenanceHistory = $this->ItemMaintenanceHistories->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $itemMaintenanceHistory = $this->ItemMaintenanceHistories->patchEntity($itemMaintenanceHistory, $data);
            if ($this->ItemMaintenanceHistories->save($itemMaintenanceHistory))
            {
                $this->Flash->success('The item maintenance history has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item maintenance history could not be saved. Please, try again.');
            }
        }
        $offices = $this->ItemMaintenanceHistories->Offices->find('list', ['conditions'=>['status'=>1]]);
        $suppliers = $this->ItemMaintenanceHistories->Suppliers->find('list', ['conditions'=>['status'=>1]]);
        $items = $this->ItemMaintenanceHistories->Items->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('itemMaintenanceHistory', 'offices', 'suppliers', 'items'));
        $this->set('_serialize', ['itemMaintenanceHistory']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Maintenance History id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $itemMaintenanceHistory = $this->ItemMaintenanceHistories->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $itemMaintenanceHistory = $this->ItemMaintenanceHistories->patchEntity($itemMaintenanceHistory, $data);
            if ($this->ItemMaintenanceHistories->save($itemMaintenanceHistory))
            {
                $this->Flash->success('The item maintenance history has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item maintenance history could not be saved. Please, try again.');
            }
        }
        $offices = $this->ItemMaintenanceHistories->Offices->find('list', ['conditions'=>['status'=>1]]);
        $suppliers = $this->ItemMaintenanceHistories->Suppliers->find('list', ['conditions'=>['status'=>1]]);
        $items = $this->ItemMaintenanceHistories->Items->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('itemMaintenanceHistory', 'offices', 'suppliers', 'items'));
        $this->set('_serialize', ['itemMaintenanceHistory']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Maintenance History id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $itemMaintenanceHistory = $this->ItemMaintenanceHistories->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $itemMaintenanceHistory = $this->ItemMaintenanceHistories->patchEntity($itemMaintenanceHistory, $data);
        if ($this->ItemMaintenanceHistories->save($itemMaintenanceHistory))
        {
            $this->Flash->success('The item maintenance history has been deleted.');
        }
        else
        {
            $this->Flash->error('The item maintenance history could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
