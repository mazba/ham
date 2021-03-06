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
            <?= $this->Html->link(__('Manufacturers'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
                    <li><?= __('Edit Manufacturer') ?></li>
        
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Manufacturer') ?>
                                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
                
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($manufacturer,['class' => 'form-horizontal','role'=>'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                                                                    echo $this->Form->input('code');
                                                                    echo $this->Form->input('name_bn');
                                                                    echo $this->Form->input('name_en');
                                                                    echo $this->Form->input('phone');
                                                                    echo $this->Form->input('fax');
                                                                    echo $this->Form->input('website');
                                                                    echo $this->Form->input('email');
                                                                    echo $this->Form->input('cell_phone');
                                                                    echo $this->Form->input('country');
                                                                    echo $this->Form->input('address');
                                                                    echo $this->Form->input('major_sector');
                                                                    echo $this->Form->input('major_product_tag');
                                                                    echo $this->Form->input('description');
                                                                    echo $this->Form->input('remarks');
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

