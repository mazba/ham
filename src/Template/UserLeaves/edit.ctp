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
            <?= $this->Html->link(__('User Leaves'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit User Leave') ?></li>

    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit User Leave') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($userLeave, ['class' => 'form-horizontal', 'role' => 'form']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('office_id', ['options' => $offices, 'empty' => __('Select')]);
                        echo $this->Form->input('user_id', ['options' => $users, 'empty' => __('Select')]);
                        echo $this->Form->input('responsible_user_id', ['options' => $responsibleUsers, 'empty' => __('Select')]);
                        echo $this->Form->input('approval_user_id', ['options' => $approvalUsers, 'empty' => __('Select')]);
                        echo $this->Form->input('leave_status_id', ['options' => $leaveStatuses, 'empty' => __('Select')]);
                        echo $this->Form->input('start_date',['value'=>$userLeave['start_date']?date('d-m-Y'):'','class'=>'datepicker form-control','type'=>'text']);
                        echo $this->Form->input('end_date',['value'=>$userLeave['end_date']?date('d-m-Y'):'','class'=>'datepicker form-control','type'=>'text']);
                        echo $this->Form->input('duration');
                        echo $this->Form->input('attach_file',['type'=>'file']);
                        echo $this->Form->input('status', ['options' => Configure::read('status_options')]);
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
    $(document).ready(function() {
        $( "#start-date" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            dateFormat:'d-mm-yy',
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( "#end-date" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#end-date" ).datepicker({
            defaultDate: "+1w",
            dateFormat:'d-mm-yy',
            changeMonth: true,
            numberOfMonths: 1,
            onClose: function( selectedDate ) {
                $( "#start-date" ).datepicker( "option", "maxDate", selectedDate );
            }
        });
    });
</script>