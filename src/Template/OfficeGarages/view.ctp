<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Office Garages'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Office Garage') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Office Garage List') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Office') ?></th>
                                    <td><?= $officeGarage->has('office') ? $this->Html->link($officeGarage->office->name_en, ['controller' => 'Offices', 'action' => 'view', $officeGarage->office->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Building') ?></th>
                                    <td><?= $officeGarage->has('office_building') ? $this->Html->link($officeGarage->office_building->title_bn, ['controller' => 'OfficeBuildings', 'action' => 'view', $officeGarage->office_building->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Office Room') ?></th>
                                    <td><?= $officeGarage->has('office_room') ? $this->Html->link($officeGarage->office_room->title_bn, ['controller' => 'OfficeRooms', 'action' => 'view', $officeGarage->office_room->id]) : '' ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Size') ?></th>
                                    <td><?= h($officeGarage->size) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Capacity') ?></th>
                                    <td><?= h($officeGarage->capacity) ?></td>
                                </tr>
                                                                                                                                                        <tr>
                                    <th><?= __('Id') ?></th>
                                    <td><?= $this->Number->format($officeGarage->id) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $this->Number->format($officeGarage->status) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= $this->Number->format($officeGarage->create_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= $this->Number->format($officeGarage->update_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create By') ?></th>
                                    <td><?= $this->Number->format($officeGarage->create_by) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update By') ?></th>
                                    <td><?= $this->Number->format($officeGarage->update_by) ?></td>
                                </tr>
                                                                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

