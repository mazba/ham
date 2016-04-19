<?php
use Cake\Core\Configure;

$language_options = \Cake\Core\Configure::read('language_options');
$blood_groups = \Cake\Core\Configure::read('blood_groups');
$languages = \Cake\Core\Configure::read('languages');
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-seagreen">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i><?= __('Add User');?>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($user,['type' => 'file', 'class'=>'form-horizontal']) ?>
                <div id="tabs" class="portlet-body">
                    <ul style="background: none !important; border: 0px !important;">
                        <li><a href="#tabs-1"><?= __('Basic')?></a></li>
                        <li><a href="#tabs-2"><?= __('Academic')?></a></li>
                        <li><a href="#tabs-3"><?= __('Dependent');?></a></li>
                        <li><a href="#tabs-4"><?= __('Designation');?></a></li>
                        <li><a href="#tabs-5"><?= __('Emergency');?></a></li>
                        <li class="ui-tabs-active ui-state-active"><a href="#tabs-6"><?= __('Employment History');?></a></li>
                        <li><a href="#tabs-7"><?= __('Language');?></a></li>
                        <li><a href="#tabs-8"><?= __('Medical');?></a></li>
                        <li><a href="#tabs-9"><?= __('Login Info');?></a></li>
                    </ul>
                    <div id="tabs-1">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <?php
                                echo $this->Form->input('login[full_name_bn]',['class'=>'form-control','label'=>__('Full Name Bn')]);
                                echo $this->Form->input('login[full_name_en]',['class'=>'form-control','label'=>__('Full Name En')]);
                                echo $this->Form->input('basic[father_name_bn]',['class'=>'form-control','label'=>__('Father Name Bn')]);
                                echo $this->Form->input('basic[father_name_en]',['class'=>'form-control', 'label'=>__('Father Name En')]);
                                echo $this->Form->input('basic[mother_name_bn]',['class'=>'form-control','label'=>__('Mother Name Bn')]);
                                echo $this->Form->input('basic[mother_name_en]',['class'=>'form-control','label'=>__('Mother Name En')]);
                                echo $this->Form->input('basic[nid]',['class'=>'form-control','label'=>__('Nid')]);
                                echo $this->Form->input('basic[bin_brn]',['class'=>'form-control','label'=>__('Bin Brn')]);
                                echo $this->Form->input('basic[date_of_birth]',['class'=>'form-control datepicker','type'=>'text','label'=>__('Date Of Birth')]);
                                echo $this->Form->input('basic[place_of_birth]',['class'=>'form-control','label'=>__('Place Of Birth')]);
                                echo $this->Form->input('basic[nationality]',['class'=>'form-control','label'=>__('Nationality')]);
                                echo $this->Form->input('basic[is_ethnic]',['type'=>'checkbox','class'=>'form-control','label'=>__('Is Ethnic')]);
                                echo $this->Form->input('basic[is_disable]',['type'=>'checkbox','class'=>'form-control','label'=>__('Is Disable')]);
                                echo $this->Form->input('basic[is_married]',['type'=>'checkbox','class'=>'form-control married','label'=>__('Is Married')]);
                                echo $this->Form->input('basic[spouse_name_bn]',['class'=>'for_married form-control','readonly'=>'readonly','label'=>__('Spouse Name Bn')]);
                                echo $this->Form->input('basic[spouse_name_en]',['class'=>'for_married form-control','readonly'=>'readonly','label'=>__('Spouse Name En')]);
                                echo $this->Form->input('basic[gender]',['class'=>'form-control','label'=>__('Gender')]);
                                echo $this->Form->input('basic[religion]',['class'=>'form-control','label'=>__('Religion')]);
                                echo $this->Form->input('basic[home_phone]',['class'=>'form-control','label'=>__('Home Phone')]);
                                echo $this->Form->input('basic[cell_phone]',['class'=>'form-control','label'=>__('Cell Phone')]);
                                echo $this->Form->input('basic[email]',['class'=>'form-control','label'=>__('Email')]);
                                echo $this->Form->input('basic[passport_number]',['class'=>'form-control','label'=>__('Passport Number')]);
                                echo $this->Form->input('basic[driving_license_number]',['class'=>'form-control','label'=>__('Driving Lisence Number')]);
                                echo $this->Form->input('basic[tin_number]',['class'=>'form-control','label'=>__('TIN Number')]);
                                echo $this->Form->input('basic[present_address]',['class'=>'form-control','label'=>__('Present Address')]);
                                echo $this->Form->input('basic[permanent_address]',['class'=>'form-control','label'=>__('Permanent Address')]);
                                echo $this->Form->input('basic[photo]',['class'=>'','type'=>'file','label'=>__('Photo')]);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-2">
                        <div class="row list" data-index_no="0">
                            <div class="academicWrapper">
                                <div class="col-md-12 single_list">
                                    <div class="form-group "><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->input('academic[0][type]',['options' => ['1'=>__('Academic'),'2'=>__('Training')],'class'=>'form-control academic_type','empty'=>__('Select'),'label'=>['text'=>'Type','class'=>'col-sm-3 control-label text-right']]);
                                        echo $this->Form->input('academic[0][title_bn]',['class'=>'form-control title_bn','label'=>__('Title Bn')]);
                                        echo $this->Form->input('academic[0][title_en]',['class'=>'form-control title_en','label'=>__('Title En')]);
                                        echo $this->Form->input('academic[0][result]',['class'=>'form-control result','label'=>__('Result'),'templates'=>['inputContainer'=>'<div class="form-group hidden_container hidden">{{content}}</div>']]);
                                        echo $this->Form->input('academic[0][institute_name]',['class'=>'form-control institute_name','label'=>__('Institute')]);
                                        echo $this->Form->input('academic[0][institute_address]',['class'=>'form-control institute_address','label'=>__('Institute Address')]);
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->input('academic[0][board_name]',['class'=>'form-control board_name','label'=>__('Board Name'),'templates'=>['inputContainer'=>'<div class="form-group hidden_container hidden">{{content}}</div>']]);
                                        echo $this->Form->input('academic[0][major_subject]',['class'=>'form-control major_subject','label'=>__('Major Subject'),'templates'=>['inputContainer'=>'<div class="form-group hidden_container hidden">{{content}}</div>']]);
                                        echo $this->Form->input('academic[0][starting_time]',['class'=>'form-control starting_time datepicker','label'=>__('Starting Time')]);
                                        echo $this->Form->input('academic[0][completion_time]',['class'=>'form-control completion_time datepicker','label'=>__('Completion Time')]);
                                        echo $this->Form->input('academic[0][duration]',['class'=>'form-control duration','label'=>__('Duration')]);
                                        echo $this->Form->input('academic[0][remarks]',['type'=>'textarea','rows'=>2,'class'=>'form-control remarks','label'=>__('Remarks')]);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-offset-11">
                            <input type="button" class="btn btn-circle green add_more" value="Add" />
                        </div>
                    </div>
                    <div id="tabs-3">
                        <div class="row list_dependent" data-index_no="0">
                            <div class="dependentWrapper">
                                <div class="col-md-12 single_list_dependent">
                                    <div class="form-group "><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->input('dependent[0][full_name_bn]',['class'=>'form-control full_name_bn','label'=>__('Full Name Bn')]);
                                        echo $this->Form->input('dependent[0][full_name_en]',['class'=>'form-control full_name_en','label'=>__('Full Name En')]);
                                        echo $this->Form->input('dependent[0][relation]',['class'=>'form-control relation','label'=>__('Relation')]);
                                        echo $this->Form->input('dependent[0][gender]',['options'=>[1=>'Male',2=>'Female'],'class'=>'form-control gender','label'=>__('Gender')]);
                                        echo $this->Form->input('dependent[0][date_of_birth]',['class'=>'form-control date_of_birth datepicker','label'=>__('Date Of Birth')]);
                                        echo $this->Form->input('dependent[0][nid]',['class'=>'form-control nid','label'=>__('NID')]);
                                        echo $this->Form->input('dependent[0][bin_brn]',['class'=>'form-control bin_brn','label'=>__('Bin Brn')]);
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->input('dependent[0][occupation]',['class'=>'form-control occupation','label'=>__('Occupation')]);
                                        echo $this->Form->input('dependent[0][phone_number]',['class'=>'form-control phone_number','label'=>__('Phone Number')]);
                                        echo $this->Form->input('dependent[0][cell_number]',['class'=>'form-control cell_number','label'=>__('Cell Number')]);
                                        echo $this->Form->input('dependent[0][email]',['class'=>'form-control email','label'=>__('Email')]);
                                        echo $this->Form->input('dependent[0][address]',['type'=>'textarea','rows'=>2,'class'=>'form-control address','label'=>__('Address')]);
                                        echo $this->Form->input('dependent[0][photo]',['class'=>'','type'=>'file','label'=>__('Photo')]);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-offset-11">
                            <input type="button" class="btn btn-circle green add_more_dependent" value="Add" />
                        </div>
                    </div>
                    <div id="tabs-4">
                    </div>
                    <div id="tabs-5">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <?php
                                echo $this->Form->input('emergency[name_bn]',['class'=>'form-control','label'=>__('Name Bn')]);
                                echo $this->Form->input('emergency[name_en]',['class'=>'form-control','label'=>__('Name En')]);
                                echo $this->Form->input('emergency[relation]',['class'=>'form-control','label'=>__('Relation')]);
                                echo $this->Form->input('emergency[contact_number_phone]',['class'=>'form-control', 'label'=>__('Contact No. Phone')]);
                                echo $this->Form->input('emergency[contact_number_cell]',['class'=>'form-control','label'=>__('Contact No. Cell')]);
                                echo $this->Form->input('emergency[address]',['type'=>'textarea','rows'=>2,'class'=>'form-control','label'=>__('Address')]);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-6">
                        <div class="row list_history" data-index_no="0">
                            <div class="historyWrapper">
                                <div class="col-md-12 single_list_history">
                                    <div class="form-group "><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->input('history[0][office_id]',['options'=>$offices,'empty'=>'Select','class'=>'form-control office','label'=>__('Office')]);
                                        echo $this->Form->input('history[0][office_unit_id]',['options'=>[],'empty'=>'Select','class'=>'form-control office_unit_id','label'=>__('Office Unit')]);
                                        echo $this->Form->input('history[0][designation_id]',['options'=>[],'empty'=>'Select','class'=>'form-control designation_id','label'=>__('Designation')]);
                                        echo $this->Form->input('history[0][user_designation_id]',['options'=>[],'empty'=>'Select','class'=>'form-control user_designation_id','label'=>__('User Designation')]);
                                        echo $this->Form->input('history[0][initial_job_status_id]',['options'=>[],'empty'=>'Select','class'=>'form-control','label'=>__('Initial Job Status')]);
                                        echo $this->Form->input('history[0][ending_job_status_id]',['options'=>[],'empty'=>'Select','class'=>'form-control','label'=>__('Ending Job Status')]);
                                        echo $this->Form->input('history[0][start_date]',['class'=>'form-control datepicker','label'=>__('Start Date')]);
                                        ?>
                                    </div>
                                    <div class="col-md-6">
                                        <?php
                                        echo $this->Form->input('history[0][end_date]',['class'=>'form-control datepicker','label'=>__('End Date')]);
                                        echo $this->Form->input('history[0][reason]',['class'=>'form-control','label'=>__('Reason')]);
                                        echo $this->Form->input('history[0][remarks]',['class'=>'form-control','label'=>__('Remarks')]);
                                        echo $this->Form->input('history[0][job_description]',['class'=>'form-control','label'=>__('Job Description')]);
                                        echo $this->Form->input('history[0][job_grade]',['class'=>'form-control','label'=>__('Job Grade')]);
                                        echo $this->Form->input('history[0][pay_scale]',['class'=>'form-control','label'=>__('Pay Scale')]);
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-offset-11">
                            <input type="button" class="btn btn-circle green add_more_history" value="Add" />
                        </div>
                    </div>
                    <div id="tabs-7">
                        <div class="row list_language" data-index_no="0">
                            <div class="languageWrapper">
                                <div class="col-md-12 single_list_language">
                                    <div class="form-group"><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td colspan="4" class="col-md-3 col-md-offset-4"><?php echo $this->Form->input('language[0][name_en]',['options'=>$languages,'empty'=>'Select','style'=>'width:400px','class'=>'form-control','label'=>['text'=>__('Language')]]);?></td>
                                        </tr>
                                        <tr>
                                            <td class="col-md-3"><?php echo $this->Form->input('language[0][name_en]',['empty'=>'Reading Skill','options'=>$language_options,'class'=>'form-control','label'=>['text'=>'','class'=>'hidden']]);?></td>
                                            <td class="col-md-3"><?php echo $this->Form->input('language[0][name_en]',['empty'=>'Reading Skill','options'=>$language_options,'class'=>'form-control','label'=>['text'=>'','class'=>'hidden']]);?></td>
                                            <td class="col-md-3"><?php echo $this->Form->input('language[0][name_en]',['empty'=>'Listening Skill','options'=>$language_options,'class'=>'form-control','label'=>['text'=>'','class'=>'hidden']]);?></td>
                                            <td class="col-md-3"><?php echo $this->Form->input('language[0][name_en]',['empty'=>'Listening Skill','options'=>$language_options,'class'=>'form-control','label'=>['text'=>'','class'=>'hidden']]);?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-offset-11">
                            <input type="button" class="btn btn-circle green add_more_language" value="Add" />
                        </div>
                    </div>
                    <div id="tabs-8">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-2">
                                <?php
                                echo $this->Form->input('medical[blood_group]',['empty'=>'Select','options'=>$blood_groups,'class'=>'form-control','label'=>__('Blood Group')]);
                                echo $this->Form->input('medical[medical_history]',['type'=>'textarea','rows'=>3,'class'=>'form-control','label'=>__('Medical History')]);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-9">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-2">
                                <?php
                                echo $this->Form->input('login[username]',['class'=>'form-control','label'=>__('Username')]);
                                echo $this->Form->input('login[password]',['class'=>'form-control','label'=>__('Password')]);
                                echo $this->Form->input('login[user_group_id]', ['options' => $userGroups,'class'=>'form-control','label'=>__('User Group')]);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center"><?= $this->Form->button(__('Submit'),['class'=>'btn green-seagreen','style'=>'margin:20px 0 10px 0']) ?></div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
