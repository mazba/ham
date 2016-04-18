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
        <li><?= $this->Html->link(__('User Committees'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('User Committee List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New User Committee'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Committee') ?></th>
                            <th><?= __('User') ?></th>
                            <th><?= __('Committee Designation') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($userCommittees as $key => $userCommittee) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $userCommittee->has('committee') ?
                                        $this->Html->link($userCommittee->committee
                                            ->name_bn, ['controller' => 'Committees',
                                            'action' => 'view', $userCommittee->committee
                                                ->id]) : '' ?></td>
                                <td><?= $userCommittee->has('user') ?
                                        $this->Html->link($userCommittee->user
                                            ->full_name_bn, ['controller' => 'Users',
                                            'action' => 'view', $userCommittee->user
                                                ->id]) : '' ?></td>
                                <td><?= h($userCommittee->committee_designation) ?></td>
                                <td><?= __($status[$userCommittee->status]) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $userCommittee->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $userCommittee->id], ['class' => 'btn btn-sm btn-warning']);

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

