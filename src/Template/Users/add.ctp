<?php
use Cake\Core\Configure;
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
                    <ul>
                        <li><a href="#tabs-1"><?= __('Basic')?></a></li>
                        <li class="ui-tabs-active ui-state-active"><a href="#tabs-2"><?= __('Academic')?></a></li>
                        <li><a href="#tabs-3"><?= __('Dependent');?></a></li>
                        <li><a href="#tabs-4"><?= __('Designation');?></a></li>
                        <li><a href="#tabs-5"><?= __('Emergency');?></a></li>
                        <li><a href="#tabs-6"><?= __('Employment History');?></a></li>
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
                                <div class="col-md-7 col-md-offset-2">
                                    <?php
                                    echo $this->Form->input('academic[0][type]',['options' => ['1'=>__('Academic'),'2'=>__('Training')],'class'=>'form-control academic_type','empty'=>__('Select'),'label'=>['text'=>'Type','class'=>'col-sm-3 control-label text-right']]);
                                    echo $this->Form->input('academic[0][title_bn]',['class'=>'form-control title_bn','label'=>__('Title Bn')]);
                                    echo $this->Form->input('academic[0][title_en]',['class'=>'form-control title_en','label'=>__('Title En')]);
                                    echo $this->Form->input('academic[0][result]',['class'=>'form-control result','label'=>__('Result'),'templates'=>['inputContainer'=>'<div class="form-group hidden_container hidden">{{content}}</div>']]);
                                    echo $this->Form->input('academic[0][institute_name]',['class'=>'form-control institute_name','label'=>__('Institute')]);
                                    echo $this->Form->input('academic[0][institute_address]',['class'=>'form-control institute_address','label'=>__('Institute Address')]);
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
                        <div class="row col-md-offset-8">
                            <input type="button" class="btn btn-circle green add_more" value="Add" />
                        </div>
                    </div>
                    <div id="tabs-3">
                    </div>
                    <div id="tabs-4">
                    </div>
                    <div id="tabs-5">
                    </div>
                    <div id="tabs-6">
                    </div>
                    <div id="tabs-7">
                    </div>
                    <div id="tabs-8">
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
    .academicWrapper .col-md-7
    {
        border: 2px solid seagreen;
        margin-bottom: 15px;
        padding: 20px;
    }
    .academicWrapper .col-md-7:last-child
    {
        /*border-bottom: 0px;*/
        /*margin-bottom: 0px;;*/
    }
</style>
<script>
    $(function() {
        $( "#tabs" ).tabs();
    });

    $(document).ready(function(){

        $('.datepicker').datepicker();

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
                $(this).closest('.academicWrapper').find('.hidden_container').removeClass('hidden');
            }
            else
            {
                $(this).closest('.academicWrapper').find('.hidden_container').addClass('hidden');
            }
        });

        $(document).on('click', '.add_more', function () {
            var index = $('.list').data('index_no');
            $('.list').data('index_no', index + 1);
            var html = $('.academicWrapper .col-md-7:last').clone().find('.form-control').each(function () {
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

//        $(document).on('change','#controller',function(){
//            var controller = $(this).val();
//            $('#method').html('');
//            if(controller)
//            {
//                $.ajax({
//                    url: '<?//=$this->Url->build(('/Tasks/ajax/get_method'), true)?>//',
//                    type: 'POST',
//                    data:{controller:controller},
//                    success: function (data, status)
//                    {
//                        $.each(JSON.parse(data), function(key, value) {
//                            $('#method')
//                                .append($("<option></option>")
//                                    .attr("value",value)
//                                    .text(value));
//                        });
//                    },
//                    error: function (xhr, desc, err)
//                    {
//                        console.log("error");
//
//                    }
//                });
//            }
//        });
    });
</script>
