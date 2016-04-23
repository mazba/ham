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
        <li><?= $this->Html->link(__('Item Maintenance Histories'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Item Maintenance History List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Item Maintenance History'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('Sl. No.') ?></th>
                                                                                                                    <th><?= __('office_id') ?></th>
                                                                                                                                                <th><?= __('supplier_id') ?></th>
                                                                                                                                                <th><?= __('item_id') ?></th>
                                                                                                                                                <th><?= __('type') ?></th>
                                                                                                                                                <th><?= __('start_date') ?></th>
                                                                                                                                                <th><?= __('completion_date') ?></th>
                                                                                                    <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($itemMaintenanceHistories as $key => $itemMaintenanceHistory) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($key+1) ?></td>
                                                                                                <td><?= $itemMaintenanceHistory->has('office') ?
                                                    $this->Html->link($itemMaintenanceHistory->office
                                                    ->name_en, ['controller' => 'Offices',
                                                    'action' => 'view', $itemMaintenanceHistory->office
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemMaintenanceHistory->has('supplier') ?
                                                    $this->Html->link($itemMaintenanceHistory->supplier
                                                    ->name_bn, ['controller' => 'Suppliers',
                                                    'action' => 'view', $itemMaintenanceHistory->supplier
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemMaintenanceHistory->has('item') ?
                                                    $this->Html->link($itemMaintenanceHistory->item
                                                    ->id, ['controller' => 'Items',
                                                    'action' => 'view', $itemMaintenanceHistory->item
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= $this->Number->format($itemMaintenanceHistory->type) ?></td>
                                                                                            <td><?= $this->System->display_date($itemMaintenanceHistory->start_date) ?></td>
                                                                                            <td><?= $this->System->display_date($itemMaintenanceHistory->completion_date) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $itemMaintenanceHistory->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $itemMaintenanceHistory->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemMaintenanceHistory->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $itemMaintenanceHistory->id)]);
                                            
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

