<?php
use Cake\Core\Configure;
?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i>Add User
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($user,['type' => 'file', 'class'=>'form-horizontal']) ?>
                <div id="tabs" class="portlet-body">
                    <ul>
                        <li><a href="#tabs-1"><?= __('Basic')?></a></li>
                        <li><a href="#tabs-2"><?= __('Academic')?></a></li>
                        <li><a href="#tabs-3"><?= __('Dependent');?></a></li>
                        <li><a href="#tabs-4"><?= __('Designation');?></a></li>
                        <li><a href="#tabs-5"><?= __('Emergency');?></a></li>
                        <li><a href="#tabs-6"><?= __('Employment History');?></a></li>
                        <li><a href="#tabs-7"><?= __('Language');?></a></li>
                        <li><a href="#tabs-8"><?= __('Medical');?></a></li>
                        <li><a href="#tabs-9"><?= __('Login Info');?></a></li>
                    </ul>
                    <div id="tabs-1" class="">
                        <div class="row">
                            <div class="col-md-7 col-md-offset-3">
                                <?php
                                echo $this->Form->input('full_name_bn',['class'=>'form-control']);
                                echo $this->Form->input('full_name_en',['class'=>'form-control']);
                                echo $this->Form->input('father_name_bn',['class'=>'form-control']);
                                echo $this->Form->input('father_name_en',['class'=>'form-control']);
                                echo $this->Form->input('mother_name_bn',['class'=>'form-control']);
                                echo $this->Form->input('mother_name_en',['class'=>'form-control']);
                                echo $this->Form->input('nid',['class'=>'form-control']);
                                echo $this->Form->input('bin_brn',['class'=>'form-control']);
                                echo $this->Form->input('date_of_birth',['class'=>'form-control datepicker','type'=>'text']);
                                echo $this->Form->input('place_of_birth',['class'=>'form-control']);
                                echo $this->Form->input('nationality',['class'=>'form-control']);
                                echo $this->Form->input('is_ethnic',['type'=>'checkbox','class'=>'form-control']);
                                echo $this->Form->input('is_disable',['type'=>'checkbox','class'=>'form-control']);
                                echo $this->Form->input('is_married',['type'=>'checkbox','class'=>'form-control married']);
                                echo $this->Form->input('spouse_name_bn',['class'=>'for_married form-control','readonly'=>'readonly']);
                                echo $this->Form->input('spouse_name_en',['class'=>'for_married form-control','readonly'=>'readonly']);
                                echo $this->Form->input('gender',['class'=>'form-control']);
                                echo $this->Form->input('religion',['class'=>'form-control']);
                                echo $this->Form->input('home_phone',['class'=>'form-control']);
                                echo $this->Form->input('cell_phone',['class'=>'form-control']);
                                echo $this->Form->input('email',['class'=>'form-control']);
                                echo $this->Form->input('passport_number',['class'=>'form-control']);
                                echo $this->Form->input('driving_license_number',['class'=>'form-control']);
                                echo $this->Form->input('tin_number',['class'=>'form-control']);
                                echo $this->Form->input('present_address',['class'=>'form-control']);
                                echo $this->Form->input('permanent_address',['class'=>'form-control']);
                                echo $this->Form->input('photo',['class'=>'','type'=>'file']);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div id="tabs-2">
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
                    <div id="tabs-7">
                    </div>
                    <div id="tabs-9">
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <?php
                                echo $this->Form->input('username',['class'=>'form-control']);
                                echo $this->Form->input('password',['class'=>'form-control']);
                                echo $this->Form->input('user_group_id', ['options' => $userGroups,'class'=>'form-control']);
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center"><?= $this->Form->button(__('Submit'),['class'=>'btn blue','style'=>'margin:20px 0 10px 0']) ?></div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
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
