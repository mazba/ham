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
            <?= $this->Html->link(__('Supplier Dealing Details'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
                    <li><?= __('Edit Supplier Dealing Detail') ?></li>
        
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Supplier Dealing Detail') ?>
                                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
                
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($supplierDealingDetail,['class' => 'form-horizontal','role'=>'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                                                                    echo $this->Form->input('committee_id', ['options' => $committees, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('user_id', ['options' => $users, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('deal_type_id');
                                                                    echo $this->Form->input('item_category_id', ['options' => $itemCategories, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('title_bn');
                                                                    echo $this->Form->input('title_en');
                                                                    echo $this->Form->input('deal_start_date');
                                                                    echo $this->Form->input('deal_end_date');
                                                                    echo $this->Form->input('deal_attach_file');
                                                                    echo $this->Form->input('deal_description');
                                                                    echo $this->Form->input('deal_remarks');
                                                                    echo $this->Form->input('deal_duration');
                                                                    echo $this->Form->input('actual_completion_duration');
                                                                    echo $this->Form->input('item_number');
                                                                    echo $this->Form->input('security_amount');
                                                                    echo $this->Form->input('actual_deal_amount');
                                                                    echo $this->Form->input('penalty_amount');
                                                                    echo $this->Form->input('tax_amount');
                                                                    echo $this->Form->input('vat_amount');
                                                                    echo $this->Form->input('total_amount');
                                                                    echo $this->Form->input('billing_installment_number');
                                                                    echo $this->Form->input('final_billing_date');
                                                                    echo $this->Form->input('actual_final_billing_date');
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

