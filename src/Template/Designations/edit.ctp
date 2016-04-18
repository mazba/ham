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
            <?= $this->Html->link(__('Designations'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
                    <li><?= __('Edit Designation') ?></li>
        
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Designation') ?>
                                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
                
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($designation,['class' => 'form-horizontal','role'=>'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                                                                    echo $this->Form->input('parent_id', ['options' => $parentDesignations, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_id', ['options' => $offices, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_unit_designation_id', ['options' => $officeUnitDesignations, 'empty' => __('Select')]);
                                                                echo $this->Form->input('name_en',['label'=> __('NAME_EN')]);
                                                                echo $this->Form->input('name_bn',['label'=> __('NAME_BN')]);
                                                                    echo $this->Form->input('level_number');
                                                                    echo $this->Form->input('sequence_number');
                                                                    echo $this->Form->input('post_number');
                                                                echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                                                                    echo $this->Form->input('created_by');
                                                                    echo $this->Form->input('created_date');
                                                                    echo $this->Form->input('updated_by');
                                                                    echo $this->Form->input('updated_date');
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