<style>
    .academicWrapper .col-md-12
    {
        border: 2px solid seagreen;
        margin-bottom: 15px;
        padding: 20px;
    }
    .dependentWrapper .col-md-12
    {
        border: 2px solid seagreen;
        margin-bottom: 15px;
        padding: 20px;
    }
    .languageWrapper .col-md-12
    {
        border: 2px solid seagreen;
        margin-bottom: 15px;
        padding: 20px;
    }
    .historyWrapper .col-md-12
    {
        border: 2px solid seagreen;
        margin-bottom: 15px;
        padding: 20px;
    }
</style>
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });

    $(document).ready(function(){

//        $('.datepicker').each(function(){
//            $(this).datepicker();
//        });

        $(document).on("focus", ".datepicker", function()
        {
            if($(this).hasClass('hasDatepicker')===true)
            {
                $(this).removeClass('hasDatepicker');
                $(this).datepicker();
            }
            else
            {
                $(this).datepicker();
            }
        });

        $(document).on('change','.married',function(){
            if($(this).prop('checked'))
            {
                $('.for_married').removeAttr('readonly');
            }
            else
            {
                $('.for_married').attr('readonly','readonly');
            }
        });

        $(document).on('change','.academic_type',function(){
            if($(this).val()==1)
            {
                $(this).closest('.single_list').find('.hidden_container').removeClass('hidden');
            }
            else
            {
                $(this).closest('.single_list').find('.hidden_container').addClass('hidden');
            }
        });

        // Academic Section Add More
        $(document).on('click', '.add_more', function () {
            var index = $('.list').data('index_no');
            $('.list').data('index_no', index + 1);
            var html = $('.academicWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.value = '';
            }).end();

            $('.academicWrapper').append(html);
        });

        $(document).on('click', '.remove', function () {
            var obj=$(this);
            var count= $('.single_list').length;
            if(count > 1){
                obj.closest('.single_list').remove();
            }
        });

        // Dependent Section Add More
        $(document).on('click', '.add_more_dependent', function () {
            var index = $('.list_dependent').data('index_no');
            $('.list_dependent').data('index_no', index + 1);
            var html = $('.dependentWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.value = '';
            }).end();

            $('.dependentWrapper').append(html);
        });

        $(document).on('click', '.remove', function () {
            var obj=$(this);
            var count= $('.single_list_dependent').length;
            if(count > 1){
                obj.closest('.single_list_dependent').remove();
            }
        });

        // Language Section Add More
        $(document).on('click', '.add_more_language', function () {
            var index = $('.list_language').data('index_no');
            $('.list_language').data('index_no', index + 1);
            var html = $('.languageWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.value = '';
            }).end();

            $('.languageWrapper').append(html);
        });

        $(document).on('click', '.remove', function () {
            var obj=$(this);
            var count= $('.single_list_language').length;
            if(count > 1){
                obj.closest('.single_list_language').remove();
            }
        });
        // Employment History Section Add More
        $(document).on('click', '.add_more_history', function () {
            var index = $('.list_history').data('index_no');
            $('.list_history').data('index_no', index + 1);
            var html = $('.historyWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.value = '';
            }).end();

            $('.historyWrapper').append(html);
        });

        $(document).on('click', '.remove', function () {
            var obj=$(this);
            var count= $('.single_list_history').length;
            if(count > 1){
                obj.closest('.single_list_history').remove();
            }
        });

        // Get office units by office AJAX
        $(document).on('change','.office',function()
        {
            var office_id = $(this).val();
            var obj = $(this);
            obj.closest('.single_list_history').find('.office_unit_id').html('<option><?php echo __('Select');?></option>');

            if(office_id>0)
            {
                $.ajax({
                    url: '<?= $this->Url->build('/Users/ajax/get_unit')?>',
                    type: 'POST',
                    data:{office_id:office_id},

                    success: function (data, status)
                    {
                        $.each(JSON.parse(data), function(key, value) {
                            obj.closest('.single_list_history').find('.office_unit_id').append($("<option></option>").attr("value",key).text(value));
                        });
                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");
                    }
                });
            }
        });

        // Get office unit designations by office unit AJAX
        $(document).on('change','.office_unit_id',function()
        {
            var obj = $(this);
            obj.closest('.single_list_history').find('.designation_id').html('<option><?php echo __('Select');?></option>');

            var office_id = obj.closest('.single_list_history').find('.office').val();
            var office_unit_id = obj.val();

            if(office_id>0)
            {
                $.ajax({
                    url: '<?= $this->Url->build('/Users/ajax/get_unit_designation')?>',
                    type: 'POST',
                    data:{office_id:office_id, office_unit_id:office_unit_id},

                    success: function (data, status)
                    {
                        $.each(JSON.parse(data), function(key, value) {
                            obj.closest('.single_list_history').find('.designation_id').append($("<option></option>").attr("value",key).text(value));
                        });
                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");
                    }
                });
            }
        });

        // Get user designations by office unit designation AJAX
        $(document).on('change','.designation_id',function()
        {
            var obj = $(this);
            obj.closest('.single_list_history').find('.user_designation_id').html('<option><?php echo __('Select');?></option>');

            var office_id = obj.closest('.single_list_history').find('.office').val();
            var office_unit_designation_id = obj.closest('.single_list_history').find('.designation_id').val();

            if(office_id>0)
            {
                $.ajax({
                    url: '<?= $this->Url->build('/Users/ajax/get_user_designation')?>',
                    type: 'POST',
                    data:{office_id:office_id, office_unit_designation_id:office_unit_designation_id},

                    success: function (data, status)
                    {
                        $.each(JSON.parse(data), function(key, value) {
                            obj.closest('.single_list_history').find('.user_designation_id').append($("<option></option>").attr("value",key).text(value));
                        });
                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");
                    }
                });
            }
        });
    });
</script>
