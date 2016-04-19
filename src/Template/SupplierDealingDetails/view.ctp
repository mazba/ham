<?php
$status = \Cake\Core\Configure::read('status_options');
$deal_type = \Cake\Core\Configure::read('deal_type');
?>

<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Supplier Dealing Details'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Supplier Dealing Detail') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Supplier Dealing Detail Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <tr>
                            <th><?= __('Committee') ?></th>
                            <td><?= $supplierDealingDetail->has('committee') ? $this->Html->link($supplierDealingDetail->committee->name_bn, ['controller' => 'Committees', 'action' => 'view', $supplierDealingDetail->committee->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('User') ?></th>
                            <td><?= $supplierDealingDetail->has('user') ? $this->Html->link($supplierDealingDetail->user->full_name_bn, ['controller' => 'Users', 'action' => 'view', $supplierDealingDetail->user->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Item Category') ?></th>
                            <td><?= $supplierDealingDetail->has('item_category') ? $this->Html->link($supplierDealingDetail->item_category->name_bn, ['controller' => 'ItemCategories', 'action' => 'view', $supplierDealingDetail->item_category->id]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Title Bn') ?></th>
                            <td><?= h($supplierDealingDetail->title_bn) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Title En') ?></th>
                            <td><?= h($supplierDealingDetail->title_en) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Deal Attach File') ?></th>
                            <td>
                                <?php
                                if($supplierDealingDetail->deal_attach_file)
                                echo $this->Html->link(__('View File'),'/'.$supplierDealingDetail->deal_attach_file, ['class' => 'btn btn-sm btn-info']);
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Deal Remarks') ?></th>
                            <td><?= h($supplierDealingDetail->deal_remarks) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Deal Type') ?></th>
                            <td><?= $deal_type[$supplierDealingDetail->deal_type_id] ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Deal Start Date') ?></th>
                            <td><?= $this->System->display_date($supplierDealingDetail->deal_start_date) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Deal End Date') ?></th>
                            <td><?= $this->System->display_date($supplierDealingDetail->deal_end_date) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Deal Duration') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->deal_duration) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Actual Completion Duration') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->actual_completion_duration) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Item Number') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->item_number) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Security Amount') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->security_amount) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Actual Deal Amount') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->actual_deal_amount) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Penalty Amount') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->penalty_amount) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Tax Amount') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->tax_amount) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Vat Amount') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->vat_amount) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Total Amount') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->total_amount) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Billing Installment Number') ?></th>
                            <td><?= $this->Number->format($supplierDealingDetail->billing_installment_number) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Final Billing Date') ?></th>
                            <td><?= $this->System->display_date($supplierDealingDetail->final_billing_date) ?></td>
                        </tr>

                        <tr>
                            <th><?= __('Actual Final Billing Date') ?></th>
                            <td><?= $this->System->display_date($supplierDealingDetail->actual_final_billing_date) ?></td>
                        </tr>


                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= __($status[$supplierDealingDetail->status]) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

