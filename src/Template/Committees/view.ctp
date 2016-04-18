<?php
use Cake\Core\Configure;
$status = Configure::read('status_options');
?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Committees'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Committee') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Committee List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Parent Committee') ?></th>
                            <td><?= $committee->has('parent_committee') ? $this->Html->link($committee->parent_committee->name_bn, ['controller' => 'Committees', 'action' => 'view', $committee->parent_committee->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Office') ?></th>
                            <td><?= $committee->has('office') ? $this->Html->link($committee->office->name_en, ['controller' => 'Offices', 'action' => 'view', $committee->office->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Name Bn') ?></th>
                            <td><?= h($committee->name_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Name En') ?></th>
                            <td><?= h($committee->name_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Attached File') ?></th>
                            <td><?= h($committee->attached_file) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Member Size') ?></th>
                            <td><?= $this->Number->format($committee->member_size) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Start Date') ?></th>
                            <td><?= $this->System->display_date($committee->start_date) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('End Date') ?></th>
                            <td><?= $this->System->display_date($committee->end_date) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= $status[$committee->status] ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Create Time') ?></th>
                            <td><?= $this->System->display_date($committee->create_time) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Update Time') ?></th>
                            <td><?= $this->System->display_date($committee->update_time) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

