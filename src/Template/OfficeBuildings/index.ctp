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
        <li><?= $this->Html->link(__('Office Buildings'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Office Building List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Office Building'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('id') ?></th>
                            <th><?= __('title') ?></th>
                            <th><?= __('office') ?></th>
                            <th><?= __('type') ?></th>
                            <th><?= __('number_storeys') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($officeBuildings as $officeBuilding) { ?>
                            <tr>
                                <td><?= $this->Number->format($officeBuilding->id) ?></td>
                                <td><?= h($officeBuilding->title_bn) ?></td>
                                <td><?= $officeBuilding->has('office') ?
                                        $this->Html->link($officeBuilding->office
                                            ->name_bn, ['controller' => 'Offices',
                                            'action' => 'view', $officeBuilding->office
                                                ->id]) : '' ?></td>
                                <td><?= h($officeBuilding->type) ?></td>
                                <td><?= $this->Number->format($officeBuilding->number_storeys) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $officeBuilding->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $officeBuilding->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeBuilding->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $officeBuilding->id)]);

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

