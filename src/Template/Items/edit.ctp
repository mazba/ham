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
            <?= $this->Html->link(__('Items'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
                    <li><?= __('Edit Item') ?></li>
        
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Item') ?>
                            </div>
            <div class="portlet-body">
                <?= $this->Form->create($item,['class' => 'form-horizontal','role'=>'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                                                                    echo $this->Form->input('parent_id', ['options' => $parentItems, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('serial_number');
                                                                    echo $this->Form->input('office_serial_number');
                                                                    echo $this->Form->input('model_number');
                                                                    echo $this->Form->input('code');
                                                                    echo $this->Form->input('short_code');
                                                                    echo $this->Form->input('manufacturer_id', ['options' => $manufacturers, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('supplier_id', ['options' => $suppliers, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('asset_nature_id', ['options' => $assetNatures, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('asset_type_id', ['options' => $assetTypes, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('item_category_id', ['options' => $itemCategories, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_id', ['options' => $offices, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('office_warehouse_id', ['options' => $officeWarehouses, 'empty' => __('Select')]);
                                                                    echo $this->Form->input('title_bn');
                                                                    echo $this->Form->input('title_en');
                                                                    echo $this->Form->input('unit_price');
                                                                    echo $this->Form->input('quantity');
                                                                    echo $this->Form->input('description');
                                                                    echo $this->Form->input('picture_file');
                                                                    echo $this->Form->input('condition');
                                                                    echo $this->Form->input('purchase_order_number');
                                                                    echo $this->Form->input('purchase_order_attach_file');
                                                                    echo $this->Form->input('office_stock_book_number');
                                                                    echo $this->Form->input('purchase_order_date');
                                                                    echo $this->Form->input('office_receive_date');
                                                                    echo $this->Form->input('warranty_start_date');
                                                                    echo $this->Form->input('warranty_end_date');
                                                                    echo $this->Form->input('projected_end_of_life');
                                                                    echo $this->Form->input('is_depreciable');
                                                                    echo $this->Form->input('is_maintainable');
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

