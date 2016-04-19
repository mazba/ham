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
        <li><?= $this->Html->link(__('User Leaves'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('User Leave List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New User Leave'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Office') ?></th>
                            <th><?= __('User') ?></th>
                            <th><?= __('Responsible User') ?></th>
                            <th><?= __('Approval User') ?></th>
                            <th><?= __('Leave Status') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userLeaves as $key => $userLeave) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $userLeave->has('office') ?
                                        $this->Html->link($userLeave->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $userLeave->office
                                                ->id]) : '' ?></td>
                                <td><?= $userLeave->has('user') ?
                                        $this->Html->link($userLeave->user
                                            ->full_name_bn, ['controller' => 'Users',
                                            'action' => 'view', $userLeave->user
                                                ->id]) : '' ?></td>
                                <td><?= $userLeave->has('responsible_user') ?
                                        $this->Html->link($userLeave->responsible_user
                                            ->full_name_bn, ['controller' => 'Users',
                                            'action' => 'view', $userLeave->responsible_user
                                                ->id]) : '' ?></td>
                                <td><?= $userLeave->has('approval_user') ?
                                        $this->Html->link($userLeave->approval_user
                                            ->full_name_bn, ['controller' => 'Users',
                                            'action' => 'view', $userLeave->approval_user
                                                ->id]) : '' ?></td>
                                <td><?= $userLeave->has('leave_status') ?
                                        $this->Html->link($userLeave->leave_status
                                            ->name_bn, ['controller' => 'LeaveStatuses',
                                            'action' => 'view', $userLeave->leave_status
                                                ->id]) : '' ?></td>
                                <td><?= $this->System->display_date($userLeave->start_date) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $userLeave->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $userLeave->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $userLeave->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $userLeave->id)]);

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

