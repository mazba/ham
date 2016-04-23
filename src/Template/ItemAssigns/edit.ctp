<?php
use Cake\Core\Configure;
?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Item Assigns'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
                    <li><?= __('Edit Item Assign') ?></li>
        
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Item Assign') ?>
                                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
                
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($itemAssign,['class' => 'form-horizontal','role'=>'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                                                                    echo $this->Form->input('assign_type');
                                                                    echo $this->Form->input('office_id', ['options' => $offices, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_building_id', ['options' => $officeBuildings, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_room_id', ['options' => $officeRooms, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_warehouse_id', ['options' => $officeWarehouses, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_unit_id', ['options' => $officeUnits, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('designation_id', ['options' => $designations, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('designated_user_id');
                                                                    echo $this->Form->input('item_id', ['options' => $items, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('quantity');
                                                                    echo $this->Form->input('assign_date');
                                                                    echo $this->Form->input('expected_usage_time');
                                                                    echo $this->Form->input('usage_instruction');
                                                                    echo $this->Form->input('next_maintainance_date');
                                                                echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                                                    ?>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn blue pull-right','style'=>'margin-top:20px']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

