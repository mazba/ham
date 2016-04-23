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
            <?= $this->Html->link(__('Items'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Item') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Item') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($item, ['class' => 'form-horizontal', 'role' => 'form', 'type' => 'file']) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('parent_id', ['options' => $parentItems, 'empty' => __('Select')]);
                        echo $this->Form->input('supplier_id', ['options' => $suppliers, 'empty' => __('Select')]);
                        echo $this->Form->input('asset_type_id', ['class' => 'form-control asset_type_id', 'options' => $assetTypes, 'empty' => __('Select'), 'templates' => ['inputContainer' => '<div class="form-group asset_type {{type}}{{required}}">{{content}}</div>']]);
                        echo $this->Form->input('office_id', ['options' => $offices, 'empty' => __('Select')]);
                        echo $this->Form->input('title_bn');
                        echo $this->Form->input('code');
                        echo $this->Form->input('model_number');
                        echo $this->Form->input('office_stock_book_number');
                        echo $this->Form->input('purchase_order_number');
                        echo $this->Form->input('purchase_order_date', ['type' => 'text', 'class' => 'form-control datepicker']);
                        echo $this->Form->input('warranty_start_date', ['type' => 'text', 'class' => 'form-control datepicker']);
                        echo $this->Form->input('projected_end_of_life', ['type' => 'text', 'class' => 'form-control datepicker']);
                        echo $this->Form->input('quantity');
                        ?>
                    </div>

                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('manufacturer_id', ['options' => $manufacturers, 'empty' => __('Select')]);
                        echo $this->Form->input('asset_nature_id', ['class' => 'form-control asset_nature_id', 'options' => $assetNatures, 'empty' => __('Select'), 'templates' => ['inputContainer' => '<div class="form-group asset_nature {{type}}{{required}}">{{content}}</div>']]);
                        echo $this->Form->input('item_category_id', ['class' => 'form-control item_category_id', 'options' => $itemCategories, 'empty' => __('Select'), 'templates' => ['inputContainer' => '<div class="form-group item_category {{type}}{{required}}">{{content}}</div>']]);
                        echo $this->Form->input('office_warehouse_id', ['options' => $officeWarehouses, 'empty' => __('Select')]);
                        echo $this->Form->input('title_en');
                        echo $this->Form->input('short_code');
                        echo $this->Form->input('picture_file', ['type' => 'file']);
                        echo $this->Form->input('condition', ['options' => array_flip(Configure::read('item_conditions')), 'empty' => __('Select')]);
                        echo $this->Form->input('purchase_order_attach_file', ['type' => 'file']);
                        echo $this->Form->input('office_receive_date', ['type' => 'text', 'class' => 'form-control datepicker']);
                        echo $this->Form->input('warranty_end_date', ['type' => 'text', 'class' => 'form-control datepicker']);
                        echo $this->Form->input('unit_price');
                        echo $this->Form->input('description', ['rows' => 3]);
                        ?>
                    </div>

                    <div class="serialWrapper" style="display: none">
                        <div class="col-md-6">
                            <?= $this->Form->input('serial_number[]', ['required', 'label' => __('Serial Number'), 'templates' => ['inputContainer' => '<div class="form-group serial_number {{type}}{{required}}">{{content}}</div>']]); ?>
                        </div>

                        <div class="col-md-6">
                            <?= $this->Form->input('office_serial_number[]', ['required', 'label' => __('Office Serial Number'), 'templates' => ['inputContainer' => '<div class="form-group office_serial_number {{type}}{{required}}">{{content}}</div>']]); ?>
                        </div>
                    </div>


                    <div class="col-md-12 text-center">
                        <div class="form-group">
                            <div class="checkbox-list">
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="is_vehicle" value="1"
                                           name="is_vehicle"><?= __('Is Vehicle') ?>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="is_document" value="1"
                                           name="is_document"><?= __('Is Document') ?>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="is_depreciable" value="1"
                                           name="is_depreciable"><?= __('Is Depreciable') ?>
                                </label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" id="is_maintainable" value="1"
                                           name="is_maintainable"> <?= __('Is Maintainable') ?>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12 vehicleWrapper" style="margin: 0 ;padding: 0;margin-top: 25px;display: none">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('ItemVehicles.registration_number', ['required', 'disabled']);
                            echo $this->Form->input('ItemVehicles.engine_number', ['required', 'disabled']);
                            echo $this->Form->input('ItemVehicles.number_plate', ['required', 'disabled']);
                            echo $this->Form->input('ItemVehicles.fuel_tank_capacity', ['type' => 'number', 'disabled']);
                            echo $this->Form->input('ItemVehicles.load_capacity', ['type' => 'number', 'step' => 'any', 'disabled']);
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('ItemVehicles.prefix_number', ['disabled']);
                            echo $this->Form->input('ItemVehicles.chasis_number', ['required', 'disabled']);
                            echo $this->Form->input('ItemVehicles.country_of_origin', ['disabled']);
                            echo $this->Form->input('ItemVehicles.oil_sump_capacity', ['type' => 'number', 'disabled']);
                            echo $this->Form->input('ItemVehicles.engine_capacity', ['disabled']);

                            ?>
                        </div>
                    </div>

                    <div class="col-md-12 documentWrapper" style="margin: 0 ;padding: 0;margin-top: 25px;display: none">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('ItemDocuments.parent_id', ['options' => $parentItemDocuments, 'empty' => __('Select'), 'disabled']);
                            echo $this->Form->input('ItemDocuments.responsible_name', ['required', 'disabled']);
                            echo $this->Form->input('ItemDocuments.valid_number_or_duration', ['disabled','type'=>'number']);
                            echo $this->Form->input('ItemDocuments.expire_date', ['type' => 'text', 'class' => 'form-control datepicker', 'disabled']);
                            echo $this->Form->input('ItemDocuments.attach_file', ['type' => 'file', 'required', 'disabled','class'=>'form-control']);
                            ?>
                        </div>

                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('ItemDocuments.document_type', ['required', 'disabled', 'options' => array_flip(Configure::read('document_type')), 'empty' => __('Select')]);
                            echo $this->Form->input('ItemDocuments.responsible_email', ['disabled']);
                            echo $this->Form->input('ItemDocuments.effective_date', ['type' => 'text', 'disabled', 'class' => 'form-control datepicker']);
                            echo $this->Form->input('ItemDocuments.remarks', ['type' => 'textarea', 'rows' => 2, 'disabled']);

                            ?>
                        </div>
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <div class="checkbox-list">
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="is_reassignable" value="1"
                                               name="ItemDocuments.is_reassignable"><?= __('Is re-assignable') ?>
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox" id="is_auto_renewal" value="1"
                                               name="ItemDocuments.is_auto_renewal"><?= __('Is auto renewal') ?>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <style>
                            #itemdocuments-attach-file{
                                background-color: #fff;
                                border: 0px solid;
                                box-shadow: none;
                                color: #333;
                                font-size: 14px;
                                font-weight: normal;
                                height: auto;
                            }
                            div.checker.disabled span, div.checker.disabled.active span {
                                background-position: 0px -260px;
                            }
                            div.checker.disabled span.checked, div.checker.disabled.active span.checked {
                                /*background-position: 0px -260px;*/
                            }
                        </style>
                    </div>

                    <div class="col-md-12 depreciateWrapper"
                         style="margin: 0 ;padding: 0;margin-top: 25px;display: none">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('item_depreciations.method', ['required', 'disabled', 'options' => array_flip(Configure::read('depreciate_method')), 'empty' => __('Select')]);
                            echo $this->Form->input('item_depreciations.annual_rate', ['type' => 'number', 'step' => 'any', 'disabled']);
                            echo $this->Form->input('item_depreciations.lifetime', ['type' => 'number', 'disabled']);
                            ?>
                        </div>

                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('item_depreciations.basic_cost', ['required', 'type' => 'number', 'step' => 'any', 'disabled']);
                            echo $this->Form->input('item_depreciations.salvage_value', ['type' => 'number', 'step' => 'any', 'disabled']);
                            echo $this->Form->input('item_depreciations.item_use_start_time', ['required', 'class' => 'form-control datepicker', 'disabled']);
                            ?>

                        </div>
                    </div>

                    <div class="col-md-12 maintainWrapper" style="margin: 0 ;padding: 0;margin-top: 25px;display: none">
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('item_maintenances.total_maintenance_number', ['type' => 'number', 'disabled']);
                            echo $this->Form->input('item_maintenances.free_maintenance_number', ['type' => 'number', 'disabled']);
                            echo $this->Form->input('item_maintenances.each_maintenance_cost', ['type' => 'number', 'step' => 'any', 'disabled']);
                            ?>
                        </div>
                        <div class="col-md-6">
                            <?php
                            echo $this->Form->input('item_maintenances.maintenance_schedule', ['required', 'disabled']);
                            echo $this->Form->input('item_maintenances.free_maintenance_time_period', ['type' => 'number', 'disabled', 'placeholder' => __('Number of days')]);
                            ?>
                        </div>
                    </div>

                    <div class="col-md-12 text-center">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn blue', 'style' => 'margin-top:20px']) ?>
                    </div>


                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>


