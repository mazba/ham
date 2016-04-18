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
        <li><?= $this->Html->link(__('Committees'), ['action' => 'index']) ?></li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Committee List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('New Committee'), ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= __('#') ?></th>
                            <th><?= __('Parent') ?></th>
                            <th><?= __('Office') ?></th>
                            <th><?= __('Name Bn') ?></th>
                            <th><?= __('Member Size') ?></th>
                            <th><?= __('Start Date') ?></th>
                            <th><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($committees as $key => $committee) { ?>
                            <tr>
                                <td><?= $this->Number->format($key + 1) ?></td>
                                <td><?= $committee->has('parent_committee') ?
                                        $this->Html->link($committee->parent_committee
                                            ->name_en, ['controller' => 'Committees',
                                            'action' => 'view', $committee->parent_committee
                                                ->id]) : '' ?></td>
                                <td><?= $committee->has('office') ?
                                        $this->Html->link($committee->office
                                            ->name_en, ['controller' => 'Offices',
                                            'action' => 'view', $committee->office
                                                ->id]) : '' ?></td>
                                <td><?= h($committee->name_bn) ?></td>
                                <td><?= $this->Number->format($committee->member_size) ?></td>
                                <td><?= $this->System->display_date($committee->start_date) ?></td>
                                <td class="actions">
                                    <?php
                                    echo $this->Html->link(__('View'), ['action' => 'view', $committee->id], ['class' => 'btn btn-sm btn-info']);

                                    echo $this->Html->link(__('Edit'), ['action' => 'edit', $committee->id], ['class' => 'btn btn-sm btn-warning']);

                                    echo $this->Form->postLink(__('Delete'), ['action' => 'delete', $committee->id], ['class' => 'btn btn-sm btn-danger', 'confirm' => __('Are you sure you want to delete # {0}?', $committee->id)]);

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

