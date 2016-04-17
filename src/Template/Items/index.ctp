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
        <li><?= $this->Html->link(__('Items'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Item List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Item'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('id') ?></th>
                                                                                                                                                <th><?= __('parent_id') ?></th>
                                                                                                                                                <th><?= __('serial_number') ?></th>
                                                                                                                                                <th><?= __('office_serial_number') ?></th>
                                                                                                                                                <th><?= __('model_number') ?></th>
                                                                                                                                                <th><?= __('code') ?></th>
                                                                                                                                                <th><?= __('short_code') ?></th>
                                                                                                    <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($items as $item) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($item->id) ?></td>
                                                                                                <td><?= $item->has('parent_item') ?
                                                    $this->Html->link($item->parent_item
                                                    ->id, ['controller' => 'Items',
                                                    'action' => 'view', $item->parent_item
                                                    ->id]) : '' ?></td>
                                                                                                    <td><?= h($item->serial_number) ?></td>
                                                                                            <td><?= h($item->office_serial_number) ?></td>
                                                                                            <td><?= h($item->model_number) ?></td>
                                                                                            <td><?= h($item->code) ?></td>
                                                                                            <td><?= h($item->short_code) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $item->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $item->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $item->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $item->id)]);
                                            
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

