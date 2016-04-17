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
        <li><?= $this->Html->link(__('Manufacturers'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Manufacturer List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Manufacturer'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                                                                                            <th><?= __('id') ?></th>
                                                                                                                                                <th><?= __('code') ?></th>
                                                                                                                                                <th><?= __('NAME_BN') ?></th>
                                                                                                                    <th><?= __('NAME_EN') ?></th>
                                                                                                                    <th><?= __('phone') ?></th>
                                                                                                                                                <th><?= __('fax') ?></th>
                                                                                                                                                <th><?= __('website') ?></th>
                                                                                                    <th><?= __('Actions') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($manufacturers as $manufacturer) {  ?>
                                <tr>
                                                                                    <td><?= $this->Number->format($manufacturer->id) ?></td>
                                                                                            <td><?= h($manufacturer->code) ?></td>
                                                                                            <td><?= h($manufacturer->name_bn) ?></td>
                                                                                            <td><?= h($manufacturer->name_en) ?></td>
                                                                                            <td><?= h($manufacturer->phone) ?></td>
                                                                                            <td><?= h($manufacturer->fax) ?></td>
                                                                                            <td><?= h($manufacturer->website) ?></td>
                                                                                <td class="actions">
                                        <?php
                                            echo $this->Html->link(__('View'), ['action' => 'view', $manufacturer->id],['class'=>'btn btn-sm btn-info']);

                                            echo $this->Html->link(__('Edit'), ['action' => 'edit', $manufacturer->id],['class'=>'btn btn-sm btn-warning']);

                                            echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $manufacturer->id],['class'=>'btn btn-sm btn-danger','confirm' => __('Are you sure you want to delete # {0}?', $manufacturer->id)]);
                                            
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

