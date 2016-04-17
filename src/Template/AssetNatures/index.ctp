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
        <li><?= $this->Html->link(__('Asset Natures'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Asset Nature List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Asset Nature'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('id') ?></th>
                                                                                                                                                <th><?= __('parent_id') ?></th>
                                                                                                                                                <th><?= __('title_bn') ?></th>
                                                                                                                                                <th><?= __('title_en') ?></th>
                                                                                                                                                <th><?= __('status') ?></th>
                                                                                                                                                                            <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($assetNatures as $key => $assetNature) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($key+1) ?></td>
                                                                                                <td><?= $assetNature->has('parent_asset_nature') ?
                                                    $this->Html->link($assetNature->parent_asset_nature
                                                    ->title_bn, ['controller' => 'AssetNatures',
                                                    'action' => 'view', $assetNature->parent_asset_nature
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= h($assetNature->title_bn) ?></td>
                                                                                            <td><?= h($assetNature->title_en) ?></td>
                                                                                            <td><?= $this->Number->format($assetNature->status) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $assetNature->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $assetNature->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $assetNature->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $assetNature->id)]);
                                            
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

