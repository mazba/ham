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
        <li><?= $this->Html->link(__('Item Withdrawals'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Item Withdrawal List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Item Withdrawal'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('Sl. No.') ?></th>
                                                                                                                    <th><?= __('item_assign_id') ?></th>
                                                                                                                                                <th><?= __('withdrawal_type') ?></th>
                                                                                                                                                <th><?= __('office_id') ?></th>
                                                                                                                                                <th><?= __('office_warehouse_id') ?></th>
                                                                                                                                                <th><?= __('withdrawal_time') ?></th>
                                                                                                                                                <th><?= __('remarks') ?></th>
                                                                                                    <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($itemWithdrawals as $key => $itemWithdrawal) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($key+1) ?></td>
                                                                                                <td><?= $itemWithdrawal->has('item_assign') ?
                                                    $this->Html->link($itemWithdrawal->item_assign
                                                    ->id, ['controller' => 'ItemAssigns',
                                                    'action' => 'view', $itemWithdrawal->item_assign
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= $this->Number->format($itemWithdrawal->withdrawal_type) ?></td>
                                                                                                <td><?= $itemWithdrawal->has('office') ?
                                                    $this->Html->link($itemWithdrawal->office
                                                    ->name_en, ['controller' => 'Offices',
                                                    'action' => 'view', $itemWithdrawal->office
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemWithdrawal->has('office_warehouse') ?
                                                    $this->Html->link($itemWithdrawal->office_warehouse
                                                    ->id, ['controller' => 'OfficeWarehouses',
                                                    'action' => 'view', $itemWithdrawal->office_warehouse
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= $this->Number->format($itemWithdrawal->withdrawal_time) ?></td>
                                                                                            <td><?= h($itemWithdrawal->remarks) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $itemWithdrawal->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $itemWithdrawal->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemWithdrawal->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $itemWithdrawal->id)]);
                                            
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

