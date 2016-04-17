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
        <li><?= $this->Html->link(__('Office Garages'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Office Garage List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Office Garage'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('id') ?></th>
                            <th><?= __('office') ?></th>
                            <th><?= __('office_building') ?></th>
                            <th><?= __('office_room') ?></th>
                            <th><?= __('size') ?></th>
                            <th><?= __('capacity') ?></th>
                            <th><?= __('status') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($officeGarages as $officeGarage) { ?>
                            <tr>
                                <td><?= $this->Number->format($officeGarage->id) ?></td>
                                <td><?= $officeGarage->has('office') ?
                                        $this->Html->link($officeGarage->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $officeGarage->office
                                                ->id]) : '' ?></td>
                                <td><?= $officeGarage->has('office_building') ?
                                        $this->Html->link($officeGarage->office_building
                                            ->title_bn, ['controller' => 'OfficeBuildings',
                                            'action' => 'view', $officeGarage->office_building
                                                ->id]) : '' ?></td>
                                <td><?= $officeGarage->has('office_room') ?
                                        $this->Html->link($officeGarage->office_room
                                            ->title_bn, ['controller' => 'OfficeRooms',
                                            'action' => 'view', $officeGarage->office_room
                                                ->id]) : '' ?></td>
                                <td><?= h($officeGarage->size) ?></td>
                                <td><?= h($officeGarage->capacity) ?></td>
                                <td><?= __($status[$officeGarage->status]); ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $officeGarage->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $officeGarage->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeGarage->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $officeGarage->id)]);
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

