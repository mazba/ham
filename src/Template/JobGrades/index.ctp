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
        <li><?= $this->Html->link(__('Job Grades'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Job Grade List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Job Grade'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('id') ?></th>
                            <th><?= __('job_cadre') ?></th>
                            <th><?= __('job_rank') ?></th>
                            <th><?= __('name') ?></th>
                            <th><?= __('status') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($jobGrades as $key => $jobGrade) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $jobGrade->has('job_cadre') ?
                                        $this->Html->link($jobGrade->job_cadre
                                            ->name_bn, ['controller' => 'JobCadres',
                                            'action' => 'view', $jobGrade->job_cadre
                                                ->id]) : '' ?></td>
                                <td><?= $jobGrade->has('job_rank') ?
                                        $this->Html->link($jobGrade->job_rank
                                            ->rank_name_bn, ['controller' => 'JobRanks',
                                            'action' => 'view', $jobGrade->job_rank
                                                ->id]) : '' ?></td>
                                <td><?= h($jobGrade->name_bn) ?></td>
                                <td><?= $this->Number->format($jobGrade->status) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $jobGrade->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $jobGrade->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $jobGrade->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $jobGrade->id)]);

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

