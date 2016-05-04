<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Model\Entity\User;
use Cake\Auth\DefaultPasswordHasher;
use Cake\Database\Connection;
use Cake\Utility\Inflector;
use Cake\Datasource\ConnectionManager;
use Cake\ORM\TableRegistry;
use Cake\Collection\Collection;

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

        if ($id != $user['id'] && $user['user_type_id'] != 1) {
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

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['create_by'] = $loggedUser['id'];
            $data['create_date'] = $time;
            $data['user_basic']['create_by'] = $loggedUser['id'];
            $data['user_basic']['create_time'] = $time;

            for ($i = 0; $i < sizeof($data['user_academic_trainings']); $i++) {
                $data['user_academic_trainings'][$i]['create_by'] = $loggedUser['id'];
                $data['user_academic_trainings'][$i]['create_time'] = $time;

                if ($data['user_academic_trainings'][$i]['type'] == 2) {
                    $data['user_academic_trainings'][$i]['title_bn'] = $data['user_academic_trainings'][$i]['training_type'];
                    $data['user_academic_trainings'][$i]['title_en'] = $data['user_academic_trainings'][$i]['training_type'];
                }
            }
            for ($i = 0; $i < sizeof($data['user_dependents']); $i++) {
                $data['user_dependents'][$i]['create_by'] = $loggedUser['id'];
                $data['user_dependents'][$i]['create_time'] = $time;
            }
            for ($i = 0; $i < sizeof($data['user_designations']); $i++) {
                $data['user_designations'][$i]['create_by'] = $loggedUser['id'];
                $data['user_designations'][$i]['create_time'] = $time;
            }
            for ($i = 0; $i < sizeof($data['user_employment_histories']); $i++) {
                $data['user_employment_histories'][$i]['create_by'] = $loggedUser['id'];
                $data['user_employment_histories'][$i]['create_time'] = $time;
            }
            for ($i = 0; $i < sizeof($data['user_language_details']); $i++) {
                $data['user_language_details'][$i]['create_by'] = $loggedUser['id'];
                $data['user_language_details'][$i]['create_time'] = $time;
            }

            for ($i = 0; $i < sizeof($data['user_designations']); $i++) {
                if ($data['user_designations'][$i]['is_basic'] != 1) {
                    $data['user_designations'][$i]['designation_id'] = $data['user_designations'][$i]['office_unit_designation_id'];
                }

                if ($data['user_designations'][$i]['is_basic'] == 1) {
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

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user not saved.'));
            }
        }

        $this->loadModel('Offices');
        $this->loadModel('UserGroups');
        $userGroups = $this->UserGroups->find('list');
        $offices = $this->Offices->find('list');

        $this->set(compact('user', 'userGroups', 'offices'));
        $this->set('_serialize', ['user']);
    }

    public function edit($id = null)
    {
        $loggedUser = $this->request->Session()->read('Auth')['User'];
        $user = $this->Users->get($id, [
            'contain' => [
                'UserBasic',
                'UserAcademicTrainings' => ['conditions' => ['UserAcademicTrainings.status' => 1]],
                'UserDependents' => ['conditions' => ['UserDependents.status' => 1]],
                'UserDesignations' => ['conditions' => ['UserDesignations.status' => 1]],
                'UserEmergencyContacts' => ['conditions' => ['UserEmergencyContacts.status' => 1]],
                'UserEmploymentHistories' => ['conditions' => ['UserEmploymentHistories.status' => 1]],
                'UserLanguageDetails' => ['conditions' => ['UserLanguageDetails.status' => 1]],
                'UserMedicals'
            ]
        ]);

        unset($user['password']);

        if ($this->request->is(['patch', 'post', 'put']))
        {
            $time = time();
            try {
                $data = $this->request->data;
                $saveStatus = 0;
                $conn = ConnectionManager::get('default');

                $conn->transactional(function () use ($user, $id, $time, $loggedUser, $data, &$saveStatus)
                {
                    if (empty($data['password'])) {
                        unset($data['password']);
                    }

                    $data['updated_by'] = $loggedUser['id'];
                    $data['updated_time'] = $time;

                    $data['user_basic']['update_by'] = $loggedUser['id'];
                    $data['user_basic']['update_time'] = $time;

                    // Initial Update with status 99 START
                    $temp = [];
                    for ($i = 0; $i < sizeof($user['user_academic_trainings']); $i++) {
                        $temp['user_academic_trainings'][$i]['id'] = $user['user_academic_trainings'][$i]['id'];
                        $temp['user_academic_trainings'][$i]['status'] = 99;
                    }
                    for ($i = 0; $i < sizeof($user['user_dependents']); $i++) {
                        $temp['user_dependents'][$i]['id'] = $user['user_dependents'][$i]['id'];
                        $temp['user_dependents'][$i]['status'] = 99;
                    }
                    for ($i = 0; $i < sizeof($user['user_designations']); $i++) {
                        $temp['user_designations'][$i]['id'] = $user['user_designations'][$i]['id'];
                        $temp['user_designations'][$i]['status'] = 99;
                    }
                    for ($i = 0; $i < sizeof($user['user_employment_histories']); $i++) {
                        $temp['user_employment_histories'][$i]['id'] = $user['user_employment_histories'][$i]['id'];
                        $temp['user_employment_histories'][$i]['status'] = 99;
                    }
                    for ($i = 0; $i < sizeof($user['user_language_details']); $i++) {
                        $temp['user_language_details'][$i]['id'] = $user['user_language_details'][$i]['id'];
                        $temp['user_language_details'][$i]['status'] = 99;
                    }
                    // Initial Update with status 99 END

                    $user = $this->Users->patchEntity($user, $temp, ['validate' => false,
                        'associated' => [
                            'UserBasic' => ['validate' => false],
                            'UserAcademicTrainings' => ['validate' => false],
                            'UserDependents' => ['validate' => false],
                            'UserDesignations' => ['validate' => false],
                            'UserEmergencyContacts' => ['validate' => false],
                            'UserEmploymentHistories' => ['validate' => false],
                            'UserLanguageDetails' => ['validate' => false],
                            'UserMedicals' => ['validate' => false],
                        ]
                    ]);

                    $this->Users->save($user);

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

                    for ($i = 0; $i < sizeof($data['user_academic_trainings']); $i++) {
                        $data['user_academic_trainings'][$i]['update_by'] = $loggedUser['id'];
                        $data['user_academic_trainings'][$i]['update_time'] = $time;
                        $data['user_academic_trainings'][$i]['status'] = 1;

                        if ($data['user_academic_trainings'][$i]['type'] == 2) {
                            $data['user_academic_trainings'][$i]['title_bn'] = $data['user_academic_trainings'][$i]['training_type'];
                            $data['user_academic_trainings'][$i]['title_en'] = $data['user_academic_trainings'][$i]['training_type'];
                        }
                    }
                    for ($i = 0; $i < sizeof($data['user_dependents']); $i++) {
                        $data['user_dependents'][$i]['update_by'] = $loggedUser['id'];
                        $data['user_dependents'][$i]['update_time'] = $time;
                        $data['user_dependents'][$i]['status'] = 1;
                    }
                    for ($i = 0; $i < sizeof($data['user_designations']); $i++) {
                        $data['user_designations'][$i]['update_by'] = $loggedUser['id'];
                        $data['user_designations'][$i]['update_time'] = $time;
                        $data['user_designations'][$i]['status'] = 1;
                    }
                    for ($i = 0; $i < sizeof($data['user_employment_histories']); $i++) {
                        $data['user_employment_histories'][$i]['update_by'] = $loggedUser['id'];
                        $data['user_employment_histories'][$i]['update_time'] = $time;
                        $data['user_employment_histories'][$i]['status'] = 1;

                        if (empty($data['user_employment_histories'][$i]['office_id'])) {
                            unset($data['user_employment_histories'][$i]);
                        }
                    }
                    for ($i = 0; $i < sizeof($data['user_language_details']); $i++) {
                        $data['user_language_details'][$i]['update_by'] = $loggedUser['id'];
                        $data['user_language_details'][$i]['update_time'] = $time;
                        $data['user_language_details'][$i]['status'] = 1;
                    }
                    for ($i = 0; $i < sizeof($data['user_designations']); $i++) {
                        if ($data['user_designations'][$i]['is_basic'] !=1) {
                            $data['user_designations'][$i]['designation_id'] = $data['user_designations'][$i]['office_unit_designation_id'];
                        }

                        if (isset($data['user_designations'][$i]['is_basic']) && $data['user_designations'][$i]['is_basic'] == 1) {
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

                    if ($this->Users->save($user)) {
                        $this->Flash->success(__('The user has been updated!'));
                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The user could not be saved. Please, try again!'));
                    }
                });

            } catch (\Exception $e) {
                $this->Flash->error('The user could not be saved. Please try again!');
            }
        }

        $this->loadModel('Offices');
        $this->loadModel('UserGroups');
        $userGroups = $this->UserGroups->find('list');
        $offices = $this->Offices->find('list');

        $this->set(compact('user', 'userGroups', 'offices'));
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

    public function ajax($action = null)
    {
        if ($action == 'get_unit') {
            $office_id = $this->request->data('office_id');
            $this->loadModel('OfficeUnits');
            $units = $this->OfficeUnits->find('list', ['conditions' => ['office_id' => $office_id, 'status' => 1]]);

            $this->response->body(json_encode($units));
            return $this->response;
        } elseif ($action == 'get_unit_designation') {
            $office_id = $this->request->data('office_id');
            $office_unit_id = $this->request->data('office_unit_id');
            $this->loadModel('OfficeUnitDesignations');
            $designations = $this->OfficeUnitDesignations->find('list', ['conditions' => ['office_id' => $office_id, 'office_unit_id' => $office_unit_id, 'status' => 1]]);

            $this->response->body(json_encode($designations));
            return $this->response;
        } elseif ($action == 'get_user_designation') {
            $office_id = $this->request->data('office_id');
            $office_unit_designation_id = $this->request->data('office_unit_designation_id');
            $this->loadModel('Designations');
            $userDesignations = $this->Designations->find('list', ['conditions' => ['office_id' => $office_id, 'office_unit_designation_id' => $office_unit_designation_id, 'status' => 1]]);

            $this->response->body(json_encode($userDesignations));
            return $this->response;
        } elseif ($action == 'get_designation_by_office') {
            $office_id = $this->request->data('office_id');
            $this->loadModel('Designations');
            $userDesignations = $this->Designations->find('list', ['conditions' => ['office_id' => $office_id, 'status' => 1]]);

            $this->response->body(json_encode($userDesignations));
            return $this->response;
        } elseif ($action == 'get_training_types') {
            $qString = $this->request->data('qstring');
            $this->loadModel('TrainingTypes');
            $tYpes = $this->TrainingTypes->find('list', ['conditions' => ['status' => 1, 'title like' => $qString . '%']]);

            $this->response->body(json_encode($tYpes));
            return $this->response;
        }
    }
}
