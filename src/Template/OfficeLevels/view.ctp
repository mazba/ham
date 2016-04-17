<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Office Levels'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Office Level') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Office Level List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Parent Office Level') ?></th>
                                    <td><?= $officeLevel->has('parent_office_level') ? $this->Html->link($officeLevel->parent_office_level->id, ['controller' => 'OfficeLevels', 'action' => 'view', $officeLevel->parent_office_level->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name Bn') ?></th>
                                    <td><?= h($officeLevel->name_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name En') ?></th>
                                    <td><?= h($officeLevel->name_en) ?></td>
                                </tr>
                                                                                                                                                        <tr>
                                    <th><?= __('Id') ?></th>
                                    <td><?= $this->Number->format($officeLevel->id) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Level') ?></th>
                                    <td><?= $this->Number->format($officeLevel->level) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Sequence') ?></th>
                                    <td><?= $this->Number->format($officeLevel->sequence) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $this->Number->format($officeLevel->status) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= $this->Number->format($officeLevel->create_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= $this->Number->format($officeLevel->update_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create By') ?></th>
                                    <td><?= $this->Number->format($officeLevel->create_by) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update By') ?></th>
                                    <td><?= $this->Number->format($officeLevel->update_by) ?></td>
                                </tr>
                                                                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

