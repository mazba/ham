<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Core\Configure;
use Cake\I18n\Time;
use Cake\ORM\TableRegistry;

class ReportExperienceController extends AppController
{
    public function index()
    {
        $user = $this->Auth->user();
        $yearRange = [];

        for($i=1; $i<11; $i++):
            $yearRange[$i] = ($i > 1) ? $i . ' Years' : $i . ' Year';
        endfor;

        $employees = TableRegistry::get('users')->find('list');
        $this->set('yearRange', $yearRange);
        $this->set('employees', $employees);
        $this->set('_serialize', ['yearRange', 'employees']);

        if($this->request->is('post'))
        {
            $employee = $this->request->data['employee'];
            $report_type = $this->request->data['report_type'];
            $lpr_age = $this->request->data['lpr_age']?$this->request->data['lpr_age']:Configure::read('lpr_range');

            if($report_type==1)
            {
                $users = TableRegistry::get('users')->find()->hydrate(false);
                $users->select(['full_name_bn', 'id']);
                $users->select(['user_basics.date_of_birth']);
                $users->where(['users.status'=>1]);

                if(!empty($employee) && $employee>0):
                    $users->where(['users.id'=>$employee]);
                else:
                    $users->where(['users.office_id'=>$user['office_id']]);
                endif;

                $users->leftJoin('user_basics', 'users.id=user_basics.user_id');
            }
            elseif($report_type==2)
            {
                $users = TableRegistry::get('users')->find()->hydrate(false);
                $users->select(['full_name_bn', 'id', 'create_date']);
                $users->select(['user_basics.job_joining_date']);
                $users->where(['users.status'=>1]);

                if(!empty($employee) && $employee>0):
                    $users->where(['users.id'=>$employee]);
                else:
                    $users->where(['users.office_id'=>$user['office_id']]);
                endif;

                $users->leftJoin('user_basics', 'users.id=user_basics.user_id');
            }

            $reportData = $users->toArray();

            $offices = TableRegistry::get('offices')->find('list')->toArray();
            $this->set('reportData', $reportData);
            $this->set('lpr_age', $lpr_age);
            $this->set('report_type', $report_type);
            $this->set('offices', $offices);
            $this->set('_serialize', ['reportData', 'report_type', 'offices']);
        }
	}

}
