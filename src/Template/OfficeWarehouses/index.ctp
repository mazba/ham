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
        <li><?= $this->Html->link(__('Office Warehouses'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Office Warehouse List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Office Warehouse'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th><?= __('id') ?></th>
                                <th><?= __('parent') ?></th>
                                <th><?= __('office') ?></th>
                                <th><?= __('office_building') ?></th>
                                <th><?= __('office_room') ?></th>
                                <th><?= __('code') ?></th>
                                <th><?= __('title_bn') ?></th>
                                <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($officeWarehouses as $key => $officeWarehouse) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $officeWarehouse->has('parent_office_warehouse') ?
                                        $this->Html->link($officeWarehouse->parent_office_warehouse
                                            ->id, ['controller' => 'OfficeWarehouses',
                                            'action' => 'view', $officeWarehouse->parent_office_warehouse
                                                ->id]) : '' ?></td>
                                <td><?= $officeWarehouse->has('office') ?
                                        $this->Html->link($officeWarehouse->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $officeWarehouse->office
                                                ->id]) : '' ?></td>
                                <td><?= $officeWarehouse->has('office_building') ?
                                        $this->Html->link($officeWarehouse->office_building
                                            ->title_bn, ['controller' => 'OfficeBuildings',
                                            'action' => 'view', $officeWarehouse->office_building
                                                ->id]) : '' ?></td>
                                <td><?= $officeWarehouse->has('office_room') ?
                                        $this->Html->link($officeWarehouse->office_room
                                            ->title_bn, ['controller' => 'OfficeRooms',
                                            'action' => 'view', $officeWarehouse->office_room
                                                ->id]) : '' ?></td>
                                <td><?= h($officeWarehouse->code) ?></td>
                                <td><?= h($officeWarehouse->title_bn) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $officeWarehouse->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $officeWarehouse->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeWarehouse->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $officeWarehouse->id)]);

                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
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