<script>
    $(document).ready(function () {
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy'
        })

        $(document).on('change', '.asset_nature_id', function () {
            var nature_id = $(this).val();
            var obj = $(this);
            $.ajax({
                type: 'POST',
                url: '<?= $this->Url->build("/Items/ajax/getAssetNatures")?>',
                data: {nature_id: nature_id},
                success: function (data, status) {
                    obj.closest('.asset_nature').nextAll('.asset_nature').remove();
                    if (data) {
                        obj.closest('.form-group').after(data);
                    }
                }
            });
        });

        $(document).on('change', '.asset_type_id', function () {
            var type_id = $(this).val();
            var obj = $(this);
            $.ajax({
                type: 'POST',
                url: '<?= $this->Url->build("/Items/ajax/getAssetTypes")?>',
                data: {type_id: type_id},
                success: function (data, status) {
                    obj.closest('.asset_type').nextAll('.asset_type').remove();
                    if (data) {
                        obj.closest('.form-group').after(data);
                    }
                }
            });
        });

        $(document).on('change', '.item_category_id', function () {
            var type_id = $(this).val();
            var obj = $(this);
            $.ajax({
                type: 'POST',
                url: '<?= $this->Url->build("/Items/ajax/getItemCategories")?>',
                data: {type_id: type_id},
                success: function (data, status) {
                    obj.closest('.item_category').nextAll('.item_category').remove();
                    if (data) {
                        obj.closest('.form-group').after(data);
                    }
                }
            });
        });

        $(document).on('keyup', '#quantity', function () {
            var quantity = parseInt($(this).val());
            $('.serialWrapper').show();
            $('.serial_number:first').nextAll('.serial_number').remove();
            $('.office_serial_number:first').nextAll('.office_serial_number').remove();
            if (quantity > 1) {
                for (var i = 1; i < quantity; i++) {
                    $('.serial_number:last').clone().insertAfter('.serial_number:last');
                    $('.office_serial_number:last').clone().insertAfter('.office_serial_number:last');
                }

            }

        });

        $(document).on('click', '#is_vehicle', function () {
            if ($(this).is(':checked')) {
                $('.vehicleWrapper').show().find('.form-control').removeAttr('disabled');
            } else {
                $('.vehicleWrapper').hide().find('.form-control').attr('disabled', 'disabled');
            }
        });

        $(document).on('click', '#is_document', function () {
            if ($(this).is(':checked')) {
                $('.documentWrapper').show().find('.form-control').removeAttr('disabled');
            } else {
                $('.documentWrapper').hide().find('.form-control').attr('disabled', 'disabled');
            }
        });

        $(document).on('click', '#is_depreciable', function () {
            if ($(this).is(':checked')) {
                $('.depreciateWrapper').show().find('.form-control').removeAttr('disabled');
            } else {
                $('.depreciateWrapper').hide().find('.form-control').attr('disabled', 'disabled');
            }
        });

        $(document).on('click', '#is_maintainable', function () {
            if ($(this).is(':checked')) {
                $('.maintainWrapper').show().find('.form-control').removeAttr('disabled');
            } else {
                $('.maintainWrapper').hide().find('.form-control').attr('disabled', 'disabled');
            }
        });

        $(document).on('keyup', '#item-depreciations-basic-cost', function () {
            var basic_cost = parseFloat($(this).val());
            if (basic_cost > 0) {
                $('#item-depreciations-salvage-value').attr('max', basic_cost);
            }
        });
    });
</script>
