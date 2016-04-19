<?php
use Cake\Core\Configure;
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
        <li><?= __('New Supplier Dealing Detail') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Supplier Dealing Detail') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($supplierDealingDetail, ['class' => 'form-horizontal', 'role' => 'form','type'=>'file']) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('committee_id', ['class'=>'select2me form-control','options' => $committees, 'empty' => __('Select')]);
                        echo $this->Form->input('user_id', ['class'=>'select2me form-control','options' => $users, 'empty' => __('Select')]);
                        echo $this->Form->input('item_category_id', ['class'=>'select2me form-control','options' => $itemCategories, 'empty' => __('Select')]);
                        echo $this->Form->input('deal_type_id',['options'=>Configure::read('deal_type')]);
                        echo $this->Form->input('title_bn');
                        echo $this->Form->input('title_en');
                        echo $this->Form->input('deal_start_date',['class'=>'form-control','type'=>'text']);
                        echo $this->Form->input('deal_end_date',['class'=>'form-control ','type'=>'text']);
                        echo $this->Form->input('deal_description',['rows'=>2]);
                        echo $this->Form->input('deal_remarks',['rows'=>2]);
                        echo $this->Form->input('deal_duration');
                        echo $this->Form->input('actual_completion_duration');
                        echo $this->Form->input('deal_attach_file',['type'=>'file']);
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('item_number');
                        echo $this->Form->input('security_amount');
                        echo $this->Form->input('actual_deal_amount');
                        echo $this->Form->input('penalty_amount');
                        echo $this->Form->input('tax_amount');
                        echo $this->Form->input('vat_amount');
                        echo $this->Form->input('total_amount');
                        echo $this->Form->input('billing_installment_number');
                        echo $this->Form->input('final_billing_date');
                        echo $this->Form->input('actual_final_billing_date');
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
                        ?>
                    </div>
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <h4 class="text-center"><?= __('Manufacturers') ?></h4>
                            <hr/>
                            <div class="col-md-10" id="manufacturer_wrp">
                                <select class="manufacturers select2me form-control" name="manufacturers[_ids][]" style="margin-bottom: 10px">
                                    <option value=""><?= __('Select') ?></option>
                                    <?php
                                        foreach($manufacturers as $key=>$manufacturer){
                                            ?>
                                            <option value="<?php echo $key; ?>"><?php echo $manufacturer; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>

                            </div>
                            <div class="col-md-2">
                                <div id="add_new_manufacturer" class="label label-danger" style="float: left; padding: 6px 7px 6px 8px; margin: 2px 0px; cursor: pointer;"><i class="fa fa-plus"></i></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h4 class="text-center"><?= __('Offices') ?></h4>
                            <hr/>
                            <div class="col-md-10" id="office_wrp">
                                <select class="offices select2me form-control" name="offices[_ids][]" style="margin-bottom: 10px">
                                    <option value=""><?= __('Select') ?></option>
                                    <?php
                                    foreach($offices as $key=>$office){
                                        ?>
                                        <option value="<?php echo $key; ?>"><?php echo $office; ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>

                            </div>
                            <div class="col-md-2">
                                <div id="add_new_office" class="label label-danger" style="float: left; padding: 6px 7px 6px 8px; margin: 2px 0px; cursor: pointer;"><i class="fa fa-plus"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue pull-right', 'style' => 'margin-top:20px']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

<script>
    $(document).ready(function() {
        $( "#deal-start-date" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( "#deal-end-date" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#deal-end-date" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( "#deal-start-date" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
        $("#add_new_manufacturer").click(function () {
            $("#manufacturer_wrp")
                .children("select")
                // call destroy to revert the changes made by Select2
                .select2("destroy")
                .end();
            $("#manufacturer_wrp").append( $("#manufacturer_wrp").find('.manufacturers:first').clone());
            // $("#product_wrp select:last").wrap("<div class='newProduct'></div>")
            // $("#product_wrp .newProduct:last").append('<a href="#" class="external" onclick="removeIt(this)"><i class="fa fa-times"></i></a>')
            // enable Select2 on the select elements
            $("#manufacturer_wrp select").select2();
        });
        $("#add_new_office").click(function () {
            $("#office_wrp")
                .children("select")
                // call destroy to revert the changes made by Select2
                .select2("destroy")
                .end();
            $("#office_wrp").append( $("#office_wrp").find('.offices:first').clone());
            // $("#product_wrp select:last").wrap("<div class='newProduct'></div>")
            // $("#product_wrp .newProduct:last").append('<a href="#" class="external" onclick="removeIt(this)"><i class="fa fa-times"></i></a>')
            // enable Select2 on the select elements
            $("#office_wrp select").select2();
        });
    });
//    function removeIt(ele){
//        ele.closest('.newProduct').remove();
//    }
</script>