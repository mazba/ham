<?php
use Cake\Core\Configure;

$language_options = \Cake\Core\Configure::read('language_options');
$blood_groups = \Cake\Core\Configure::read('blood_groups');
$languages = \Cake\Core\Configure::read('languages');
$genders = \Cake\Core\Configure::read('genders');
$religions = \Cake\Core\Configure::read('religions');
?>

<div class="portlet box green-seagreen">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gift"></i><?= __('Add User');?>
        </div>
        <div class="tools">
            <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
        </div>
    </div>
    <div class="portlet-body">
        <?= $this->Form->create($user,['type' => 'file', 'class'=>'form-horizontal myForm','novalidate']) ?>
        <div class="tabbable-custom ">
            <ul class="nav nav-tabs ">
                <li><a href="#tab_5_1" data-toggle="tab"><?= __('Basic')?></a></li>
                <li class="active"><a href="#tab_5_2" data-toggle="tab"><?= __('Academic')?></a></li>
                <li><a href="#tab_5_3" data-toggle="tab"><?= __('Dependent');?></a></li>
                <li><a href="#tab_5_4" data-toggle="tab"><?= __('Designation');?></a></li>
                <li><a href="#tab_5_5" data-toggle="tab"><?= __('Emergency');?></a></li>
                <li><a href="#tab_5_6" data-toggle="tab"><?= __('Employment History');?></a></li>
                <li><a href="#tab_5_7" data-toggle="tab"><?= __('Language');?></a></li>
                <li><a href="#tab_5_8" data-toggle="tab"><?= __('Medical');?></a></li>
                <li><a href="#tab_5_9" data-toggle="tab"><?= __('Login Info');?></a></li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane" id="tab_5_1">
                    <div class="row whiteWrapper basicWrapper">
                        <div class="col-md-8 col-md-offset-2">
                            <?php
                            echo $this->Form->input('full_name_bn');
                            echo $this->Form->input('full_name_en');
                            echo $this->Form->input('user_basic.father_name_bn');
                            echo $this->Form->input('user_basic.father_name_en');
                            echo $this->Form->input('user_basic.mother_name_bn');
                            echo $this->Form->input('user_basic.mother_name_en');
                            echo $this->Form->input('user_basic.nid');
                            echo $this->Form->input('user_basic.bin_brn');
                            echo $this->Form->input('user_basic.date_of_birth',['class'=>'form-control datepicker','type'=>'text']);
                            echo $this->Form->input('user_basic.place_of_birth',['class'=>'form-control','label'=>__('Place Of Birth')]);
                            echo $this->Form->input('user_basic.nationality',['class'=>'form-control','label'=>__('Nationality')]);
                            echo $this->Form->input('user_basic.is_ethnic',['type'=>'checkbox','class'=>'form-control','label'=>__('Is Ethnic')]);
                            echo $this->Form->input('user_basic.is_disable',['type'=>'checkbox','class'=>'form-control','label'=>__('Is Disable')]);
                            echo $this->Form->input('user_basic.is_married',['type'=>'checkbox','class'=>'form-control married','label'=>__('Is Married')]);
                            echo $this->Form->input('user_basic.spouse_name_bn',['class'=>'for_married form-control','readonly'=>'readonly','label'=>__('Spouse Name Bn')]);
                            echo $this->Form->input('user_basic.spouse_name_en',['class'=>'for_married form-control','readonly'=>'readonly','label'=>__('Spouse Name En')]);
                            echo $this->Form->input('user_basic.gender',['options'=>$genders,'class'=>'form-control','label'=>__('Gender')]);
                            echo $this->Form->input('user_basic.religion',['options'=>$religions,'class'=>'form-control','label'=>__('Religion')]);
                            echo $this->Form->input('user_basic.home_phone',['class'=>'form-control','label'=>__('Home Phone')]);
                            echo $this->Form->input('user_basic.cell_phone',['class'=>'form-control','label'=>__('Cell Phone')]);
                            echo $this->Form->input('user_basic.email',['class'=>'form-control','label'=>__('Email')]);
                            echo $this->Form->input('user_basic.passport_number',['class'=>'form-control','label'=>__('Passport Number')]);
                            echo $this->Form->input('user_basic.driving_license_number',['class'=>'form-control','label'=>__('Driving License Number')]);
                            echo $this->Form->input('user_basic.tin_number',['class'=>'form-control','label'=>__('TIN Number')]);
                            echo $this->Form->input('user_basic.present_address',['type'=>'textarea','rows'=>'2','class'=>'form-control','label'=>__('Present Address')]);
                            echo $this->Form->input('user_basic.permanent_address',['type'=>'textarea','rows'=>'2','class'=>'form-control','label'=>__('Permanent Address')]);
                            echo $this->Form->input('picture_name_file',['class'=>'','type'=>'file','label'=>__('Photo')]);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane active" id="tab_5_2">
                    <div class="row list" data-index_no="0">
                        <div class="academicWrapper">
                            <div class="col-md-12 single_list">
                                <div class="form-group"><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('user_academic_trainings.0.type',['options' => ['1'=>__('Academic'),'2'=>__('Training')],'class'=>'form-control academic_type','empty'=>__('Select'),'label'=>['text'=>'Type','class'=>'col-sm-3 control-label text-right']]);
                                    echo $this->Form->input('user_academic_trainings.0.training_type',['class'=>'form-control training_type','label'=>__('Training'),'templates'=>['inputContainer' => '<div class="form-group training_container hidden input {{type}}{{required}}">{{content}}</div>']]);
                                    echo $this->Form->input('user_academic_trainings.0.title_bn',['class'=>'form-control title_bn','label'=>__('Title Bn'),'templates'=>['inputContainer' => '<div class="form-group academic_container hidden input {{type}}{{required}}">{{content}}</div>']]);
                                    echo $this->Form->input('user_academic_trainings.0.title_en',['class'=>'form-control title_en','templates'=>['inputContainer' => '<div class="form-group academic_container hidden input {{type}}{{required}}">{{content}}</div>']]);
                                    echo $this->Form->input('user_academic_trainings.0.result',['class'=>'form-control result','label'=>__('Result'),'templates'=>['inputContainer' => '<div class="form-group academic_container hidden input {{type}}{{required}}">{{content}}</div>']]);
                                    echo $this->Form->input('user_academic_trainings.0.institute_name',['class'=>'form-control institute_name','label'=>__('Institute')]);
                                    echo $this->Form->input('user_academic_trainings.0.institute_address',['class'=>'form-control institute_address','label'=>__('Institute Address')]);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('user_academic_trainings.0.board_name',['class'=>'form-control board_name','label'=>__('Board Name'),'templates'=>['inputContainer' =>'<div class="form-group academic_container hidden input {{type}}{{required}}">{{content}}</div>']]);
                                    echo $this->Form->input('user_academic_trainings.0.major_subject',['class'=>'form-control major_subject','label'=>__('Major Subject'),'templates'=>['inputContainer'=>'<div class="form-group academic_container hidden input {{type}}{{required}}">{{content}}</div>']]);
                                    echo $this->Form->input('user_academic_trainings.0.starting_time',['type'=>'text','class'=>'form-control starting_time datepicker','label'=>__('Starting Time')]);
                                    echo $this->Form->input('user_academic_trainings.0.completion_time',['type'=>'text','class'=>'form-control completion_time datepicker','label'=>__('Completion Time')]);
                                    echo $this->Form->input('user_academic_trainings.0.duration',['class'=>'form-control duration','label'=>__('Duration')]);
                                    echo $this->Form->input('user_academic_trainings.0.remarks',['type'=>'textarea','rows'=>2,'class'=>'form-control remarks','label'=>__('Remarks')]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-offset-11">
                        <input type="button" class="btn btn-circle green add_more" value="Add" />
                    </div>
                </div>
                <div class="tab-pane" id="tab_5_3">
                    <div class="row list_dependent" data-index_no="0">
                        <div class="dependentWrapper">
                            <div class="col-md-12 single_list_dependent">
                                <div class="form-group "><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('user_dependents.0.full_name_bn',['class'=>'form-control full_name_bn','label'=>__('Full Name Bn')]);
                                    echo $this->Form->input('user_dependents.0.full_name_en',['class'=>'form-control full_name_en','label'=>__('Full Name En')]);
                                    echo $this->Form->input('user_dependents.0.relation',['class'=>'form-control relation','label'=>__('Relation')]);
                                    echo $this->Form->input('user_dependents.0.gender',['options'=>[1=>'Male',2=>'Female'],'class'=>'form-control gender','label'=>__('Gender')]);
                                    echo $this->Form->input('user_dependents.0.date_of_birth',['type'=>'text','class'=>'form-control date_of_birth datepicker','label'=>__('Date Of Birth')]);
                                    echo $this->Form->input('user_dependents.0.nid',['class'=>'form-control nid','label'=>__('NID')]);
                                    echo $this->Form->input('user_dependents.0.bin_brn',['class'=>'form-control bin_brn','label'=>__('Bin Brn')]);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('user_dependents.0.occupation',['class'=>'form-control occupation','label'=>__('Occupation')]);
                                    echo $this->Form->input('user_dependents.0.phone_number',['class'=>'form-control phone_number','label'=>__('Phone Number')]);
                                    echo $this->Form->input('user_dependents.0.cell_number',['class'=>'form-control cell_number','label'=>__('Cell Number')]);
                                    echo $this->Form->input('user_dependents.0.email',['class'=>'form-control email','label'=>__('Email')]);
                                    echo $this->Form->input('user_dependents.0.address',['type'=>'textarea','rows'=>2,'class'=>'form-control address','label'=>__('Address')]);
                                    echo $this->Form->input('user_dependents.0.image_name_file',['class'=>'','type'=>'file','label'=>__('Photo')]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-offset-11">
                        <input type="button" class="btn btn-circle green add_more_dependent" value="Add" />
                    </div>
                </div>
                <div class="tab-pane" id="tab_5_4">
                    <div class="row list_designation" data-index_no="0">
                        <div class="designationWrapper">
                            <div class="col-md-12 single_list_designation">
                                <div class="form-group "><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                <div class="col-md-11" style="border: 0px; margin: 0px;">
                                    <div class="col-md-4 col-md-offset-3">
                                        <?php
                                        echo $this->Form->input('user_designations.0.is_basic',['type'=>'checkbox','value'=>1,'class'=>'form-control is_basic simpleCheckbox','label'=>__('Is Basic'), 'style'=>'margin-top:-7px;']);
                                        ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('user_designations.0.office_id',['options'=>$offices,'empty'=>'Select','class'=>'form-control office','label'=>__('Office')]);
                                    echo $this->Form->input('user_designations.0.office_unit_id',['options'=>[],'empty'=>'Select','class'=>'form-control office_unit_id','label'=>__('Office Unit')]);
                                    echo $this->Form->input('user_designations.0.office_unit_designation_id',['options'=>[],'empty'=>'Select','class'=>'form-control office_unit_designation_id','label'=>__('Office Unit Designation')]);
                                    echo "<div class='des_div hidden'>";
                                    echo $this->Form->input('user_designations.0.designation_id',['options'=>[],'empty'=>'Select','class'=>'form-control designation_id','label'=>__('Designation')]);
                                    echo "</div>";
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('user_designations.0.designation_order',['type'=>'text','options'=>[],'empty'=>'Select','class'=>'form-control','label'=>__('Designation Order')]);
                                    echo $this->Form->input('user_designations.0.starting_date',['type'=>'text','class'=>'form-control datepicker','label'=>__('Starting Date')]);
                                    echo $this->Form->input('user_designations.0.ending_date',['type'=>'text','class'=>'form-control datepicker','label'=>__('Ending Date')]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-offset-11">
                        <input type="button" class="btn btn-circle green add_more_designation" value="Add" />
                    </div>
                </div>
                <div class="tab-pane" id="tab_5_5">
                    <div class="row whiteWrapper emergencyWrapper">
                        <div class="col-md-8 col-md-offset-2">
                            <?php
                            echo $this->Form->input('user_emergency_contact.name_bn',['class'=>'form-control','label'=>__('Name Bn')]);
                            echo $this->Form->input('user_emergency_contact.name_en',['class'=>'form-control','label'=>__('Name En')]);
                            echo $this->Form->input('user_emergency_contact.relation',['class'=>'form-control','label'=>__('Relation')]);
                            echo $this->Form->input('user_emergency_contact.contact_number_phone',['class'=>'form-control', 'label'=>__('Contact No. Phone')]);
                            echo $this->Form->input('user_emergency_contact.contact_number_cell',['class'=>'form-control','label'=>__('Contact No. Cell')]);
                            echo $this->Form->input('user_emergency_contact.address',['type'=>'textarea','rows'=>2,'class'=>'form-control','label'=>__('Address')]);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_5_6">
                    <div class="row list_history" data-index_no="0">
                        <div class="historyWrapper">
                            <div class="col-md-12 single_list_history">
                                <div class="form-group "><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('user_employment_histories.0.office_id',['type'=>'text','class'=>'form-control office','label'=>__('Office')]);
                                    echo $this->Form->input('user_employment_histories.0.office_unit_id',['type'=>'text','class'=>'form-control office_unit_id','label'=>__('Office Unit')]);
                                    echo $this->Form->input('user_employment_histories.0.designation_id',['type'=>'text','class'=>'form-control designation_id','label'=>__('Designation')]);
                                    echo $this->Form->input('user_employment_histories.0.user_designation_id',['type'=>'text','class'=>'form-control user_designation_id','label'=>__('User Designation')]);
                                    echo $this->Form->input('user_employment_histories.0.initial_job_status_id',['type'=>'text','class'=>'form-control','label'=>__('Initial Job Status')]);
                                    echo $this->Form->input('user_employment_histories.0.ending_job_status_id',['type'=>'text','class'=>'form-control','label'=>__('Ending Job Status')]);
                                    echo $this->Form->input('user_employment_histories.0.start_date',['type'=>'text','class'=>'form-control datepicker','label'=>__('Start Date')]);
                                    ?>
                                </div>
                                <div class="col-md-6">
                                    <?php
                                    echo $this->Form->input('user_employment_histories.0.end_date',['type'=>'text','class'=>'form-control datepicker','label'=>__('End Date')]);
                                    echo $this->Form->input('user_employment_histories.0.reason',['class'=>'form-control','label'=>__('Reason')]);
                                    echo $this->Form->input('user_employment_histories.0.remarks',['class'=>'form-control','label'=>__('Remarks')]);
                                    echo $this->Form->input('user_employment_histories.0.job_description',['class'=>'form-control','label'=>__('Job Description')]);
                                    echo $this->Form->input('user_employment_histories.0.job_grade',['class'=>'form-control','label'=>__('Job Grade')]);
                                    echo $this->Form->input('user_employment_histories.0.pay_scale',['class'=>'form-control','label'=>__('Pay Scale')]);
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-offset-11">
                        <input type="button" class="btn btn-circle green add_more_history" value="Add" />
                    </div>
                </div>
                <div class="tab-pane" id="tab_5_7">
                    <div class="row list_language" data-index_no="0">
                        <div class="languageWrapper">
                            <div class="col-md-12 single_list_language">
                                <div class="form-group"><span class="btn btn-sm btn-circle btn-danger remove pull-right"><i class="fa fa-close"></i></span></div>
                                <table class="table table-bordered">
                                    <tr>
                                        <td colspan="4" class="col-md-3 col-md-offset-4"><?php echo $this->Form->input('user_language_details.0.name_en',['options'=>$languages,'empty'=>'Select','style'=>'width:400px','class'=>'form-control','label'=>['text'=>__('Language')]]);?></td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3"><?php echo $this->Form->input('user_language_details.0.read_level',['empty'=>'Reading Skill','options'=>$language_options,'class'=>'form-control','label'=>['text'=>'','class'=>'hidden']]);?></td>
                                        <td class="col-md-3"><?php echo $this->Form->input('user_language_details.0.write_level',['empty'=>'Writting Skill','options'=>$language_options,'class'=>'form-control','label'=>['text'=>'','class'=>'hidden']]);?></td>
                                        <td class="col-md-3"><?php echo $this->Form->input('user_language_details.0.listen_level',['empty'=>'Listening Skill','options'=>$language_options,'class'=>'form-control','label'=>['text'=>'','class'=>'hidden']]);?></td>
                                        <td class="col-md-3"><?php echo $this->Form->input('user_language_details.0.speaking_level',['empty'=>'Speaking Skill','options'=>$language_options,'class'=>'form-control','label'=>['text'=>'','class'=>'hidden']]);?></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="row col-md-offset-11">
                        <input type="button" class="btn btn-circle green add_more_language" value="Add" />
                    </div>
                </div>
                <div class="tab-pane" id="tab_5_8">
                    <div class="row whiteWrapper medicalWrapper">
                        <div class="col-md-8 col-md-offset-2">
                            <?php
                            echo $this->Form->input('user_medical.blood_group',['empty'=>'Select','options'=>$blood_groups,'class'=>'form-control','label'=>__('Blood Group')]);
                            echo $this->Form->input('user_medical.medical_history',['type'=>'textarea','rows'=>3,'class'=>'form-control','label'=>__('Medical History')]);
                            ?>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab_5_9">
                    <div class="row whiteWrapper loginWrapper">
                        <div class="col-md-6 col-md-offset-2">
                            <?php
                            echo $this->Form->input('username',['class'=>'form-control','label'=>__('Username')]);
                            echo $this->Form->input('password',['class'=>'form-control','label'=>__('Password')]);
                            echo $this->Form->input('user_group_id', ['options' => $userGroups,'class'=>'form-control','label'=>__('User Group')]);
                            ?>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                <div class="text-center"><?= $this->Form->button(__('Submit'),['class'=>'btn green-seagreen','style'=>'margin:20px 0 10px 0']) ?></div>
            </div>
        </div>
    </div>
</div>

<style>
    .remove{margin-right: 20px;}
    .my-error-class {
        color:darkred !important;
    }
</style>
<script>
    $(document).ready(function(){
        // Validation Identifier Start START
//        $('.basicWrapper').find('.form-group').each(function(){
//            if($(this).hasClass('required'))
//            {
//                $('#ui-id-1').addClass('my-error-class');
//            }
//        });
        // Validation Identifier Start END

        $(document).on('focus','.training_type', function()
        {
            $(this).autocomplete({
                source: function (request, response) {
                    $.ajax({
                        type: 'POST',
                        url: "<?= $this->Url->build('/Users/ajax/get_training_types')?>",
                        dataType: "json",
                        data: {
                            qstring: request.term
                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                }
            });
        });

        $(document).on('click', '.is_basic', function()
        {
            var count = $(".is_basic:checked").length;
            if(count>1)
            {
                alert('You can choose one designation as basic!');
                $(this).attr('checked', false);
            }

            var obj = $(this).closest('.single_list_designation');
            if($(this).prop('checked'))
            {
                obj.find('.office_unit_id').closest('.form-group').hide();
                obj.find('.office_unit_designation_id').closest('.form-group').hide();
                obj.find('.des_div').removeClass('hidden');
            }
            else
            {
                obj.find('.office_unit_id').closest('.form-group').show();
                obj.find('.office_unit_designation_id').closest('.form-group').show();
                obj.find('.des_div').addClass('hidden');
            }
        });

        $(document).on("focus",".datepicker", function()
        {
            $(this).removeClass('hasDatepicker').datepicker({
                dateFormat: 'dd-mm-yy'
            });
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
                $(this).closest('.single_list').find('.academic_container').removeClass('hidden');
                $(this).closest('.single_list').find('.training_container').addClass('hidden');
            }
            else if($(this).val()==2)
            {
                $(this).closest('.single_list').find('.training_container').removeClass('hidden');
                $(this).closest('.single_list').find('.academic_container').addClass('hidden');
            }
            else
            {
                $(this).closest('.single_list').find('.training_container').addClass('hidden');
                $(this).closest('.single_list').find('.academic_container').addClass('hidden');
            }
        });

        // Academic Section Add More & Remove
        $(document).on('click', '.add_more', function () {
            var index = $('.list').data('index_no');
            $('.list').data('index_no', index + 1);
            var html = $('.academicWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.id = this.id.replace(/\d+/, index+1);
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

        // Dependent Section Add More & Remove
        $(document).on('click', '.add_more_dependent', function () {
            var index = $('.list_dependent').data('index_no');
            $('.list_dependent').data('index_no', index + 1);
            var html = $('.dependentWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.id = this.id.replace(/\d+/, index+1);
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

        // Language Section Add More & Remove
        $(document).on('click', '.add_more_language', function () {
            var index = $('.list_language').data('index_no');
            $('.list_language').data('index_no', index + 1);
            var html = $('.languageWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.id = this.id.replace(/\d+/, index+1);
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
        // Employment History Section Add More & Remove
        $(document).on('click', '.add_more_history', function () {
            var index = $('.list_history').data('index_no');
            $('.list_history').data('index_no', index + 1);
            var html = $('.historyWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.id = this.id.replace(/\d+/, index+1);
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
        // Designation Section Add More & Remove
        $(document).on('click', '.add_more_designation', function () {
            var index = $('.list_designation').data('index_no');
            $('.list_designation').data('index_no', index + 1);
            var html = $('.designationWrapper .col-md-12:last').clone().find('.form-control').each(function () {
                this.name = this.name.replace(/\d+/, index+1);
                this.id = this.id.replace(/\d+/, index+1);
                this.value = '';

                if($(this).is(':checkbox')){$(this).attr('checked', false)}
                $(this).closest('.single_list_designation').find('.office_unit_id').closest('.form-group').show();
                $(this).closest('.single_list_designation').find('.office_unit_designation_id').closest('.form-group').show();
                $(this).closest('.single_list_designation').find('.des_div').addClass('hidden');
            }).end();

            $('.designationWrapper').append(html);
            $.uniform.update();
        });

        $(document).on('click', '.remove', function () {
            var obj=$(this);
            var count= $('.single_list_designation').length;
            if(count > 1){
                obj.closest('.single_list_designation').remove();
            }
        });

        // Get office units by office AJAX (Designation)
        $(document).on('change','.office',function()
        {
            var office_id = $(this).val();
            var obj = $(this).closest('.single_list_designation');

            if($(this).closest('.single_list_designation').find('.is_basic').prop('checked'))
            {
                obj.find('.designation_id').html('<option><?php echo __('Select');?></option>');

                if(office_id>0)
                {
                    $.ajax({
                        url: '<?= $this->Url->build('/Users/ajax/get_designation_by_office')?>',
                        type: 'POST',
                        data:{office_id:office_id},

                        success: function (data, status)
                        {
                            $.each(JSON.parse(data), function(key, value) {
                                obj.closest('.single_list_designation').find('.designation_id').append($("<option></option>").attr("value",key).text(value));
                            });
                        },
                        error: function (xhr, desc, err)
                        {
                            console.log("error");
                        }
                    });
                }
            }
            else
            {
                obj.find('.office_unit_id').html('<option><?php echo __('Select');?></option>');
                obj.find('.office_unit_designation_id').html('<option><?php echo __('Select');?></option>');
                obj.find('.designation_id').html('<option><?php echo __('Select');?></option>');

                if(office_id>0)
                {
                    $.ajax({
                        url: '<?= $this->Url->build('/Users/ajax/get_unit')?>',
                        type: 'POST',
                        data:{office_id:office_id},

                        success: function (data, status)
                        {
                            $.each(JSON.parse(data), function(key, value) {
                                obj.closest('.single_list_designation').find('.office_unit_id').append($("<option></option>").attr("value",key).text(value));
                            });
                        },
                        error: function (xhr, desc, err)
                        {
                            console.log("error");
                        }
                    });
                }
            }
        });

        // Get office unit designations by office unit AJAX (Designation)
        $(document).on('change','.office_unit_id',function()
        {
            var obj = $(this);
            obj.closest('.single_list_designation').find('.office_unit_designation_id').html('<option><?php echo __('Select');?></option>');
            obj.closest('.single_list_designation').find('.designation_id').html('<option><?php echo __('Select');?></option>');

            var office_id = obj.closest('.single_list_designation').find('.office').val();
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
                            obj.closest('.single_list_designation').find('.office_unit_designation_id').append($("<option></option>").attr("value",key).text(value));
                        });
                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");
                    }
                });
            }
        });

        // Get user designations by office unit designation AJAX (Designation)
        $(document).on('change','.office_unit_designation_id',function()
        {
//            var obj = $(this);
//            obj.closest('.single_list_designation').find('.designation_id').html('<option><?php //echo __('Select');?>//</option>');
//
//            var office_id = obj.closest('.single_list_designation').find('.office').val();
//            var office_unit_designation_id = obj.val();
//
//            if(office_id>0)
//            {
//                $.ajax({
//                    url: '<?//= $this->Url->build('/Users/ajax/get_user_designation')?>//',
//                    type: 'POST',
//                    data:{office_id:office_id, office_unit_designation_id:office_unit_designation_id},
//
//                    success: function (data, status)
//                    {
//                        $.each(JSON.parse(data), function(key, value) {
//                            obj.closest('.single_list_designation').find('.designation_id').append($("<option></option>").attr("value",key).text(value));
//                        });
//                    },
//                    error: function (xhr, desc, err)
//                    {
//                        console.log("error");
//                    }
//                });
//            }

        });

        $("form").submit(function(e)
        {
            if($(".is_basic:checked").length==0)
            {
                alert('No Basic Designation!');
                return false;
            }
            else if($(".is_basic:checked").length>1)
            {
                alert('You can not choose more than one designation as basic!');
                return false;
            }
        });
    });
</script>
