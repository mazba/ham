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
            <?= $this->Html->link(__('Item Maintenance Histories'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Item Maintenance History') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Item Maintenance History Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Office') ?></th>
                                    <td><?= $itemMaintenanceHistory->has('office') ? $this->Html->link($itemMaintenanceHistory->office->name_en, ['controller' => 'Offices', 'action' => 'view', $itemMaintenanceHistory->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Supplier') ?></th>
                                    <td><?= $itemMaintenanceHistory->has('supplier') ? $this->Html->link($itemMaintenanceHistory->supplier->name_bn, ['controller' => 'Suppliers', 'action' => 'view', $itemMaintenanceHistory->supplier->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Item') ?></th>
                                    <td><?= $itemMaintenanceHistory->has('item') ? $this->Html->link($itemMaintenanceHistory->item->id, ['controller' => 'Items', 'action' => 'view', $itemMaintenanceHistory->item->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Remarks') ?></th>
                                    <td><?= h($itemMaintenanceHistory->remarks) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Type') ?></th>
                                    <td><?= $this->Number->format($itemMaintenanceHistory->type) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Start Date') ?></th>
                                    <td><?= $this->Number->format($itemMaintenanceHistory->start_date) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Completion Date') ?></th>
                                    <td><?= $this->Number->format($itemMaintenanceHistory->completion_date) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Warranty Covered') ?></th>
                                    <td><?= $this->Number->format($itemMaintenanceHistory->warranty_covered) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Cost') ?></th>
                                    <td><?= $this->Number->format($itemMaintenanceHistory->cost) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$itemMaintenanceHistory->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

