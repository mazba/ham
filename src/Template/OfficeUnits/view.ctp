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
            <?= $this->Html->link(__('Office Units'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Office Unit') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Office Unit Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Parent Office Unit') ?></th>
                                    <td><?= $officeUnit->has('parent_office_unit') ? $this->Html->link($officeUnit->parent_office_unit->name_bn, ['controller' => 'OfficeUnits', 'action' => 'view', $officeUnit->parent_office_unit->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Level') ?></th>
                                    <td><?= $officeUnit->has('office_level') ? $this->Html->link($officeUnit->office_level->name_bn, ['controller' => 'OfficeLevels', 'action' => 'view', $officeUnit->office_level->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Unit Category') ?></th>
                                    <td><?= $officeUnit->has('office_unit_category') ? $this->Html->link($officeUnit->office_unit_category->name_bn, ['controller' => 'OfficeUnitCategories', 'action' => 'view', $officeUnit->office_unit_category->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office') ?></th>
                                    <td><?= $officeUnit->has('office') ? $this->Html->link($officeUnit->office->name_en, ['controller' => 'Offices', 'action' => 'view', $officeUnit->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name Bn') ?></th>
                                    <td><?= h($officeUnit->name_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name En') ?></th>
                                    <td><?= h($officeUnit->name_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Unit Nothi Code') ?></th>
                                    <td><?= h($officeUnit->unit_nothi_code) ?></td>
                                </tr>
                                                                                                                                                                                                                
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$officeUnit->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

