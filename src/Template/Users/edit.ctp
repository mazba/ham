<?php
use Cake\Core\Configure;
?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i>Edit User
                </div>
                <div class="tools">
                    <a class="collapse" href="javascript:;" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($user,['type' => 'file']) ?>
                <div class="row">
                    <div class="col-md-6 col-md-offset-3">
                        <legend><?= __('Add Task') ?></legend>
                        <?php
                        echo $this->Form->input('username',['class'=>'form-control']);
                        echo $this->Form->input('password',['class'=>'form-control','value'=>'','required'=>false]);
                        echo $this->Form->input('name_bn',['class'=>'form-control']);
                        echo $this->Form->input('name_en',['class'=>'form-control']);
                        echo $this->Form->input('user_group_id', ['options' => $userGroups,'class'=>'form-control']);
                        echo $this->Form->input('designation',['class'=>'form-control']);
                        echo $this->Form->input('gender',['class'=>'form-control']);
                        echo $this->Form->input('phone',['class'=>'form-control']);
                        echo $this->Form->input('office_phone',['class'=>'form-control']);
                        echo $this->Form->input('mobile',['class'=>'form-control']);
                        echo $this->Form->input('email',['class'=>'form-control']);
                        echo $this->Form->input('national_id_no',['class'=>'form-control']);
                        echo $this->Form->input('present_address',['class'=>'form-control']);
                        echo $this->Form->input('permanent_address',['class'=>'form-control']);
                        ?>
                        <img height="100" width="100" src="<?= $this->Url->build('/'.$user->photo, true); ?>" alt="PHOTO"/>
                        <?php
                        echo $this->Form->input('photo',['type'=>'file']);
                        echo $this->Form->input('dob',['class'=>'form-control datepicker','type'=>'text','value'=>$user['dob']]);
                        echo $this->Form->input('status',['class'=>'form-control','options'=>Configure::read('status')]);
                        ?>
                        <?= $this->Form->button(__('Submit'),['class'=>'btn blue pull-right','style'=>'margin-top:20px']) ?>
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
        $('.datepicker').datepicker();
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
