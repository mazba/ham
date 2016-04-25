<?php
use Cake\Core\Configure;

$language_options = \Cake\Core\Configure::read('language_options');
$blood_groups = \Cake\Core\Configure::read('blood_groups');
$languages = \Cake\Core\Configure::read('languages');
$genders = \Cake\Core\Configure::read('genders');
$religions = \Cake\Core\Configure::read('religions');
$academicTraining = \Cake\Core\Configure::read('academic_training');

?>
<div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        <div class="card-background">
            <?php
            if(isset($user['picture_name']) && strlen($user['picture_name'])>0)
            {
                ?>
                <img alt="" class="card-bkimg" src="<?= $this->request->webroot; ?><?= $user['picture_name']?>"/>
                <?php
            }
            else
            {
                ?>
                <img class="card-bkimg" alt="" src="<?= $this->request->webroot; ?>img/blank.png">
                <?php
            }
            ?>
        </div>
        <div class="useravatar">
            <?php
            if(isset($user['picture_name']) && strlen($user['picture_name'])>0)
            {
                ?>
                <img alt="" class="img-circle" src="<?= $this->request->webroot; ?><?= $user['picture_name']?>"/>
                <?php
            }
            else
            {
                ?>
                <img alt="" src="<?= $this->request->webroot; ?>img/blank.png">
                <?php
            }
            ?>
        </div>
        <div class="card-info">
            <span class="card-title"><?php echo $user['full_name_bn']; ?></span>
        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
        <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-primary" href="#tab1" data-toggle="tab"><span
                    class="glyphicon glyphicon-home" aria-hidden="true"></span>
                <div class="hidden-xs"><?= __('Basic') ?></div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" href="#tab2" data-toggle="tab"><span
                    class="glyphicon glyphicon-th-large" aria-hidden="true"></span>
                <div class="hidden-xs"><?= __('Academic') ?></div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab3" data-toggle="tab"><span
                    class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                <div class="hidden-xs"><?= __('Designation') ?></div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab4" data-toggle="tab"><span
                    class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                <div class="hidden-xs"><?= __('Dependency') ?></div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" href="#tab5" data-toggle="tab"><span
                    class="glyphicon glyphicon-certificate" aria-hidden="true"></span>
                <div class="hidden-xs"><?= __('Other') ?></div>
            </button>
        </div>
    </div>

    <div class="well">
        <div class="tab-content">
            <div class="tab-pane fade in active" id="tab1">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?= __('Basic Info')?></h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <div>
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td><?= __('Name')?>:</td>
                                                        <td><?= $user['full_name_bn'];?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Father\'s Name')?>:</td>
                                                        <td><?= $user['user_basic']['father_name_bn']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Mother\'s Name')?>:</td>
                                                        <td><?= $user['user_basic']['mother_name_bn']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Gender')?>:</td>
                                                        <td><?= isset($user['user_basic']['gender'])?$genders[$user['user_basic']['gender']]:''; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('religion')?>:</td>
                                                        <td><?= isset($user['user_basic']['religion'])?$religions[$user['user_basic']['religion']]:''; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Date Of Birth')?>:</td>
                                                        <td><?= isset($user['user_basic']['date_of_birth'])?date('d-m-Y', $user['user_basic']['date_of_birth']):''; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Place Of Birth')?>:</td>
                                                        <td><?= $user['user_basic']['place_of_birth']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('nationality')?>:</td>
                                                        <td><?= $user['user_basic']['nationality']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Cell Phone')?>:</td>
                                                        <td><?= $user['user_basic']['cell_phone']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Email')?>:</td>
                                                        <td><?= $user['user_basic']['email']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Present Address')?>:</td>
                                                        <td><?= $user['user_basic']['present_address']; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td><?= __('Permanent Address')?>:</td>
                                                        <td><?= $user['user_basic']['permanent_address']; ?></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade in" id="tab2">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?= __('Academic/ Training Info')?></h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <div>
                                            <table class="table table-user-information">
                                                <tbody>
                                                    <tr>
                                                        <td><?= __('Type')?></td>
                                                        <td><?= __('Title')?></td>
                                                        <td><?= __('Institution')?></td>
                                                    </tr>
                                                    <?php
                                                    foreach($user['user_academic_trainings'] as $academic_training)
                                                    {
                                                    ?>
                                                        <tr>
                                                            <td><?= isset($academic_training['type'])?$academicTraining[$academic_training['type']]:''; ?></td>
                                                            <td><?= $academic_training['title_bn']; ?></td>
                                                            <td><?= $academic_training['institute_name']; ?></td>
                                                        </tr>
                                                    <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade in" id="tab3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?= __('Designation Info')?></h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <div>
                                            <table class="table table-user-information">
                                                <tbody>
<!--                                                    <tr>-->
<!--                                                        <td>--><?//= __('Name')?><!--</td>-->
<!--                                                        <td>--><?//= $user['full_name_bn'];?><!--</td>-->
<!--                                                    </tr>                                                   -->
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade in" id="tab4">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?= __('Dependents')?></h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <div>
                                            <table class="table table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td><?= __('Name')?></td>
                                                    <td><?= __('Relation')?></td>
                                                    <td><?= __('Gender')?></td>
                                                    <td><?= __('Date Of Birth')?></td>
                                                    <td><?= __('Cell No.')?></td>
                                                </tr>
                                                <?php
                                                foreach($user['user_dependents'] as $dependent)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?= $dependent['full_name_bn']; ?></td>
                                                        <td><?= $dependent['relation']; ?></td>
                                                        <td><?= isset($dependent['gender'])?$genders[$dependent['gender']]:''; ?></td>
                                                        <td><?= isset($dependent['date_of_birth'])?date('d-m-Y', $dependent['date_of_birth']):''; ?></td>
                                                        <td><?= $dependent['cell_number']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade in" id="tab5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?= __('Medical Info')?></h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <div>
                                            <table class="table table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td><?= __('Blood Group')?>:</td>
                                                    <td><?= $user['user_medical']['blood_group'];?></td>
                                                </tr>
                                                <tr>
                                                    <td><?= __('Medical History')?>:</td>
                                                    <td><?= $user['user_medical']['medical_history']; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="panel-title"><?= __('Emergency Contact')?></h3>
                                </div>
                                <div class="panel-body">
                                    <div>
                                        <div>
                                            <table class="table table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td><?= __('Name')?>:</td>
                                                    <td><?= $user['user_emergency_contact']['name_bn'];?></td>
                                                </tr>
                                                <tr>
                                                    <td><?= __('Relation')?>:</td>
                                                    <td><?= $user['user_emergency_contact']['relation']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?= __('Contact Number')?>:</td>
                                                    <td><?= $user['user_emergency_contact']['contact_number_cell']; ?></td>
                                                </tr>
                                                <tr>
                                                    <td><?= __('Address')?>:</td>
                                                    <td><?= $user['user_emergency_contact']['address']; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        margin-top: 0px;
        padding: 30px;
        background-color: rgba(214, 224, 226, 0.2);
        -webkit-border-top-left-radius: 5px;
        -moz-border-top-left-radius: 5px;
        border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-top-right-radius: 5px;
        border-top-right-radius: 5px;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
    }

    .card.hovercard {
        position: relative;
        padding-top: 0;
        overflow: hidden;
        text-align: center;
        background-color: #fff;
        background-color: rgba(255, 255, 255, 1);
    }

    .card.hovercard .card-background {
        height: 130px;
    }

    .card-background img {
        -webkit-filter: blur(25px);
        -moz-filter: blur(25px);
        -o-filter: blur(25px);
        -ms-filter: blur(25px);
        filter: blur(25px);
        margin-left: -100px;
        margin-top: -200px;
        min-width: 130%;
    }

    .card.hovercard .useravatar {
        position: absolute;
        top: 15px;
        left: 0;
        right: 0;
    }

    .card.hovercard .useravatar img {
        width: 100px;
        height: 100px;
        max-width: 100px;
        max-height: 100px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: 5px solid rgba(255, 255, 255, 0.5);
    }

    .card.hovercard .card-info {
        position: absolute;
        bottom: 14px;
        left: 0;
        right: 0;
    }

    .card.hovercard .card-info .card-title {
        padding: 0 5px;
        font-size: 20px;
        line-height: 1;
        color: #262626;
        background-color: rgba(255, 255, 255, 0.1);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        border-radius: 4px;
    }

    .card.hovercard .card-info {
        overflow: hidden;
        font-size: 12px;
        line-height: 20px;
        color: #737373;
        text-overflow: ellipsis;
    }

    .card.hovercard .bottom {
        padding: 0 20px;
        margin-bottom: 17px;
    }

    .btn-pref .btn {
        -webkit-border-radius: 0 !important;
    }

    /*/ Detail/*/
    .user-row {
        margin-bottom: 14px;
    }

    .user-row:last-child {
        margin-bottom: 0;
    }

    .dropdown-user {
        margin: 13px 0;
        padding: 5px;
        height: 100%;
    }

    .dropdown-user:hover {
        cursor: pointer;
    }

    .table-user-information > tbody > tr {
        border-top: 1px solid rgb(221, 221, 221);
    }

    .table-user-information > tbody > tr:first-child {
        border-top: 0;
    }

    .table-user-information > tbody > tr > td {
        border-top: 0;
    }

    .toppad {
        margin-top: 20px;
    }

</style>
<script>
    $(document).ready(function () {
        $(".btn-pref .btn").click(function () {
            $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
            // $(".tab").addClass("active"); // instead of this do the below
            $(this).removeClass("btn-default").addClass("btn-primary");
        });
    });
</script>