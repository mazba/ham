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
        <li><?= $this->Html->link(__('Office Levels'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Office Level List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Office Level'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>

            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('id') ?></th>
                            <th><?= __('name') ?></th>
                            <th><?= __('parent') ?></th>
                            <th><?= __('level') ?></th>
                            <th><?= __('status') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($officeLevels as $officeLevel) { ?>
                            <tr>
                                <td><?= $this->Number->format($officeLevel->id) ?></td>
                                <td><?= h($officeLevel->name_bn) ?></td>
                                <td><?= $officeLevel->has('parent_office_level') ?
                                        $this->Html->link($officeLevel->parent_office_level
                                            ->name_bn, ['controller' => 'OfficeLevels',
                                            'action' => 'view', $officeLevel->parent_office_level
                                                ->id]) : '' ?></td>
                                <td><?= $this->Number->format($officeLevel->level) ?></td>
                                <td><?= __($status[$officeLevel->status]) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $officeLevel->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $officeLevel->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $officeLevel->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $officeLevel->id)]);

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

