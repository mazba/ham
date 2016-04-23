<?php
$status = \Cake\Core\Configure::read('status_options');
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
        <li><?= __('View Item') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Item Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Parent Item') ?></th>
                                    <td><?= $item->has('parent_item') ? $this->Html->link($item->parent_item->id, ['controller' => 'Items', 'action' => 'view', $item->parent_item->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Serial Number') ?></th>
                                    <td><?= h($item->serial_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Serial Number') ?></th>
                                    <td><?= h($item->office_serial_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Model Number') ?></th>
                                    <td><?= h($item->model_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Code') ?></th>
                                    <td><?= h($item->code) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Short Code') ?></th>
                                    <td><?= h($item->short_code) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Manufacturer') ?></th>
                                    <td><?= $item->has('manufacturer') ? $this->Html->link($item->manufacturer->name_bn, ['controller' => 'Manufacturers', 'action' => 'view', $item->manufacturer->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Supplier') ?></th>
                                    <td><?= $item->has('supplier') ? $this->Html->link($item->supplier->name_bn, ['controller' => 'Suppliers', 'action' => 'view', $item->supplier->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Asset Nature') ?></th>
                                    <td><?= $item->has('asset_nature') ? $this->Html->link($item->asset_nature->title_bn, ['controller' => 'AssetNatures', 'action' => 'view', $item->asset_nature->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Asset Type') ?></th>
                                    <td><?= $item->has('asset_type') ? $this->Html->link($item->asset_type->title_bn, ['controller' => 'AssetTypes', 'action' => 'view', $item->asset_type->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Item Category') ?></th>
                                    <td><?= $item->has('item_category') ? $this->Html->link($item->item_category->name_bn, ['controller' => 'ItemCategories', 'action' => 'view', $item->item_category->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office') ?></th>
                                    <td><?= $item->has('office') ? $this->Html->link($item->office->name_en, ['controller' => 'Offices', 'action' => 'view', $item->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Warehouse') ?></th>
                                    <td><?= $item->has('office_warehouse') ? $this->Html->link($item->office_warehouse->id, ['controller' => 'OfficeWarehouses', 'action' => 'view', $item->office_warehouse->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title Bn') ?></th>
                                    <td><?= h($item->title_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title En') ?></th>
                                    <td><?= h($item->title_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Picture File') ?></th>
                                    <td><?= h($item->picture_file) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Purchase Order Number') ?></th>
                                    <td><?= h($item->purchase_order_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Purchase Order Attach File') ?></th>
                                    <td><?= h($item->purchase_order_attach_file) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Stock Book Number') ?></th>
                                    <td><?= h($item->office_stock_book_number) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Remarks') ?></th>
                                    <td><?= h($item->remarks) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Unit Price') ?></th>
                                    <td><?= $this->Number->format($item->unit_price) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Quantity') ?></th>
                                    <td><?= $this->Number->format($item->quantity) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Condition') ?></th>
                                    <td><?= $this->Number->format($item->condition) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Purchase Order Date') ?></th>
                                    <td><?= $this->Number->format($item->purchase_order_date) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Office Receive Date') ?></th>
                                    <td><?= $this->Number->format($item->office_receive_date) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Warranty Start Date') ?></th>
                                    <td><?= $this->Number->format($item->warranty_start_date) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Warranty End Date') ?></th>
                                    <td><?= $this->Number->format($item->warranty_end_date) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Projected End Of Life') ?></th>
                                    <td><?= $this->Number->format($item->projected_end_of_life) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$item->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                                                                <tr>
                                    <th><?= __('Is Depreciable') ?></th>
                                    <td><?= $item->is_depreciable ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                        <tr>
                                    <th><?= __('Is Maintainable') ?></th>
                                    <td><?= $item->is_maintainable ? __('Yes') : __('No'); ?></td>
                                 </tr>
                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

