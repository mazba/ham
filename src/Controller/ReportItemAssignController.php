<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReportItemAssignController extends AppController
{
    public function index()
    {
        $user = $this->Auth->user();
        $items = TableRegistry::get('items')->find('list');
        $employees = TableRegistry::get('users')->find('list');

        $this->set('items', $items);
        $this->set('employees', $employees);
        $this->set('_serialize', ['items', 'employees']);

        if($this->request->is('post'))
        {
            $assigned_to = $this->request->data['assigned_to'];
            $from_date = strtotime($this->request->data['from_date']);
            $to_date = strtotime($this->request->data['to_date']);

            $items = TableRegistry::get('item_assigns')->find()->hydrate(false);
            $items->select(['items.title_bn', 'items.serial_number', 'items.model_number']);
            $items->select(['users.full_name_bn']);
            $items->select(['item_assigns.assign_type', 'item_assigns.office_id', 'item_assigns.office_building_id', 'item_assigns.office_room_id', 'item_assigns.office_warehouse_id', 'item_assigns.office_unit_id', 'item_assigns.designation_id', 'item_assigns.designated_user_id', 'item_assigns.item_id', 'item_assigns.quantity', 'item_assigns.assign_date', 'item_assigns.expected_usage_time', 'item_assigns.next_maintainance_date']);

            $items->where(['items.status'=>1]);
            if(!empty($assigned_to) && $assigned_to>0)
            {
                $items->where(['designated_user_id'=>$assigned_to]);
            }
            else
            {
                $items->where(['item_assigns.office_id'=>$user['office_id']]);
            }
            if(!empty($from_date) && $from_date>0)
            {
                $items->where(['assign_date >='=>$from_date]);
            }
            if(!empty($to_date) && $to_date>0)
            {
                $items->where(['assign_date <='=>$to_date]);
            }
            $items->leftJoin('items', 'items.id=item_assigns.item_id');
            $items->leftJoin('users', 'users.id=item_assigns.designated_user_id');

            $reportData = $items->toArray();

            $offices = TableRegistry::get('offices')->find('list')->toArray();
            $this->set('reportData', $reportData);
            $this->set('from_date', $from_date);
            $this->set('to_date', $to_date);
            $this->set('offices', $offices);
            $this->set('_serialize', ['reportData', 'from_date', 'to_date', 'offices']);
        }
	}

}
