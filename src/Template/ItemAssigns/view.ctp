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
            <?= $this->Html->link(__('Item Assigns'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Item Assign') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Item Assign Details') ?>
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
                                    <td><?= $itemAssign->has('office') ? $this->Html->link($itemAssign->office->name_en, ['controller' => 'Offices', 'action' => 'view', $itemAssign->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Building') ?></th>
                                    <td><?= $itemAssign->has('office_building') ? $this->Html->link($itemAssign->office_building->title_bn, ['controller' => 'OfficeBuildings', 'action' => 'view', $itemAssign->office_building->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Room') ?></th>
                                    <td><?= $itemAssign->has('office_room') ? $this->Html->link($itemAssign->office_room->title_bn, ['controller' => 'OfficeRooms', 'action' => 'view', $itemAssign->office_room->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Warehouse') ?></th>
                                    <td><?= $itemAssign->has('office_warehouse') ? $this->Html->link($itemAssign->office_warehouse->id, ['controller' => 'OfficeWarehouses', 'action' => 'view', $itemAssign->office_warehouse->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Unit') ?></th>
                                    <td><?= $itemAssign->has('office_unit') ? $this->Html->link($itemAssign->office_unit->name_bn, ['controller' => 'OfficeUnits', 'action' => 'view', $itemAssign->office_unit->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Designation') ?></th>
                                    <td><?= $itemAssign->has('designation') ? $this->Html->link($itemAssign->designation->name_bn, ['controller' => 'Designations', 'action' => 'view', $itemAssign->designation->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Item') ?></th>
                                    <td><?= $itemAssign->has('item') ? $this->Html->link($itemAssign->item->id, ['controller' => 'Items', 'action' => 'view', $itemAssign->item->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Usage Instruction') ?></th>
                                    <td><?= h($itemAssign->usage_instruction) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Assign Type') ?></th>
                                    <td><?= $this->Number->format($itemAssign->assign_type) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Designated User Id') ?></th>
                                    <td><?= $this->Number->format($itemAssign->designated_user_id) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Quantity') ?></th>
                                    <td><?= $this->Number->format($itemAssign->quantity) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Assign Date') ?></th>
                                    <td><?= $this->Number->format($itemAssign->assign_date) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Expected Usage Time') ?></th>
                                    <td><?= $this->Number->format($itemAssign->expected_usage_time) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Next Maintainance Date') ?></th>
                                    <td><?= $this->Number->format($itemAssign->next_maintainance_date) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$itemAssign->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

