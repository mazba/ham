<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Utility\Inflector;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{
    public function index()
    {
        $this->paginate = [
            'contain' => ['UserGroups']
        ];
        $this->set('users', $this->paginate($this->Users));
        $this->set('_serialize', ['users']);
    }

    public function view($id = null)
    {
        $user = $this->request->Session()->read('Auth')['User'];

        if($id != $user['id'] && $user['user_type_id'] != 1)
        {
            $this->Flash->error(__('You don not have permission to view this!'));
            return $this->redirect('/Dashboard');
        }

        $user = $this->Users->get($id, [
            'contain' => [
                'UserBasic',
                'UserAcademicTrainings',
                'UserDependents',
                'UserDesignations',
                'UserEmergencyContacts',
                'UserEmploymentHistories',
                'UserLanguageDetails',
                'UserMedicals'
            ]
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    public function add()
    {
        $loggedUser = $this->request->Session()->read('Auth')['User'];
        $user = $this->Users->newEntity();
        $time = time();

        if ($this->request->is('post'))
        {
            $data = $this->request->data;
            $data['create_by']=$loggedUser['id'];
            $data['create_date']=$time;
            $data['user_basic']['create_by']=$loggedUser['id'];
            $data['user_basic']['create_time']=$time;

            for($i=0; $i<sizeof($data['user_academic_trainings']); $i++)
            {
                $data['user_academic_trainings'][$i]['create_by']=$loggedUser['id'];
                $data['user_academic_trainings'][$i]['create_time']=$time;
            }
            for($i=0; $i<sizeof($data['user_dependents']); $i++)
            {
                $data['user_dependents'][$i]['create_by']=$loggedUser['id'];
                $data['user_dependents'][$i]['create_time']=$time;
            }
            for($i=0; $i<sizeof($data['user_designations']); $i++)
            {
                $data['user_designations'][$i]['create_by']=$loggedUser['id'];
                $data['user_designations'][$i]['create_time']=$time;
            }
            for($i=0; $i<sizeof($data['user_employment_histories']); $i++)
            {
                $data['user_employment_histories'][$i]['create_by']=$loggedUser['id'];
                $data['user_employment_histories'][$i]['create_time']=$time;
            }
            for($i=0; $i<sizeof($data['user_language_details']); $i++)
            {
                $data['user_language_details'][$i]['create_by']=$loggedUser['id'];
                $data['user_language_details'][$i]['create_time']=$time;
            }

            for($i=0; $i<sizeof($data['user_designations']); $i++)
            {
                if($data['user_designations'][$i]['is_basic'] != 1)
                {
                    $data['user_designations'][$i]['designation_id'] = $data['user_designations'][$i]['office_unit_designation_id'];
                }

                if($data['user_designations'][$i]['is_basic'] == 1)
                {
                    $data['office_id'] = $data['user_designations'][$i]['office_id'];
                }
            }

            $user = $this->Users->patchEntity($user, $data, [
                'associated' => [
                    'UserBasic',
                    'UserAcademicTrainings',
                    'UserDependents',
                    'UserDesignations',
                    'UserEmergencyContacts',
                    'UserEmploymentHistories',
                    'UserLanguageDetails',
                    'UserMedicals'
                ]
            ]);

            if ($this->Users->save($user))
            {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            }
            else
            {
                $this->Flash->error(__('The user not saved.'));
            }
        }

        $this->loadModel('Offices');
        $this->loadModel('UserGroups');
        $userGroups = $this->UserGroups->find('list');
        $offices = $this->Offices->find('list');

        $this->set(compact('user', 'userGroups','offices'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $loggedUser = $this->request->Session()->read('Auth')['User'];
        $user = $this->Users->get($id, [
            'contain' => [
                'UserBasic',
                'UserAcademicTrainings',
                'UserDependents',
                'UserDesignations',
                'UserEmergencyContacts',
                'UserEmploymentHistories',
                'UserLanguageDetails',
                'UserMedicals'
            ]
        ]);

        unset($user['password']);

//        echo '<pre>';
//        print_r($user);
//        echo '</pre>';
//        die();

        if($this->request->is(['patch', 'post', 'put']))
        {
            $data = $this->request->data;
            $time = time();

            if(empty($data['password']))
            {
                unset($data['password']);
            }

            $data['updated_by'] = $loggedUser['id'];
            $data['updated_time'] = time();

            $data['user_basic']['update_by']=$loggedUser['id'];
            $data['user_basic']['update_time']=$time;

            for($i=0; $i<sizeof($data['user_academic_trainings']); $i++)
            {
                $data['user_academic_trainings'][$i]['update_by']=$loggedUser['id'];
                $data['user_academic_trainings'][$i]['update_time']=$time;
            }
            for($i=0; $i<sizeof($data['user_dependents']); $i++)
            {
                $data['user_dependents'][$i]['update_by']=$loggedUser['id'];
                $data['user_dependents'][$i]['update_time']=$time;
            }
            for($i=0; $i<sizeof($data['user_designations']); $i++)
            {
                $data['user_designations'][$i]['update_by']=$loggedUser['id'];
                $data['user_designations'][$i]['update_time']=$time;
            }
            for($i=0; $i<sizeof($data['user_employment_histories']); $i++)
            {
                $data['user_employment_histories'][$i]['update_by']=$loggedUser['id'];
                $data['user_employment_histories'][$i]['update_time']=$time;
            }
            for($i=0; $i<sizeof($data['user_language_details']); $i++)
            {
                $data['user_language_details'][$i]['update_by']=$loggedUser['id'];
                $data['user_language_details'][$i]['update_time']=$time;
            }

            for($i=0; $i<sizeof($data['user_designations']); $i++)
            {
                if($data['user_designations'][$i]['is_basic'] != 1)
                {
                    $data['user_designations'][$i]['designation_id'] = $data['user_designations'][$i]['office_unit_designation_id'];
                }
            }

            $user = $this->Users->patchEntity($user, $data, [
                'associated' => [
                    'UserBasic',
                    'UserAcademicTrainings',
                    'UserDependents',
                    'UserDesignations',
                    'UserEmergencyContacts',
                    'UserEmploymentHistories',
                    'UserLanguageDetails',
                    'UserMedicals'
                ]
            ]);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been updated!'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again!'));
            }
        }

        $this->loadModel('Offices');
        $this->loadModel('UserGroups');
        $userGroups = $this->UserGroups->find('list');
        $offices = $this->Offices->find('list');

        $this->set(compact('user', 'userGroups','offices'));
        $this->set('_serialize', ['user']);
    }

    public function delete($id = null)
    {
//        $this->request->allowMethod(['post', 'delete']);
//        $user = $this->Users->get($id);
//        if ($this->Users->delete($user)) {
//            $this->Flash->success(__('The user has been deleted.'));
//        } else {
//            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
//        }
//        return $this->redirect(['action' => 'index']);
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
        elseif($action='get_designation_by_office')
        {
            $office_id = $this->request->data('office_id');
            $this->loadModel('Designations');
            $userDesignations = $this->Designations->find('list', ['conditions'=>['office_id'=>$office_id, 'status'=>1]]);

            $this->response->body(json_encode($userDesignations));
            return $this->response;
        }
    }
}
