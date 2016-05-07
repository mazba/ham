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

    public function index()
    {
        $user = $this->Auth->user();
        $this->loadModel('ItemWithdrawals');
        $this->loadModel('Items');
        $itemWithdrawals = $this->ItemWithdrawals->find('all', [
            'conditions' => ['ItemWithdrawals.status !=' => 99],
            'contain' => ['ItemAssigns', 'Offices', 'OfficeWarehouses']
        ]);

        $officeWarehouses = $this->ItemWithdrawals->OfficeWarehouses->find('list', ['conditions' => ['status' => 1,'office_id'=>$user['office_id']]])->toArray();
        $items = $this->Items->find('list', ['conditions' => ['status' => 1,'office_id'=>$user['office_id']]])->toArray();
        $this->set('itemWithdrawals', $this->paginate($itemWithdrawals));
        $this->set('officeWarehouses', $officeWarehouses);
        $this->set('items', $items);
        $this->set('_serialize', ['itemWithdrawals', 'officeWarehouses', 'items']);
    }

    public function view($id = null)
    {
        $user = $this->Auth->user();
        $itemWithdrawal = $this->ItemWithdrawals->get($id, [
            'contain' => ['ItemAssigns', 'Offices', 'OfficeWarehouses']
        ]);
        $this->set('itemWithdrawal', $itemWithdrawal);
        $this->set('_serialize', ['itemWithdrawal']);
    }

    public function add()
    {
        $this->loadModel('Users');
        $this->loadModel('ItemAssigns');
        $this->loadModel('Items');
        $user = $this->Auth->user();
        $time = time();
        $itemWithdrawal = $this->ItemWithdrawals->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $itemAssign=$this->ItemAssigns->get($data['item_assign_id']);
            $itemOriginal = $this->Items->find()->where(['id'=>$itemAssign->item_id])->first();
            $items = $this->Items->find()->where(['id'=>$itemAssign->item_id, 'office_warehouse_id'=>$data['office_warehouse_id']])->first();

            if(!$items):
                $items = $this->Items->newEntity();
                unset($itemOriginal['quantity']);
                unset($itemOriginal['office_warehouse_id']);
                unset($itemOriginal['create_time']);
                unset($itemOriginal['create_by']);
                unset($itemOriginal['update_time']);
                unset($itemOriginal['update_by']);
                $item_data = $itemOriginal;
                $item_data['quantity'] = $itemAssign['quantity'];
                $item_data['office_warehouse_id'] = $data['office_warehouse_id'];
                $item_data['create_by'] = $user['id'];
                $item_data['create_time'] = $time;
            else:
                $item_data['quantity'] = $items['quantity']+$itemAssign['quantity'];
                $item_data['update_by'] = $user['id'];
                $item_data['update_time'] = $time;
            endif;

            $data['office_id']=$itemAssign->office_id;
            $data['withdrawal_time']=strtotime($data['withdrawal_time']);
            $data['create_by'] = $user['id'];
            $data['create_time'] = $time;

            $assign_data['id'] =  $itemAssign->id;
            $assign_data['update_by'] = $user['id'];
            $assign_data['update_time'] = $time;
            $assign_data['status'] = 0;

//            $item_data['id']= $itemAssign->item_id;
//            $item_data['office_warehouse_id']= $data['office_warehouse_id'];
//            $item_data['update_by'] = $user['id'];
//            $item_data['update_time'] = $time;

            $itemWithdrawal = $this->ItemWithdrawals->patchEntity($itemWithdrawal, $data);
            $itemAssign = $this->ItemAssigns->patchEntity($itemAssign, $assign_data);
            $item = $this->Items->patchEntity($items, $item_data);

            if ($this->ItemWithdrawals->save($itemWithdrawal) && $this->ItemAssigns->save($itemAssign) && $this->Items->save($item)) {
                $this->Flash->success('The item withdrawal has been saved.');
                return $this->redirect(['action' => 'add']);
            } else {
                $this->Flash->error('The item withdrawal could not be saved. Please, try again.');
            }
        }
        $users = $this->Users->find('list', ['conditions' => ['status' => 1]]);
        $itemAssigns = '';
//       $itemAssigns = $this->ItemWithdrawals->ItemAssigns->find('list', ['conditions'=>['status'=>1]]);
//        $offices = $this->ItemWithdrawals->Offices->find('list', ['conditions'=>['status'=>1]]);
        $officeWarehouses = $this->ItemWithdrawals->OfficeWarehouses->find('list', ['conditions' => ['status' => 1,'office_id'=>$user['office_id']]]);
        $this->set(compact('itemWithdrawal', 'itemAssigns', 'offices', 'officeWarehouses', 'users'));
        $this->set('_serialize', ['itemWithdrawal']);
    }

    public function edit($id = null)
    {
        $user = $this->Auth->user();
        $time = time();
        $itemWithdrawal = $this->ItemWithdrawals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['update_by'] = $user['id'];
            $data['update_date'] = $time;
            $itemWithdrawal = $this->ItemWithdrawals->patchEntity($itemWithdrawal, $data);
            if ($this->ItemWithdrawals->save($itemWithdrawal)) {
                $this->Flash->success('The item withdrawal has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The item withdrawal could not be saved. Please, try again.');
            }
        }
        $itemAssigns = $this->ItemWithdrawals->ItemAssigns->find('list', ['conditions' => ['status' => 1]]);
        $offices = $this->ItemWithdrawals->Offices->find('list', ['conditions' => ['status' => 1]]);
        $officeWarehouses = $this->ItemWithdrawals->OfficeWarehouses->find('list', ['conditions' => ['status' => 1]]);
        $this->set(compact('itemWithdrawal', 'itemAssigns', 'offices', 'officeWarehouses'));
        $this->set('_serialize', ['itemWithdrawal']);
    }

    public function delete($id = null)
    {
        $itemWithdrawal = $this->ItemWithdrawals->get($id);

        $user = $this->Auth->user();
        $data = $this->request->data;
        $data['updated_by'] = $user['id'];
        $data['updated_date'] = time();
        $data['status'] = 99;
        $itemWithdrawal = $this->ItemWithdrawals->patchEntity($itemWithdrawal, $data);
        if ($this->ItemWithdrawals->save($itemWithdrawal)) {
            $this->Flash->success('The item withdrawal has been deleted.');
        } else {
            $this->Flash->error('The item withdrawal could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    public function ajax($action = null)
    {
        if ($action == 'get_user_items') {
            $this->loadModel('ItemAssigns');
            $items = $this->ItemAssigns
                ->find()
                ->select(['id'=>'ItemAssigns.id', 'itemName'=>'Items.title_bn'])
                ->where([
                    'ItemAssigns.status'=>1,
                    'ItemAssigns.designated_user_id'=>$this->request->data('user_id')
                ])
                ->contain(['Items']);
            $this->response->body(json_encode($items));
            return $this->response;

        }
    }
}
