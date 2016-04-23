<?php
$status = \Cake\Core\Configure::read('status_options');
$type = \Cake\Core\Configure::read('supplier_type');
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Suppliers'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Supplier') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Supplier Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Parent Supplier') ?></th>
                            <td><?= $supplier->has('parent_supplier') ? $this->Html->link($supplier->parent_supplier->name_en, ['controller' => 'Suppliers', 'action' => 'view', $supplier->parent_supplier->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Office') ?></th>
                            <td><?= $supplier->has('office') ? $this->Html->link($supplier->office->name_en, ['controller' => 'Offices', 'action' => 'view', $supplier->office->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Code') ?></th>
                            <td><?= h($supplier->code) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Name Bn') ?></th>
                            <td><?= h($supplier->name_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Name En') ?></th>
                            <td><?= h($supplier->name_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Phone') ?></th>
                            <td><?= h($supplier->phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Fax') ?></th>
                            <td><?= h($supplier->fax) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Website') ?></th>
                            <td><?= h($supplier->website) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Email') ?></th>
                            <td><?= h($supplier->email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Cell Phone') ?></th>
                            <td><?= h($supplier->cell_phone) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Post Code') ?></th>
                            <td><?= h($supplier->post_code) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('City') ?></th>
                            <td><?= h($supplier->city) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('State') ?></th>
                            <td><?= h($supplier->state) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Country') ?></th>
                            <td><?= h($supplier->country) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Address') ?></th>
                            <td><?= h($supplier->contact_address) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Billing Address') ?></th>
                            <td><?= h($supplier->billing_address) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Person Name') ?></th>
                            <td><?= h($supplier->contact_person_name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Person Designation') ?></th>
                            <td><?= h($supplier->contact_person_designation) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Person Cell Number') ?></th>
                            <td><?= h($supplier->contact_person_cell_number) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Contact Person Email') ?></th>
                            <td><?= h($supplier->contact_person_email) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Supplier Major Sector') ?></th>
                            <td><?= h($supplier->supplier_major_sector) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Supplier Major Product Tag') ?></th>
                            <td><?= h($supplier->supplier_major_product_tag) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Agreement Attach File') ?></th>
                            <?php if($supplier->agreement_attach): ?>
                            <td><?php echo $this->Html->link(__('View File'),'/'.$supplier->agreement_attach, ['class' => 'btn btn-sm btn-info']); ?></td>
                            <?php endif; ?>
                        </tr>
                        <tr>
                            <th><?= __('Remarks') ?></th>
                            <td><?= h($supplier->remarks) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Is Global') ?></th>
                            <td><?= $supplier->is_global ? 'Yes' : '' ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Type') ?></th>
                            <td><?= $type[$supplier->type] ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Agreement Duration') ?></th>
                            <td><?= $supplier->agreement_duration ?></td>
                        </tr>


                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= __($status[$supplier->status]) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

