<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserGroups']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => ['UserGroups','CreatedBy','UpdatedBy']
        ]);
        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post'))
        {
            $data = $this->request->data;
            $data['created_by'] = $this->Auth->user('id');;
            $data['created_time'] = time();
            $user = $this->Users->patchEntity($user,$data,['associated' => ['Users']]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->loadModel('Offices');
        $this->loadModel('UserGroups');
        $userGroups = $this->UserGroups->find('list');
        $offices = $this->Offices->find('list');

        $this->set(compact('user', 'userGroups','offices'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put']))
        {
            $data = $this->request->data;
            if(empty($data['password']))
                unset($data['password']);
            $data['updated_by'] = $this->Auth->user('id');
            $data['updated_time'] = time();
            $data['dob'] = strtotime($data['dob']);
            $user = $this->Users->patchEntity($user, $data,['associated' => ['Users']]);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $userGroups = $this->Users->UserGroups->find('list');
        $this->set(compact('user', 'userGroups'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return void Redirects to index.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function ajax($action=null)
    {
        if($action=='get_unit')
        {
            $office_id = $this->request->data('office_id');
            $this->loadModel('OfficeUnits');
            $units = $this->OfficeUnits->find('list', ['conditions'=>['office_id'=>$office_id, 'status'=>1]]);

            $this->response->body(json_encode($units));
            return $this->response;
        }
        elseif($action=='get_unit_designation')
        {
            $office_id = $this->request->data('office_id');
            $office_unit_id = $this->request->data('office_unit_id');
            $this->loadModel('OfficeUnitDesignations');
            $designations = $this->OfficeUnitDesignations->find('list', ['conditions'=>['office_id'=>$office_id, 'office_unit_id'=>$office_unit_id, 'status'=>1]]);

            $this->response->body(json_encode($designations));
            return $this->response;
        }
        elseif($action=='get_user_designation')
        {
            $office_id = $this->request->data('office_id');
            $office_unit_designation_id = $this->request->data('office_unit_designation_id');
            $this->loadModel('Designations');
            $userDesignations = $this->Designations->find('list', ['conditions'=>['office_id'=>$office_id, 'office_unit_designation_id'=>$office_unit_designation_id, 'status'=>1]]);

            $this->response->body(json_encode($userDesignations));
            return $this->response;
        }
    }
}
