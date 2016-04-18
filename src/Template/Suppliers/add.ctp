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
            <?= $this->Html->link(__('Suppliers'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Supplier') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box green-seagreen">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Supplier') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($supplier, ['class' => 'form-horizontal', 'role' => 'form','type'=>'file']) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('parent_id', ['class'=>'select2me form-control','options' => $parentSuppliers, 'empty' => __('Select')]);
                        //echo $this->Form->input('office_id', ['class'=>'select2me form-control','options' => $offices, 'empty' => __('Select')]);
                        echo $this->Form->input('is_global',['type'=>'checkbox','value' => 1,'checked'=>true]);
                        echo $this->Form->input('code');
                        echo $this->Form->input('type',['options'=>Configure::read('supplier_type')]);
                        echo $this->Form->input('name_bn');
                        echo $this->Form->input('name_en');
                        echo $this->Form->input('phone');
                        echo $this->Form->input('fax');
                        echo $this->Form->input('website');
                        echo $this->Form->input('email');
                        echo $this->Form->input('cell_phone');
                        echo $this->Form->input('post_code');
                        echo $this->Form->input('city');
                        echo $this->Form->input('state');
                        echo $this->Form->input('country');
                        echo $this->Form->input('contact_address');
                        echo $this->Form->input('billing_address',['type'=>'textarea','rows'=>2]);
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('contact_person_name');
                        echo $this->Form->input('contact_person_designation');
                        echo $this->Form->input('contact_person_cell_number');
                        echo $this->Form->input('contact_person_email');
                        echo $this->Form->input('supplier_major_sector');
                        echo $this->Form->input('supplier_major_product_tag');
                        echo $this->Form->input('agreement_attach_file',['type'=>'file']);
                        echo $this->Form->input('agreement_duration');
                        echo $this->Form->input('description',['rows'=>2]);
                        echo $this->Form->input('remarks',['type'=>'textarea','rows'=>2]);
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                        ?>
                    </div>
                    <div class="col-md-12">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

