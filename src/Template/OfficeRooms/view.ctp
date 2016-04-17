<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Office Rooms'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Office Room') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Office Room List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Parent Office Room') ?></th>
                                    <td><?= $officeRoom->has('parent_office_room') ? $this->Html->link($officeRoom->parent_office_room->id, ['controller' => 'OfficeRooms', 'action' => 'view', $officeRoom->parent_office_room->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office') ?></th>
                                    <td><?= $officeRoom->has('office') ? $this->Html->link($officeRoom->office->name_en, ['controller' => 'Offices', 'action' => 'view', $officeRoom->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Building') ?></th>
                                    <td><?= $officeRoom->has('office_building') ? $this->Html->link($officeRoom->office_building->title_bn, ['controller' => 'OfficeBuildings', 'action' => 'view', $officeRoom->office_building->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Unit') ?></th>
                                    <td><?= $officeRoom->has('office_unit') ? $this->Html->link($officeRoom->office_unit->id, ['controller' => 'OfficeUnits', 'action' => 'view', $officeRoom->office_unit->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title Bn') ?></th>
                                    <td><?= h($officeRoom->title_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Title En') ?></th>
                                    <td><?= h($officeRoom->title_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Size') ?></th>
                                    <td><?= h($officeRoom->size) ?></td>
                                </tr>
                                                                                                                                                        <tr>
                                    <th><?= __('Id') ?></th>
                                    <td><?= $this->Number->format($officeRoom->id) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Floor Number') ?></th>
                                    <td><?= $this->Number->format($officeRoom->floor_number) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Number') ?></th>
                                    <td><?= $this->Number->format($officeRoom->number) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Common Use') ?></th>
                                    <td><?= $this->Number->format($officeRoom->common_use) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $this->Number->format($officeRoom->status) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= $this->Number->format($officeRoom->create_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= $this->Number->format($officeRoom->update_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create By') ?></th>
                                    <td><?= $this->Number->format($officeRoom->create_by) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update By') ?></th>
                                    <td><?= $this->Number->format($officeRoom->update_by) ?></td>
                                </tr>
                                                                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

