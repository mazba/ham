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
        <li><?= $this->Html->link(__('Office Rooms'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Office Room List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Office Room'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('id') ?></th>
                            <th><?= __('title') ?></th>
                            <th><?= __('parent') ?></th>
                            <th><?= __('office') ?></th>
                            <th><?= __('office_building') ?></th>
                            <th><?= __('office_unit') ?></th>
                            <th><?= __('floor_number') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($officeRooms as $officeRoom) { ?>
                            <tr>
                                <td><?= $this->Number->format($officeRoom->id) ?></td>
                                <td><?= h($officeRoom->title_bn) ?></td>
                                <td><?= $officeRoom->has('parent_office_room') ?
                                        $this->Html->link($officeRoom->parent_office_room
                                            ->title_bn, ['controller' => 'OfficeRooms',
                                            'action' => 'view', $officeRoom->parent_office_room
                                                ->id]) : '' ?></td>
                                <td><?= $officeRoom->has('office') ?
                                        $this->Html->link($officeRoom->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $officeRoom->office
                                                ->id]) : '' ?></td>
                                <td><?= $officeRoom->has('office_building') ?
                                        $this->Html->link($officeRoom->office_building
                                            ->title_bn, ['controller' => 'OfficeBuildings',
                                            'action' => 'view', $officeRoom->office_building
                                                ->id]) : '' ?></td>
                                <td><?= $officeRoom->has('office_unit') ?
                                        $this->Html->link($officeRoom->office_unit
                                            ->id, ['controller' => 'OfficeUnits',
                                            'action' => 'view', $officeRoom->office_unit
                                                ->id]) : '' ?></td>
                                <td><?= $this->Number->format($officeRoom->floor_number) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $officeRoom->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $officeRoom->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeRoom->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $officeRoom->id)]);
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
    </div>
</div>

