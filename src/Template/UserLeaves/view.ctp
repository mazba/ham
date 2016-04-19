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
        <li>
            <?= $this->Html->link(__('User Leaves'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View User Leave') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('User Leave Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Office') ?></th>
                            <td><?= $userLeave->has('office') ? $this->Html->link($userLeave->office->name_en, ['controller' => 'Offices', 'action' => 'view', $userLeave->office->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('User') ?></th>
                            <td><?= $userLeave->has('user') ? $this->Html->link($userLeave->user->full_name_bn, ['controller' => 'Users', 'action' => 'view', $userLeave->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Responsible User') ?></th>
                            <td><?= $userLeave->has('responsible_user') ? $this->Html->link($userLeave->responsible_user->full_name_bn, ['controller' => 'Users', 'action' => 'view', $userLeave->responsible_user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Approval User') ?></th>
                            <td><?= $userLeave->has('approval_user') ? $this->Html->link($userLeave->approval_user->full_name_bn, ['controller' => 'Users', 'action' => 'view', $userLeave->approval_user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Leave Status') ?></th>
                            <td><?= $userLeave->has('leave_status') ? $this->Html->link($userLeave->leave_status->name_bn, ['controller' => 'LeaveStatuses', 'action' => 'view', $userLeave->leave_status->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Attach File') ?></th>

                            <td>
                                <?php
                                if($userLeave->attach_file)
                                    echo $this->Html->link(__('View File'),'/'.$userLeave->attach_file, ['class' => 'btn btn-sm btn-info']);
                                ?>
                            </td>
                        </tr>

                        <tr>
                            <th><?= __('Start Date') ?></th>
                            <td><?= $this->System->display_date($userLeave->start_date) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('End Date') ?></th>
                            <td><?= $this->System->display_date($userLeave->end_date) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Duration') ?></th>
                            <td><?= $this->Number->format($userLeave->duration) ?></td>
                        </tr>


                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= __($status[$userLeave->status]) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

