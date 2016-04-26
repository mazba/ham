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
            <?= $this->Html->link(__('Item Withdrawals'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('New Item Withdrawal') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Add New Item Withdrawal') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($itemWithdrawal, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('user_id', ['class'=>'form-control select2me','options' => $users, 'empty' => __('Select')]);
                        echo $this->Form->input('item_assign_id', ['options' => $itemAssigns, 'empty' => __('Select')]);
                        echo $this->Form->input('office_warehouse_id', ['options' => $officeWarehouses, 'empty' => __('Select')]);
                        echo $this->Form->input('withdrawal_type', ['options' => array_flip(Configure::read('item_withdrawal_type')), 'empty' => __('Select')]);
                        echo $this->Form->input('withdrawal_time', ['type' => 'text', 'class' => 'form-control datepicker']);
                        echo $this->Form->input('remarks',['type' => 'textarea', 'class' => 'form-control ','rows'=>'3']);

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
        $(document).on('change', '#user-id', function () {
            var user_id = $(this).val();
            $.ajax({
                type: 'post',
                url: '<?= $this->request->webroot ?>ItemWithdrawals/ajax/get_user_items',
                data: {
                    user_id: user_id
                },
                success: function (data, status) {
                    //  console.log(data);
                    var lists = JSON.parse(data);
                    var html = '<option selected="selected"><?= __('Select') ?> </option>';
                    $.each(lists, function (id, value) {
                        // console.log(value);
                        html = html + '<option value="' + value.id + '">' + value.itemName + '</option>'
                    })
                    $('#item-assign-id').html(html)
                }
            });
        });
    });
</script>