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
        <li><?= $this->Html->link(__('Office Unit Designations'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Office Unit Designation List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Office Unit Designation'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Parent') ?></th>
                            <th><?= __('Office') ?></th>
                            <th><?= __('Office Unit') ?></th>
                            <th><?= __('Name Bn') ?></th>
                            <th><?= __('Level') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($officeUnitDesignations as $key => $officeUnitDesignation) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $officeUnitDesignation->has('parent_office_unit_designation') ?
                                        $this->Html->link($officeUnitDesignation->parent_office_unit_designation
                                            ->name_bn, ['controller' => 'OfficeUnitDesignations',
                                            'action' => 'view', $officeUnitDesignation->parent_office_unit_designation
                                                ->id]) : '' ?></td>
                                <td><?= $officeUnitDesignation->has('office') ?
                                        $this->Html->link($officeUnitDesignation->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $officeUnitDesignation->office
                                                ->id]) : '' ?></td>
                                <td><?= $officeUnitDesignation->has('office_unit') ?
                                        $this->Html->link($officeUnitDesignation->office_unit
                                            ->name_bn, ['controller' => 'OfficeUnits',
                                            'action' => 'view', $officeUnitDesignation->office_unit
                                                ->id]) : '' ?></td>
                                <td><?= h($officeUnitDesignation->name_bn) ?></td>
                                <td><?= $this->Number->format($officeUnitDesignation->level_number) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $officeUnitDesignation->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $officeUnitDesignation->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeUnitDesignation->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $officeUnitDesignation->id)]);

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

