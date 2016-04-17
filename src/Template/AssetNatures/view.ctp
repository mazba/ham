<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Asset Natures'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Asset Nature') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Asset Nature Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Parent Asset Nature') ?></th>
                                    <td><?= $assetNature->has('parent_asset_nature') ? $this->Html->link($assetNature->parent_asset_nature->title_bn, ['controller' => 'AssetNatures', 'action' => 'view', $assetNature->parent_asset_nature->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title Bn') ?></th>
                                    <td><?= h($assetNature->title_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title En') ?></th>
                                    <td><?= h($assetNature->title_en) ?></td>
                                </tr>
                                                                                                                                                                                    <tr>
                                    <th><?= __('Id') ?></th>
                                    <td><?= $this->Number->format($assetNature->id) ?></td>
                                </tr>
                                                                                    <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $this->Number->format($assetNature->status) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

