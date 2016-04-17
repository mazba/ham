<?php
use Cake\Core\Configure;
$status = Configure::read('status_options');
?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-suitcase"></i><?php echo __('Add Office'); ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']) ?>
                </div>
            </div>
            <div class="portlet-body">
                <?= $this->Form->create($office,['class'=>'form-horizontal']) ?>
                <div class="row">
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('name_bn');
                        echo $this->Form->input('name_en');
                        echo $this->Form->input('short_name_bn');
                        echo $this->Form->input('short_name_en');
                        echo $this->Form->input('code');
                        echo $this->Form->input('digital_nothi_code');
                        echo $this->Form->input('reference_code');
                        echo $this->Form->input('phone');
                        echo $this->Form->input('mobile');
                        echo $this->Form->input('fax');
                        echo $this->Form->input('email');
                        echo $this->Form->input('web_url');
                        ?>
                    </div>
                    <div class="col-md-6">
                        <?php
                        echo $this->Form->input('parent_id', ['options' => $parentOffices, 'empty' => __('Select')]);
                        echo $this->Form->input('office_level_id', ['options' => $officeLevels, 'empty' => __('Select')]);
                        echo $this->Form->input('area_division_id', ['options' => $areaDivisions, 'empty' => __('Select')]);
                        echo $this->Form->input('area_zone_id', ['empty' => __('Select')]);
                        echo $this->Form->input('area_district_id', ['empty' => __('Select')]);
                        echo $this->Form->input('area_upazila_id', ['empty' => __('Select')]);
                        echo $this->Form->input('address');
                        echo $this->Form->input('description');
                        echo $this->Form->input('status',['options'=>$status]);
                        ?>
                    </div>
                    <div class="col-md-12">
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
        $(document).on('change','#area-division-id',function(){
            var division_id = $(this).val();
            $('#area-district-id').html('');
            $('#area-zone-id').html('');
            if(division_id)
            {
                $.ajax({
                    url: '<?=$this->Url->build(('/Offices/ajax/get_zone_district'), true)?>',
                    type: 'POST',
                    data:{division_id:division_id},
                    success: function (data, status)
                    {
                        var data =JSON.parse(data);
                        console.log(data)
                        $.each(data['district'], function(key, value) {
                            $('#area-district-id')
                                .append($("<option></option>")
                                    .attr("value",key)
                                    .text(value));
                        });
                        $.each(data['zone'], function(key, value) {
                            $('#area-zone-id')
                                .append($("<option></option>")
                                    .attr("value",key)
                                    .text(value));
                        });
                    },
                    error: function (xhr, desc, err)
                    {
                        console.log("error");

                    }
                });
            }
        });
        $(document).on('change','#area-district-id',function(){
            var district_id = $(this).val();
            var division_id = $('#area-division-id').val();
            $('#area-upazila-id').html('');
            if(district_id && division_id)
            {
                $.ajax({
                    url: '<?=$this->Url->build(('/Offices/ajax/get_upazila'), true)?>',
                    type: 'POST',
                    data:{district_id:district_id,division_id:division_id},
                    success: function (data, status)
                    {
                        var data =JSON.parse(data);
                        $.each(data, function(key, value) {
                            $('#area-district-id')
                                .append($("<option></option>")
                                    .attr("value",value)
                                    .text(value));
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