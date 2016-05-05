<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;
use Cake\I18n\Time;

class ReportLprController extends AppController
{
    public function index()
    {
        $user = $this->Auth->user();

        if($this->request->is('post'))
        {
            $lpr_range = Configure::read('lpr_range');
            $lpr_year = new Time('-'.$lpr_range.' years');
            $lpr_year = $lpr_year->addMonth(1)->toUnixString();

            $users = TableRegistry::get('users')->find()->hydrate(false);
            $users->select(['full_name_bn', 'id', 'create_date']);
            $users->select(['user_basics.date_of_birth']);

            $users->where(['users.office_id'=>$user['office_id']]);
            $users->where(['users.status'=>1]);
            $users->where(['user_basics.date_of_birth <'=>$lpr_year]);
            $users->leftJoin('user_basics', 'users.id=user_basics.user_id');

            $reportData = $users->toArray();

            $offices = TableRegistry::get('offices')->find('list')->toArray();
            $this->set('reportData', $reportData);
            $this->set('offices', $offices);
            $this->set('_serialize', ['reportData', 'years', 'offices']);
        }
	}

}
