<?php
use Cake\Core\Configure;
?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box green">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i>View User
                </div>
                <div class="tools">
                    <a class="collapse" href="javascript:;" data-original-title="" title="">
                    </a>
                </div>
            </div>
            <div class="portlet-body">
                <table class="table table-bordered">
                    <tr>
                        <th><?= __('Username') ?></th>
                        <td><?= h($user->username) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Name Bn') ?></th>
                        <td><?= h($user->name_bn) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Name En') ?></th>
                        <td><?= h($user->name_en) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('User Group') ?></th>
                        <td><?= $user->has('user_group') ? $this->Html->link($user->user_group->title, ['controller' => 'UserGroups', 'action' => 'view', $user->user_group->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Designation') ?></th>
                        <td><?= h($user->designation) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Gender') ?></th>
                        <td><?= h($user->gender) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Phone') ?></th>
                        <td><?= h($user->phone) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Office Phone') ?></th>
                        <td><?= h($user->office_phone) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Mobile') ?></th>
                        <td><?= h($user->mobile) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Email') ?></th>
                        <td><?= h($user->email) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('National Id No') ?></th>
                        <td><?= h($user->national_id_no) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Picture Alt') ?></th>
                        <td><?= h($user->picture_alt) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Picture Name') ?></th>
                        <td><?= h($user->picture_name) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <td><?= $this->Number->format($user->id) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Notifiacation') ?></th>
                        <td><?= $this->Number->format($user->notifiacation) ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Create By') ?></th>
                        <td><?= $user->has('created_by') ? $this->Html->link($user->created_by->name_en, ['controller' => 'Users', 'action' => 'view', $user->created_by->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Dob') ?></th>
                        <td><?= $user->dob ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Create Date') ?></th>
                        <td><?= $user->created_time ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Update By') ?></th>
                        <td><?= $user->has('updated_by') ? $this->Html->link($user->updated_by->name_en, ['controller' => 'Users', 'action' => 'view', $user->updated_by->id]) : '' ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Update Date') ?></th>
                        <td><?= $user->updated_time ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Present Address') ?></th>
                        <td><?= $this->Text->autoParagraph(h($user->present_address)); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Permanent Address') ?></th>
                        <td><?= $this->Text->autoParagraph(h($user->permanent_address)); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Photo') ?></th>
                        <td><img height="100" width="100" src="<?= $this->Url->build('/'.$user->photo, true); ?>" alt="PHOTO"/></td>
                    </tr>
                    <tr>
                        <th><?= __('Status') ?></th>
                        <td><?= Configure::read('status')[$user->status] ?></td>
                    </tr>
                </table>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>
<script>
    $(document).ready(function(){

    });
</script>
