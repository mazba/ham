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
        <li><?= $this->Html->link(__('Item Categories'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Item Category List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Item Category'), ['action' => 'add'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Parent') ?></th>
                            <th><?= __('Name En') ?></th>
                            <th><?= __('Name Bn') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($itemCategories as $key => $itemCategory) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $itemCategory->has('parent_item_category') ?
                                        $this->Html->link($itemCategory->parent_item_category
                                            ->name_bn, ['controller' => 'ItemCategories',
                                            'action' => 'view', $itemCategory->parent_item_category
                                                ->id]) : '' ?></td>
                                <td><?= h($itemCategory->name_bn) ?></td>
                                <td><?= h($itemCategory->name_en) ?></td>
                                <td><?= __($status[$itemCategory->status]) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $itemCategory->id], ['class' => 'btn btn-sm btn-info']);
                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $itemCategory->id], ['class' => 'btn btn-sm btn-warning']);
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

