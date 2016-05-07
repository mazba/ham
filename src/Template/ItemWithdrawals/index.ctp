<?php
use Cake\Core\Configure;
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
                    <?= $this->Html->link(__('New Item Withdrawal'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Item') ?></th>
                            <th><?= __('Withdrawal Type') ?></th>
                            <th><?= __('Office') ?></th>
                            <th><?= __('Office Warehouse') ?></th>
                            <th><?= __('Withdrawal Time') ?></th>
                            <th><?= __('Remarks') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($itemWithdrawals as $key => $itemWithdrawal) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $items[$itemWithdrawal->item_assign->id] ?></td>
                                <td><?= array_flip(Configure::read('item_withdrawal_type'))[$itemWithdrawal->withdrawal_type] ?></td>
                                <td><?= $itemWithdrawal->has('office') ?
                                        $this->Html->link($itemWithdrawal->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $itemWithdrawal->office
                                                ->id]) : '' ?></td>
                                <td><?= $officeWarehouses[$itemWithdrawal->office_warehouse->id]; ?></td>
                                <td><?= $itemWithdrawal->withdrawal_time?date('d-m-Y', $itemWithdrawal->withdrawal_time):'' ?></td>
                                <td><?= h($itemWithdrawal->remarks) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $itemWithdrawal->id], ['class' => 'btn btn-sm btn-info']);
                                    ?>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
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

