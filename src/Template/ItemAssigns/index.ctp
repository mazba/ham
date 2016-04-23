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
        <li><?= $this->Html->link(__('Item Assigns'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Item Assign List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Item Assign'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('Sl. No.') ?></th>
                                                                                                                    <th><?= __('assign_type') ?></th>
                                                                                                                                                <th><?= __('office_id') ?></th>
                                                                                                                                                <th><?= __('office_building_id') ?></th>
                                                                                                                                                <th><?= __('office_room_id') ?></th>
                                                                                                                                                <th><?= __('office_warehouse_id') ?></th>
                                                                                                                                                <th><?= __('office_unit_id') ?></th>
                                                                                                    <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($itemAssigns as $key => $itemAssign) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($key+1) ?></td>
                                                                                            <td><?= $this->Number->format($itemAssign->assign_type) ?></td>
                                                                                                <td><?= $itemAssign->has('office') ?
                                                    $this->Html->link($itemAssign->office
                                                    ->name_en, ['controller' => 'Offices',
                                                    'action' => 'view', $itemAssign->office
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemAssign->has('office_building') ?
                                                    $this->Html->link($itemAssign->office_building
                                                    ->title_bn, ['controller' => 'OfficeBuildings',
                                                    'action' => 'view', $itemAssign->office_building
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemAssign->has('office_room') ?
                                                    $this->Html->link($itemAssign->office_room
                                                    ->title_bn, ['controller' => 'OfficeRooms',
                                                    'action' => 'view', $itemAssign->office_room
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemAssign->has('office_warehouse') ?
                                                    $this->Html->link($itemAssign->office_warehouse
                                                    ->id, ['controller' => 'OfficeWarehouses',
                                                    'action' => 'view', $itemAssign->office_warehouse
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemAssign->has('office_unit') ?
                                                    $this->Html->link($itemAssign->office_unit
                                                    ->name_bn, ['controller' => 'OfficeUnits',
                                                    'action' => 'view', $itemAssign->office_unit
                                                    ->id]) : '' ?></td>
                                                                                        <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $itemAssign->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $itemAssign->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemAssign->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $itemAssign->id)]);
                                            
                                        ?>

                                    </td>
                                </tr>

                        <?php } ?>
                        </tbody>
                    </table>
                </div>
                <ul class="pagination">
                       <?php
                       echo $this->Paginator->prev('<<');
                       echo $this->Paginator->numbers();
                       echo $this->Paginator->next('>>');
                       ?>
                   </ul>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

