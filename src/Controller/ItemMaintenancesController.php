<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemMaintenances Controller
 *
 * @property \App\Model\Table\ItemMaintenancesTable $ItemMaintenances
 */
class ItemMaintenancesController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'ItemMaintenances.title' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
			$itemMaintenances = $this->ItemMaintenances->find('all', [
	'conditions' =>['ItemMaintenances.status !=' => 99],
	'contain' => ['Offices', 'Suppliers', 'Items']
	]);
		$this->set('itemMaintenances', $this->paginate($itemMaintenances) );
	$this->set('_serialize', ['itemMaintenances']);
	}

    /**
     * View method
     *
     * @param string|null $id Item Maintenance id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $itemMaintenance = $this->ItemMaintenances->get($id, [
            'contain' => ['Offices', 'Suppliers', 'Items']
        ]);
        $this->set('itemMaintenance', $itemMaintenance);
        $this->set('_serialize', ['itemMaintenance']);
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
        $itemMaintenance = $this->ItemMaintenances->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $itemMaintenance = $this->ItemMaintenances->patchEntity($itemMaintenance, $data);
            if ($this->ItemMaintenances->save($itemMaintenance))
            {
                $this->Flash->success('The item maintenance has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item maintenance could not be saved. Please, try again.');
            }
        }
        $offices = $this->ItemMaintenances->Offices->find('list', ['conditions'=>['status'=>1]]);
        $suppliers = $this->ItemMaintenances->Suppliers->find('list', ['conditions'=>['status'=>1]]);
        $items = $this->ItemMaintenances->Items->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('itemMaintenance', 'offices', 'suppliers', 'items'));
        $this->set('_serialize', ['itemMaintenance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Maintenance id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $itemMaintenance = $this->ItemMaintenances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $itemMaintenance = $this->ItemMaintenances->patchEntity($itemMaintenance, $data);
            if ($this->ItemMaintenances->save($itemMaintenance))
            {
                $this->Flash->success('The item maintenance has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item maintenance could not be saved. Please, try again.');
            }
        }
        $offices = $this->ItemMaintenances->Offices->find('list', ['conditions'=>['status'=>1]]);
        $suppliers = $this->ItemMaintenances->Suppliers->find('list', ['conditions'=>['status'=>1]]);
        $items = $this->ItemMaintenances->Items->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('itemMaintenance', 'offices', 'suppliers', 'items'));
        $this->set('_serialize', ['itemMaintenance']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Maintenance id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $itemMaintenance = $this->ItemMaintenances->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $itemMaintenance = $this->ItemMaintenances->patchEntity($itemMaintenance, $data);
        if ($this->ItemMaintenances->save($itemMaintenance))
        {
            $this->Flash->success('The item maintenance has been deleted.');
        }
        else
        {
            $this->Flash->error('The item maintenance could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
