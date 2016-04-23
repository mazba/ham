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
        <li><?= $this->Html->link(__('Item Maintenances'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Item Maintenance List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Item Maintenance'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
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
                                                                                                                                                <th><?= __('total_maintenance_number') ?></th>
                                                                                                                                                <th><?= __('free_maintenance_number') ?></th>
                                                                                                                                                <th><?= __('free_maintenance_time_period') ?></th>
                                                                                                    <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($itemMaintenances as $key => $itemMaintenance) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($key+1) ?></td>
                                                                                                <td><?= $itemMaintenance->has('office') ?
                                                    $this->Html->link($itemMaintenance->office
                                                    ->name_en, ['controller' => 'Offices',
                                                    'action' => 'view', $itemMaintenance->office
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemMaintenance->has('supplier') ?
                                                    $this->Html->link($itemMaintenance->supplier
                                                    ->name_bn, ['controller' => 'Suppliers',
                                                    'action' => 'view', $itemMaintenance->supplier
                                                    ->id]) : '' ?></td>
                                                                                                        <td><?= $itemMaintenance->has('item') ?
                                                    $this->Html->link($itemMaintenance->item
                                                    ->id, ['controller' => 'Items',
                                                    'action' => 'view', $itemMaintenance->item
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= $this->Number->format($itemMaintenance->total_maintenance_number) ?></td>
                                                                                            <td><?= $this->Number->format($itemMaintenance->free_maintenance_number) ?></td>
                                                                                            <td><?= $this->Number->format($itemMaintenance->free_maintenance_time_period) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $itemMaintenance->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $itemMaintenance->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemMaintenance->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $itemMaintenance->id)]);
                                            
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

