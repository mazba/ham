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
        <li><?= $this->Html->link(__('Asset Types'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Asset Type List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Asset Type'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('Sl. No.') ?></th>
                                                                                                                    <th><?= __('parent_id') ?></th>
                                                                                                                                                <th><?= __('title_bn') ?></th>
                                                                                                                                                <th><?= __('title_en') ?></th>
                                                                                                                                                <th><?= __('status') ?></th>
                                                                                                                                                                            <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($assetTypes as $key => $assetType) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($key+1) ?></td>
                                                                                                <td><?= $assetType->has('parent_asset_type') ?
                                                    $this->Html->link($assetType->parent_asset_type
                                                    ->title_bn, ['controller' => 'AssetTypes',
                                                    'action' => 'view', $assetType->parent_asset_type
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= h($assetType->title_bn) ?></td>
                                                                                            <td><?= h($assetType->title_en) ?></td>
                                                                                            <td><?= __($status[$assetType->status]) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $assetType->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $assetType->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $assetType->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $assetType->id)]);
                                            
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

