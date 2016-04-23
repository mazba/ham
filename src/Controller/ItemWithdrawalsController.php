<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * ItemWithdrawals Controller
 *
 * @property \App\Model\Table\ItemWithdrawalsTable $ItemWithdrawals
 */
class ItemWithdrawalsController extends AppController
{

	public $paginate = [
        'limit' => 15,
        'order' => [
            'ItemWithdrawals.title' => 'desc'
        ]
    ];

/**
* Index method
*
* @return void
*/
public function index()
{
			$itemWithdrawals = $this->ItemWithdrawals->find('all', [
	'conditions' =>['ItemWithdrawals.status !=' => 99],
	'contain' => ['ItemAssigns', 'Offices', 'OfficeWarehouses']
	]);
		$this->set('itemWithdrawals', $this->paginate($itemWithdrawals) );
	$this->set('_serialize', ['itemWithdrawals']);
	}

    /**
     * View method
     *
     * @param string|null $id Item Withdrawal id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user=$this->Auth->user();
        $itemWithdrawal = $this->ItemWithdrawals->get($id, [
            'contain' => ['ItemAssigns', 'Offices', 'OfficeWarehouses']
        ]);
        $this->set('itemWithdrawal', $itemWithdrawal);
        $this->set('_serialize', ['itemWithdrawal']);
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
        $itemWithdrawal = $this->ItemWithdrawals->newEntity();
        if ($this->request->is('post'))
        {

            $data=$this->request->data;
            $data['create_by']=$user['id'];
            $data['create_date']=$time;
            $itemWithdrawal = $this->ItemWithdrawals->patchEntity($itemWithdrawal, $data);
            if ($this->ItemWithdrawals->save($itemWithdrawal))
            {
                $this->Flash->success('The item withdrawal has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item withdrawal could not be saved. Please, try again.');
            }
        }
        $itemAssigns = $this->ItemWithdrawals->ItemAssigns->find('list', ['conditions'=>['status'=>1]]);
        $offices = $this->ItemWithdrawals->Offices->find('list', ['conditions'=>['status'=>1]]);
        $officeWarehouses = $this->ItemWithdrawals->OfficeWarehouses->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('itemWithdrawal', 'itemAssigns', 'offices', 'officeWarehouses'));
        $this->set('_serialize', ['itemWithdrawal']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Item Withdrawal id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user=$this->Auth->user();
        $time=time();
        $itemWithdrawal = $this->ItemWithdrawals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data=$this->request->data;
            $data['update_by']=$user['id'];
            $data['update_date']=$time;
            $itemWithdrawal = $this->ItemWithdrawals->patchEntity($itemWithdrawal, $data);
            if ($this->ItemWithdrawals->save($itemWithdrawal))
            {
                $this->Flash->success('The item withdrawal has been saved.');
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error('The item withdrawal could not be saved. Please, try again.');
            }
        }
        $itemAssigns = $this->ItemWithdrawals->ItemAssigns->find('list', ['conditions'=>['status'=>1]]);
        $offices = $this->ItemWithdrawals->Offices->find('list', ['conditions'=>['status'=>1]]);
        $officeWarehouses = $this->ItemWithdrawals->OfficeWarehouses->find('list', ['conditions'=>['status'=>1]]);
        $this->set(compact('itemWithdrawal', 'itemAssigns', 'offices', 'officeWarehouses'));
        $this->set('_serialize', ['itemWithdrawal']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Item Withdrawal id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {

        $itemWithdrawal = $this->ItemWithdrawals->get($id);

        $user=$this->Auth->user();
        $data=$this->request->data;
        $data['updated_by']=$user['id'];
        $data['updated_date']=time();
        $data['status']=99;
        $itemWithdrawal = $this->ItemWithdrawals->patchEntity($itemWithdrawal, $data);
        if ($this->ItemWithdrawals->save($itemWithdrawal))
        {
            $this->Flash->success('The item withdrawal has been deleted.');
        }
        else
        {
            $this->Flash->error('The item withdrawal could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
