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
            <?= $this->Html->link(__('Item Assigns'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Item Assign') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Item Assign') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($itemAssign, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('assign_type', ['options' => array_flip(Configure::read('item_assign_type')), 'empty' => __('Select')]);
                        if (isset($offices)) {
                            echo $this->Form->input('office_id', ['options' => $offices, 'empty' => __('Select')]);
                        }

                        echo $this->Form->input('office_building_id', ['options' => isset($officeBuildings) ? $officeBuildings : [], 'empty' => __('Select')]);
                        echo $this->Form->input('office_room_id', ['options' => [], 'empty' => __('Select')]);
                        echo $this->Form->input('office_unit_id', ['options' => isset($officeUnits) ? $officeUnits : [], 'empty' => __('Select')]);
                        echo $this->Form->input('designation_id', ['options' => [], 'empty' => __('Select')]);
                        echo $this->Form->input('designated_user_id', ['options' => [], 'empty' => __('Select')]);
                        echo $this->Form->input('office_warehouse_id', ['options' => isset($officeWarehouses) ? $officeWarehouses : [], 'empty' => __('Select')]);
                        echo $this->Form->input('item_category_id', ['class' => 'form-control item_category_id', 'options' => $itemCategories, 'empty' => __('Select'), 'templates' => ['inputContainer' => '<div class="form-group item_category {{type}}{{required}}">{{content}}</div>']]);
                        echo $this->Form->input('item_id', ['options' => [], 'empty' => __('Select')]);
                        echo $this->Form->input('quantity');
                        echo $this->Form->input('assign_date', ['type' => 'text', 'class' => 'form-control datepicker']);
                        echo $this->Form->input('expected_usage_time', ['placeholder' => __('Number of days')]);
                        echo $this->Form->input('usage_instruction');
                        echo $this->Form->input('next_maintainance_date', ['type' => 'text', 'class' => 'form-control datepicker']);
                        echo $this->Form->input('status', ['type' => 'hidden', 'value' => 1]);
                        ?>
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
    $(document).ready(function () {
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy'
        })

        $(document).on('change', '#office-id', function () {
            var office_id = $(this).val();
            $.ajax({
                type: 'post',
                url: '<?= $this->request->webroot ?>ItemAssigns/ajax/get_office_buliding',
                data: {
                    office_id: office_id
                },
                success: function (data, status) {
                    var lists = JSON.parse(data);
                    var html = '<option selected="selected"><?= __('Select') ?> </option>';
                    $.each(lists, function (index, value) {
                        html = html + '<option value="' + index + '">' + value + '</option>'
                    })
                    $('#office-building-id').html(html)
                }
            });

            $.ajax({
                type: 'post',
                url: '<?= $this->request->webroot ?>ItemAssigns/ajax/get_office_units',
                data: {
                    office_id: office_id
                },
                success: function (data, status) {
                    var lists = JSON.parse(data);
                    var html = '<option selected="selected"><?= __('Select') ?> </option>';
                    $.each(lists, function (index, value) {
                        html = html + '<option value="' + index + '">' + value + '</option>'
                    })
                    $('#office-unit-id').html(html)
                }
            });

            $.ajax({
                type: 'post',
                url: '<?= $this->request->webroot ?>ItemAssigns/ajax/get_warehouses',
                data: {
                    office_id: office_id
                },
                success: function (data, status) {
                    var lists = JSON.parse(data);
                    var html = '<option selected="selected"><?= __('Select') ?> </option>';
                    $.each(lists, function (index, value) {
                        html = html + '<option value="' + index + '">' + value + '</option>'
                    })
                    $('#office-warehouse-id').html(html)
                }
            });
        });

        $(document).on('change', '#office-building-id', function () {
            var office_building_id = $(this).val();
            var office_id = "";
            if ($('#office-id').length) {
                office_id = $('#office-id option:selected').val();
            }

            $.ajax({
                type: 'post',
                url: '<?= $this->request->webroot ?>ItemAssigns/ajax/get_rooms',
                data: {
                    office_building_id: office_building_id, office_id: office_id
                },
                success: function (data, status) {
                    var lists = JSON.parse(data);
                    var html = '<option selected="selected"><?= __('Select') ?> </option>';
                    $.each(lists, function (index, value) {
                        html = html + '<option value="' + index + '">' + value + '</option>'
                    })
                    $('#office-room-id').html(html)
                }
            })
        });

        $(document).on('change', '#office-unit-id', function () {
            var office_unit_id = $(this).val();
            var office_id = "";
            if ($('#office-id').length) {
                office_id = $('#office-id option:selected').val();
            }
            $.ajax({
                type: 'post',
                url: '<?= $this->request->webroot ?>ItemAssigns/ajax/get_unit_designation',
                data: {
                    office_unit_id: office_unit_id, office_id: office_id
                },
                success: function (data, status) {
                    var lists = JSON.parse(data);
                    var html = '<option selected="selected"><?= __('Select') ?> </option>';
                    $.each(lists, function (index, value) {
                        html = html + '<option value="' + index + '">' + value + '</option>'
                    })
                    $('#designation-id').html(html)
                }
            })
        })

        $(document).on('change', '#designation-id', function () {
            var office_unit_designation_id = $(this).val();
            var office_id = "";
            if ($('#office-id').length) {
                office_id = $('#office-id option:selected').val();
            }
            $.ajax({
                type: 'post',
                url: '<?= $this->request->webroot ?>ItemAssigns/ajax/get_unit_designated_user',
                data: {
                    office_unit_designation_id: office_unit_designation_id, office_id: office_id
                },
                success: function (data, status) {
                    var lists = JSON.parse(data);
                    var html = '<option selected="selected"><?= __('Select') ?> </option>';
                    $.each(lists, function (index, value) {
                        html = html + '<option value="' + value.Users.id + '">' + value.Users.full_name_bn + '</option>'
                    })
                    $('#designated-user-id').html(html)
                }
            })
        });

        $(document).on('change', '.item_category_id', function () {
            var type_id = $(this).val();
            var warehouse_id = $('#office-warehouse-id option:selected').val();
            var obj = $(this);
            var office_id = "";
            if ($('#office-id').length) {
                office_id = $('#office-id option:selected').val();
            }
            $.ajax({
                type: 'POST',
                url: '<?= $this->Url->build("/ItemAssigns/ajax/getItemCategories")?>',
                data: {type_id: type_id, warehouse_id: warehouse_id, office_id: office_id},
                success: function (data, status, xhr) {
                    obj.closest('.item_category').nextAll('.item_category').remove();
                    try {
                        var lists = $.parseJSON(data)
                        var html = '<option selected="selected"><?= __('Select') ?> </option>';
                        $.each(lists, function (index, value) {
                            html = html + '<option value="' + index + '">' + value + '</option>'
                        })
                        $('#item-id').html(html)

                    } catch (e) {
                        if (data) {
                            obj.closest('.form-group').after(data);
                        }
                    }
                }
            });
        });


    })
</script>
