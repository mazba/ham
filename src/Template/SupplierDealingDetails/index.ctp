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
        <li><?= $this->Html->link(__('Supplier Dealing Details'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Supplier Dealing Detail List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Supplier Dealing Detail'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('Sl. No.') ?></th>
                                                                                                                    <th><?= __('committee_id') ?></th>
                                                                                                                                                <th><?= __('user_id') ?></th>
                                                                                                                                                <th><?= __('deal_type_id') ?></th>
                                                                                                                                                <th><?= __('item_category_id') ?></th>
                                                                                                                                                <th><?= __('title_bn') ?></th>
                                                                                                                                                <th><?= __('title_en') ?></th>
                                                                                                    <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($supplierDealingDetails as $key => $supplierDealingDetail) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($key+1) ?></td>
                                                                                                <td><?= $supplierDealingDetail->has('committee') ?
                                                    $this->Html->link($supplierDealingDetail->committee
                                                    ->name_bn, ['controller' => 'Committees',
                                                    'action' => 'view', $supplierDealingDetail->committee
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $supplierDealingDetail->has('user') ?
                                                    $this->Html->link($supplierDealingDetail->user
                                                    ->full_name_bn, ['controller' => 'Users',
                                                    'action' => 'view', $supplierDealingDetail->user
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= $this->Number->format($supplierDealingDetail->deal_type_id) ?></td>
                                                                                                <td><?= $supplierDealingDetail->has('item_category') ?
                                                    $this->Html->link($supplierDealingDetail->item_category
                                                    ->name_bn, ['controller' => 'ItemCategories',
                                                    'action' => 'view', $supplierDealingDetail->item_category
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= h($supplierDealingDetail->title_bn) ?></td>
                                                                                            <td><?= h($supplierDealingDetail->title_en) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $supplierDealingDetail->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $supplierDealingDetail->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $supplierDealingDetail->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $supplierDealingDetail->id)]);
                                            
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

