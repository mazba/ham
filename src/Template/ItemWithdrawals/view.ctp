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
            <?= $this->Html->link(__('Item Withdrawals'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Item Withdrawal') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Item Withdrawal Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Item Assign') ?></th>
                                    <td><?= $itemWithdrawal->has('item_assign') ? $this->Html->link($itemWithdrawal->item_assign->id, ['controller' => 'ItemAssigns', 'action' => 'view', $itemWithdrawal->item_assign->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office') ?></th>
                                    <td><?= $itemWithdrawal->has('office') ? $this->Html->link($itemWithdrawal->office->name_en, ['controller' => 'Offices', 'action' => 'view', $itemWithdrawal->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Warehouse') ?></th>
                                    <td><?= $itemWithdrawal->has('office_warehouse') ? $this->Html->link($itemWithdrawal->office_warehouse->id, ['controller' => 'OfficeWarehouses', 'action' => 'view', $itemWithdrawal->office_warehouse->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Remarks') ?></th>
                                    <td><?= h($itemWithdrawal->remarks) ?></td>
                                </tr>
                                                                                                                                                                                                                
                                                            <tr>
                                    <th><?= __('Withdrawal Type') ?></th>
                                    <td><?= $this->Number->format($itemWithdrawal->withdrawal_type) ?></td>
                                </tr>
                                                    
                                                            <tr>
                                    <th><?= __('Withdrawal Time') ?></th>
                                    <td><?= $this->Number->format($itemWithdrawal->withdrawal_time) ?></td>
                                </tr>
                                                    
                            
                                <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= __($status[$itemWithdrawal->status]) ?></td>
                                </tr>
                                                                                                                                                                                                                                                                                                                                                                            </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

