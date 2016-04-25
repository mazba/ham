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
        <li><?= $this->Html->link(__('Item Assigns'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-list-alt fa-lg"></i><?= __('Item Assign List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Item Assign'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('Sl. No.') ?></th>
                            <th><?= __('Assign Type') ?></th>
                            <th><?= __('Office') ?></th>
                            <th><?= __('Office Building') ?></th>
                            <th><?= __('Office Room') ?></th>
                            <th><?= __('Office Warehouse') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($itemAssigns as $key => $itemAssign) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?php $assign_type = array_flip(Configure::read('item_assign_type'));
                                    echo $assign_type[$itemAssign->assign_type]; ?></td>
                                <td><?= $itemAssign->has('office') ?
                                        $this->Html->link($itemAssign->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $itemAssign->office
                                                ->id]) : '' ?></td>
                                <td><?= $itemAssign->has('office_building') ?
                                        $this->Html->link($itemAssign->office_building
                                            ->title_bn, ['controller' => 'OfficeBuildings',
                                            'action' => 'view', $itemAssign->office_building
                                                ->id]) : '' ?></td>
                                <td><?= $itemAssign->has('office_room') ?
                                        $this->Html->link($itemAssign->office_room
                                            ->title_bn, ['controller' => 'OfficeRooms',
                                            'action' => 'view', $itemAssign->office_room
                                                ->id]) : '' ?></td>
                                <td><?= $itemAssign->has('office_warehouse') ?
                                        $this->Html->link($itemAssign->office_warehouse
                                            ->title_bn, ['controller' => 'OfficeWarehouses',
                                            'action' => 'view', $itemAssign->office_warehouse
                                                ->id]) : '' ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $itemAssign->id], ['class' => 'btn btn-sm btn-info']);
                                    if($roles['edit']){
                                        echo $this->Html->link(__('Edit'), ['action' => 'edit', $itemAssign->id], ['class' => 'btn btn-sm btn-warning']);
                                    }


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

