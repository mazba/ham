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
        <li><?= $this->Html->link(__('Office Units'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Office Unit List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Office Unit'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Parent') ?></th>
                            <th><?= __('Office Level') ?></th>
                            <th><?= __('Office Unit Category') ?></th>
                            <th><?= __('Office') ?></th>
                            <th><?= __('Name Bn') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($officeUnits as $key => $officeUnit) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $officeUnit->has('parent_office_unit') ?
                                        $this->Html->link($officeUnit->parent_office_unit
                                            ->name_bn, ['controller' => 'OfficeUnits',
                                            'action' => 'view', $officeUnit->parent_office_unit
                                                ->id]) : '' ?></td>
                                <td><?= $officeUnit->has('office_level') ?
                                        $this->Html->link($officeUnit->office_level
                                            ->name_bn, ['controller' => 'OfficeLevels',
                                            'action' => 'view', $officeUnit->office_level
                                                ->id]) : '' ?></td>
                                <td><?= $officeUnit->has('office_unit_category') ?
                                        $this->Html->link($officeUnit->office_unit_category
                                            ->name_bn, ['controller' => 'OfficeUnitCategories',
                                            'action' => 'view', $officeUnit->office_unit_category
                                                ->id]) : '' ?></td>
                                <td><?= $officeUnit->has('office') ?
                                        $this->Html->link($officeUnit->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $officeUnit->office
                                                ->id]) : '' ?></td>
                                <td><?= h($officeUnit->name_bn) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $officeUnit->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $officeUnit->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeUnit->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $officeUnit->id)]);

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

