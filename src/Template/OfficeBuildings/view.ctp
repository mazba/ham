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
            <?= $this->Html->link(__('Office Buildings'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Office Building') ?></li>
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
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Office') ?></th>
                            <td><?= $officeBuilding->has('office') ? $this->Html->link($officeBuilding->office->name_en, ['controller' => 'Offices', 'action' => 'view', $officeBuilding->office->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Type') ?></th>
                            <td><?= h($officeBuilding->type) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Title') ?></th>
                            <td><?= h($officeBuilding->title_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Total Area') ?></th>
                            <td><?= h($officeBuilding->total_area) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Address') ?></th>
                            <td><?= h($officeBuilding->address) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Number Storeys') ?></th>
                            <td><?= $this->Number->format($officeBuilding->number_storeys) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Number Room') ?></th>
                            <td><?= $this->Number->format($officeBuilding->number_room) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= $this->Number->format($officeBuilding->status) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

