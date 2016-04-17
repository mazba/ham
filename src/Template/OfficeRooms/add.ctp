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
            <?= $this->Html->link(__('Office Rooms'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
                    <li><?= __('New Office Room') ?></li>
        
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Office Room') ?>
                                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
                
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($officeRoom,['class' => 'form-horizontal','role'=>'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                                                                    echo $this->Form->input('parent_id', ['options' => $parentOfficeRooms, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_id', ['options' => $offices, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_building_id', ['options' => $officeBuildings, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_unit_id', ['options' => $officeUnits, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('floor_number');
                                                                    echo $this->Form->input('title_bn');
                                                                    echo $this->Form->input('title_en');
                                                                    echo $this->Form->input('number');
                                                                    echo $this->Form->input('size');
                                                                    echo $this->Form->input('common_use');
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

