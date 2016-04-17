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
            <?= $this->Html->link(__('Office Warehouses'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Office Warehouse') ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Office Warehouse Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Parent Office Warehouse') ?></th>
                            <td><?= $officeWarehouse->has('parent_office_warehouse') ? $this->Html->link($officeWarehouse->parent_office_warehouse->id, ['controller' => 'OfficeWarehouses', 'action' => 'view', $officeWarehouse->parent_office_warehouse->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Office') ?></th>
                            <td><?= $officeWarehouse->has('office') ? $this->Html->link($officeWarehouse->office->name_en, ['controller' => 'Offices', 'action' => 'view', $officeWarehouse->office->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Office Building') ?></th>
                            <td><?= $officeWarehouse->has('office_building') ? $this->Html->link($officeWarehouse->office_building->title_bn, ['controller' => 'OfficeBuildings', 'action' => 'view', $officeWarehouse->office_building->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Office Room') ?></th>
                            <td><?= $officeWarehouse->has('office_room') ? $this->Html->link($officeWarehouse->office_room->title_bn, ['controller' => 'OfficeRooms', 'action' => 'view', $officeWarehouse->office_room->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Code') ?></th>
                            <td><?= h($officeWarehouse->code) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Title Bn') ?></th>
                            <td><?= h($officeWarehouse->title_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Title En') ?></th>
                            <td><?= h($officeWarehouse->title_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Size') ?></th>
                            <td><?= h($officeWarehouse->size) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= __($status[$officeWarehouse->status]); ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

