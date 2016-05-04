<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReportTrainingController extends AppController
{
    public function index()
    {
        $user = $this->Auth->user();
        $items = TableRegistry::get('items')->find('list');
        $trainingTypes = TableRegistry::get('training_types')->find('list')->select(['title', 'title']);

        $this->set('items', $items);
        $this->set('trainingTypes', $trainingTypes);
        $this->set('_serialize', ['items', 'trainingTypes']);

        if($this->request->is('post'))
        {
            $training_type = $this->request->data['training_type'];
            $from_date = strtotime($this->request->data['training_start_date']);
            $to_date = strtotime($this->request->data['training_end_date']);

            $trainings = TableRegistry::get('user_academic_trainings')->find()->hydrate(false);

            $trainings->select(['users.full_name_bn']);
            $trainings->select(['title_bn', 'institute_name', 'starting_time', 'completion_time', 'duration']);

            if(!empty($training_type) && strlen($training_type)>0)
            {
                $trainings->where(['user_academic_trainings.title_bn like' => '%' . $training_type . '%']);
            }
            if(!empty($from_date) && $from_date>0)
            {
                $trainings->where(['user_academic_trainings.starting_time >='=>$from_date]);
            }
            if(!empty($to_date) && $to_date>0)
            {
                $trainings->where(['user_academic_trainings.completion_time <='=>$to_date]);
            }

            $trainings->leftJoin('users', 'users.id=user_academic_trainings.user_id');

            $reportData = $trainings->toArray();

            $offices = TableRegistry::get('offices')->find('list')->toArray();
            $this->set('reportData', $reportData);
            $this->set('from_date', $from_date);
            $this->set('to_date', $to_date);
            $this->set('offices', $offices);
            $this->set('_serialize', ['reportData', 'from_date', 'to_date', 'offices']);
        }
    }

}
