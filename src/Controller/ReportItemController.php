<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class ReportItemController extends AppController
{
    public function index()
    {
        $user = $this->Auth->user();
        $this->loadModel('ItemCategories');
        $items = TableRegistry::get('items')->find('list');
        $itemCategories = $this->ItemCategories->find('list', ['conditions' => ['status' => 1, 'parent_id' => 0]]);

        $this->set('items', $items);
        $this->set('itemCategories', $itemCategories);
        $this->set('_serialize', ['items', 'itemCategories']);

        if($this->request->is('post'))
        {
            $itemCategoryId = $this->request->data['item_category_id'];

            $items = TableRegistry::get('items')->find()->hydrate(false);
            $items->select(['items.id', 'items.title_bn', 'items.serial_number', 'items.model_number', 'items.quantity', 'items.office_warehouse_id']);
//            $items->select(['item_assigns.assign_type', 'item_assigns.office_id', 'item_assigns.office_building_id', 'item_assigns.office_room_id', 'item_assigns.office_warehouse_id', 'item_assigns.office_unit_id', 'item_assigns.designation_id', 'item_assigns.designated_user_id', 'item_assigns.item_id', 'item_assigns.quantity', 'item_assigns.assign_date', 'item_assigns.expected_usage_time', 'item_assigns.next_maintainance_date']);

            $items->where(['items.status'=>1]);

            if(!empty($itemCategoryId) && $itemCategoryId>0)
            {
                $items->where(['items.item_category_id'=>$itemCategoryId]);
            }

//            $items->leftJoin('item_assigns', 'items.id=item_assigns.item_id');

            $reportData = $items->toArray();


            foreach($reportData as &$report)
            {
                $assignedQuantity = TableRegistry::get('item_assigns')->find();
                $assignedQuantity->select(['total'=>'SUM(quantity)']);
                $assignedQuantity->where(['item_id'=>$report['id'], 'office_warehouse_id'=>$report['office_warehouse_id'], 'status'=>1]);

                $report['assigned_quantity'] = $assignedQuantity->first()->toArray()['total']?$assignedQuantity->first()->toArray()['total']:0;
            }

            $offices = TableRegistry::get('offices')->find('list')->toArray();
            $this->set('reportData', $reportData);
            $this->set('offices', $offices);
            $this->set('_serialize', ['reportData', 'from_date', 'to_date', 'offices']);
        }
	}

    public function ajax($action = null)
    {
        if ($this->request->is('ajax')) {
            if ($action == 'getItemCategories') {
                $this->loadModel('ItemCategories');
                $itemCategories = $this->ItemCategories->find('list', ['conditions' => ['parent_id' => $this->request->data('type_id'), 'status' => 1]])->toArray();
                $this->viewBuilder()->layout('ajax');
                $this->set(compact('itemCategories', 'action'));
            }
        }
    }

}
