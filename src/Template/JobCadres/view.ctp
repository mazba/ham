<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Job Cadres'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
        <li><?= __('View Job Cadre') ?></li>
    </ul>
</div>


<div class="row">
    <div class="col-md-12">
        <!-- BEGIN BORDERED TABLE PORTLET-->
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-picture-o fa-lg"></i><?= __('Job Cadre Details') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'],['class'=>'btn btn-sm btn-success']); ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-scrollable">
                    <table class="table table-bordered table-hover">
                                                                                                        <tr>
                                    <th><?= __('Name En') ?></th>
                                    <td><?= h($jobCadre->name_en) ?></td>
                                </tr>
                                                                                                        <tr>
                                    <th><?= __('Name Bn') ?></th>
                                    <td><?= h($jobCadre->name_bn) ?></td>
                                </tr>
                                                                                                                                                        <tr>
                                    <th><?= __('Id') ?></th>
                                    <td><?= $this->Number->format($jobCadre->id) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Status') ?></th>
                                    <td><?= $this->Number->format($jobCadre->status) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create By') ?></th>
                                    <td><?= $this->Number->format($jobCadre->create_by) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update By') ?></th>
                                    <td><?= $this->Number->format($jobCadre->update_by) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Create Time') ?></th>
                                    <td><?= $this->Number->format($jobCadre->create_time) ?></td>
                                </tr>
                                                        <tr>
                                    <th><?= __('Update Time') ?></th>
                                    <td><?= $this->Number->format($jobCadre->update_time) ?></td>
                                </tr>
                                                                                                                    </table>
                </div>
            </div>
        </div>
        <!-- END BORDERED TABLE PORTLET-->
    </div>
</div>

