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
            <?= $this->Html->link(__('User Committees'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View User Committee') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('User Committee Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Committee') ?></th>
                                    <td><?= $userCommittee->has('committee') ? $this->Html->link($userCommittee->committee->name_bn, ['controller' => 'Committees', 'action' => 'view', $userCommittee->committee->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office') ?></th>
                                    <td><?= $userCommittee->has('office') ? $this->Html->link($userCommittee->office->name_en, ['controller' => 'Offices', 'action' => 'view', $userCommittee->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('User') ?></th>
                                    <td><?= $userCommittee->has('user') ? $this->Html->link($userCommittee->user->full_name_bn, ['controller' => 'Users', 'action' => 'view', $userCommittee->user->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Committee Designation') ?></th>
                                    <td><?= h($userCommittee->committee_designation) ?></td>
                                </tr>
                                                                                                                                                                                                                
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$userCommittee->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

