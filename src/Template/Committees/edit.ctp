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
            <?= $this->Html->link(__('Committees'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('Edit Committee') ?></li>

    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-pencil-square-o fa-lg"></i><?= __('Edit Committee') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>

            </div>
            <div class="portlet-body">
                <?= $this->Form->create($committee, ['class' => 'form-horizontal', 'role' => 'form','type' => 'file']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <?php
                        echo $this->Form->input('parent_id', ['options' => $parentCommittees, 'empty' => __('Select')]);
                        echo $this->Form->input('office_id', ['options' => $offices, 'empty' => __('Select')]);
                        echo $this->Form->input('name_bn');
                        echo $this->Form->input('name_en');
                        echo $this->Form->input('member_size');
                        echo $this->Form->input('agenda');
                        echo $this->Form->input('description');
                        echo $this->Form->input('decision');
                        echo $this->Form->input('start_date',['type'=>'text']);
                        echo $this->Form->input('end_date',['type'=>'text']);
                        ?>
                        
                        <?php
                        echo $this->Form->input('attached_file',['type'=>'file']);
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
    $(document).ready(function(){
        $('#start-date').datepicker();
        $('#end-date').datepicker();
    });
</script>
