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
            <?= $this->Html->link(__('Item Maintenances'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Item Maintenance') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Item Maintenance Details') ?>
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
                                    <td><?= $itemMaintenance->has('office') ? $this->Html->link($itemMaintenance->office->name_en, ['controller' => 'Offices', 'action' => 'view', $itemMaintenance->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Supplier') ?></th>
                                    <td><?= $itemMaintenance->has('supplier') ? $this->Html->link($itemMaintenance->supplier->name_bn, ['controller' => 'Suppliers', 'action' => 'view', $itemMaintenance->supplier->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Item') ?></th>
                                    <td><?= $itemMaintenance->has('item') ? $this->Html->link($itemMaintenance->item->id, ['controller' => 'Items', 'action' => 'view', $itemMaintenance->item->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Maintenance Schedule') ?></th>
                                    <td><?= h($itemMaintenance->maintenance_schedule) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Total Maintenance Number') ?></th>
                                    <td><?= $this->Number->format($itemMaintenance->total_maintenance_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Free Maintenance Number') ?></th>
                                    <td><?= $this->Number->format($itemMaintenance->free_maintenance_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Free Maintenance Time Period') ?></th>
                                    <td><?= $this->Number->format($itemMaintenance->free_maintenance_time_period) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Each Maintenance Cost') ?></th>
                                    <td><?= $this->Number->format($itemMaintenance->each_maintenance_cost) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$itemMaintenance->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

