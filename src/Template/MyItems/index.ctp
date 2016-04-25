<?php
$status = \Cake\Core\Configure::read('status_options');
$assign_type = \Cake\Core\Configure::read('item_assign_type');
$assign_type=array_flip($assign_type);
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
                    <i class="fa fa-coffee"></i><?= __('My Product List') ?>
                </div>
                <div class="tools">

                </div>
            </div>

            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('id') ?></th>
                            <th><?= __('name') ?></th>
                            <th><?= __('serial number') ?></th>
                            <th><?= __('model number') ?></th>

                            <th><?= __('assign date') ?></th>
                            <th><?= __('next maintainance date') ?></th>
                            <th><?= __('assign type') ?></th>
                            <th><?= __('status') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($items as $item) { ?>
                            <tr>
                                <td><?= $this->Number->format($item->id) ?></td>
                                <td><?= h($item->item->title_bn) ?></td>
                                <td><?= h($item->item->serial_number) ?></td>
                                <td><?= h($item->item->model_number) ?></td>

                                <td><?= ($item->formatted_assign_date) ?></td>
                                <td><?= $this->System->display_date($item->next_maintainance_date) ?></td>
                                <td><?= __($assign_type[$item->assign_type]) ?></td>
                                <td><?= __($status[$item->status]) ?></td>

                            </tr>
                        <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

