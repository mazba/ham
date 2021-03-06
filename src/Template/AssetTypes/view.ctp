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
            <?= $this->Html->link(__('Asset Types'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Asset Type') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Asset Type Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Parent Asset Type') ?></th>
                                    <td><?= $assetType->has('parent_asset_type') ? $this->Html->link($assetType->parent_asset_type->title_bn, ['controller' => 'AssetTypes', 'action' => 'view', $assetType->parent_asset_type->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title Bn') ?></th>
                                    <td><?= h($assetType->title_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title En') ?></th>
                                    <td><?= h($assetType->title_en) ?></td>
                                </tr>
                                                                                                                                                                                                                
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$assetType->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

