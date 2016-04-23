<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-coffee"></i>Users List <?= $this->Html->link(__('New User'), ['action' => 'add'],['class'=>'btn btn-sm btn-primary']) ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id') ?></th>
                            <th><?= $this->Paginator->sort('username') ?></th>
                            <th><?= $this->Paginator->sort('name_bn') ?></th>
                            <th><?= $this->Paginator->sort('name_en') ?></th>
                            <th><?= $this->Paginator->sort('user_group') ?></th>
                            <th><?= $this->Paginator->sort('designation') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= $this->Number->format($user->id) ?></td>
                                <td><?= h($user->username) ?></td>
                                <td><?= h($user->full_name_bn) ?></td>
                                <td><?= h($user->full_name_en) ?></td>
                                <td><?= $user->has('user_group') ? $this->Html->link($user->user_group->title, ['controller' => 'UserGroups', 'action' => 'view', $user->user_group->id]) : '' ?></td>
                                <td><?= h($user->designation) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('View'), ['action' => 'view', $user->id],['class' => 'btn btn-sm btn-success']) ?>
                                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id],['class' => 'btn btn-sm btn-warning']) ?>
                                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id],['class' => 'btn btn-sm btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>