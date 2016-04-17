<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Manufacturers'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Manufacturer') ?></li>
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
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Code') ?></th>
                                    <td><?= h($manufacturer->code) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name Bn') ?></th>
                                    <td><?= h($manufacturer->name_bn) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name En') ?></th>
                                    <td><?= h($manufacturer->name_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Phone') ?></th>
                                    <td><?= h($manufacturer->phone) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Fax') ?></th>
                                    <td><?= h($manufacturer->fax) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Website') ?></th>
                                    <td><?= h($manufacturer->website) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Email') ?></th>
                                    <td><?= h($manufacturer->email) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Cell Phone') ?></th>
                                    <td><?= h($manufacturer->cell_phone) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Country') ?></th>
                                    <td><?= h($manufacturer->country) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Address') ?></th>
                                    <td><?= h($manufacturer->address) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Major Sector') ?></th>
                                    <td><?= h($manufacturer->major_sector) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Major Product Tag') ?></th>
                                    <td><?= h($manufacturer->major_product_tag) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Remarks') ?></th>
                                    <td><?= h($manufacturer->remarks) ?></td>
                                </tr>
                                                                                                                                                        <tr>
                                    <th><?= __('Id') ?></th>
                                    <td><?= $this->Number->format($manufacturer->id) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $this->Number->format($manufacturer->status) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= $this->Number->format($manufacturer->create_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= $this->Number->format($manufacturer->update_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create By') ?></th>
                                    <td><?= $this->Number->format($manufacturer->create_by) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update By') ?></th>
                                    <td><?= $this->Number->format($manufacturer->update_by) ?></td>
                                </tr>
                                                                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

