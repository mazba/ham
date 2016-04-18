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
            <?= $this->Html->link(__('Office Unit Designations'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Office Unit Designation') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Office Unit Designation Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Parent Office Unit Designation') ?></th>
                                    <td><?= $officeUnitDesignation->has('parent_office_unit_designation') ? $this->Html->link($officeUnitDesignation->parent_office_unit_designation->name_bn, ['controller' => 'OfficeUnitDesignations', 'action' => 'view', $officeUnitDesignation->parent_office_unit_designation->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office') ?></th>
                                    <td><?= $officeUnitDesignation->has('office') ? $this->Html->link($officeUnitDesignation->office->name_en, ['controller' => 'Offices', 'action' => 'view', $officeUnitDesignation->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Unit') ?></th>
                                    <td><?= $officeUnitDesignation->has('office_unit') ? $this->Html->link($officeUnitDesignation->office_unit->name_bn, ['controller' => 'OfficeUnits', 'action' => 'view', $officeUnitDesignation->office_unit->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name En') ?></th>
                                    <td><?= h($officeUnitDesignation->name_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name Bn') ?></th>
                                    <td><?= h($officeUnitDesignation->name_bn) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Level Number') ?></th>
                                    <td><?= $this->Number->format($officeUnitDesignation->level_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Sequence Number') ?></th>
                                    <td><?= $this->Number->format($officeUnitDesignation->sequence_number) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Post Number') ?></th>
                                    <td><?= $this->Number->format($officeUnitDesignation->post_number) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$officeUnitDesignation->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

