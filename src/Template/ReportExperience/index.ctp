<?php
use Cake\Core\Configure;

$user = $this->request->Session()->read('Auth')['User'];

?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('Experience Report'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-seagreen">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Experience Report') ?>
                </div>
                <div class="tools">
                    <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'btn btn-sm btn-success']); ?>
                </div>
            </div>

            <div class="portlet-body">
                <?= $this->Form->create('',['class' => 'form-horizontal', 'role' => 'form', 'action'=>'index']) ?>
                <div class="row">
                    <div class="col-md-7 col-md-offset-2">
                        <?php
                        echo $this->Form->input('employee', ['empty'=>'Select', 'class'=>'form-control select2me', 'options'=>$employees]);
                        echo $this->Form->input('report_type', ['empty'=>'Select', 'class'=>'form-control report_type select2me', 'options'=>Configure::read('experience_report_type')]);
                        ?>
                        <div class="lpr_age_div hidden">
                            <?php
                            echo $this->Form->input('lpr_age', ['class'=>'form-control select2me', 'value'=>Configure::read('lpr_range')]);
                            ?>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <?= $this->Form->button(__('Search'), ['class' => 'btn blue', 'style' => 'margin:20px']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php if(isset($reportData)):?>
<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-seagreen">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Report View') ?>
                </div>
            </div>

            <div class="portlet-body">
                <div class="col-md-12">
                    <button class="btn btn-xs btn-primary icon-print2" style="float: right;margin: 0 0 10px 10px" onclick="#">&nbsp;PDF&nbsp;</button>
                    <button class="btn btn-xs btn-warning icon-print2" style="float: right;margin-bottom: 10px" onclick="print_rpt()">&nbsp;Print&nbsp;</button>
                </div>
                <div id="PrintArea">
                    <div class="row">
                        <h3 class="text-center"><?= $offices[$user['office_id']] ?></h3>
                    </div>
                    <div class="row">
                        <h4 class="text-center"><?= __('Experience Report') ?></h4>
                    </div>

                    <div class="row">
                        <div class="col-md-12 report-table" style="overflow: auto;">
                            <?php
                            if($report_type==2):
                            ?>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="border-top: 3px solid #ddd">
                                            <th><?= __('Sl#') ?></th>
                                            <th><?= __('Employee') ?></th>
                                            <th><?= __('Experience') ?></th>
                                            <th><?= __('Joining Date') ?></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php if(sizeof($reportData)>0):?>
                                        <?php foreach($reportData as $key=>$detail):?>
                                            <tr>
                                                <td><?= $key+1;?></td>
                                                <td><?= $detail['full_name_bn'];?></td>
                                                <td><?= $this->System->get_date_diff(strtotime(date('d-m-Y')), $detail['user_basics']['job_joining_date']);?></td>
                                                <td><?= date('d-m-y', $detail['user_basics']['job_joining_date']);?></td>
                                            </tr>
                                        <?php endforeach;?>
                                        <?php else:?>
                                            <tr><td class="text-center alert-danger" colspan="12"><?= __('No Data Found')?></td></tr>
                                        <?php endif;?>
                                    </tbody>
                                </table>
                            <?php elseif($report_type==1):?>
                                <table class="table table-bordered">
                                    <thead>
                                    <tr style="border-top: 3px solid #ddd">
                                        <th><?= __('Sl#') ?></th>
                                        <th><?= __('Employee') ?></th>
                                        <th><?= __('Years Remaining') ?></th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <?php if(sizeof($reportData)>0):?>
                                        <?php foreach($reportData as $key=>$detail):?>
                                            <tr>
                                                <td><?= $key+1;?></td>
                                                <td><?= $detail['full_name_bn'];?></td>
                                                <td><?= $this->System->get_remaining_lpr_years(date('d-m-Y', $detail['user_basics']['date_of_birth']), $lpr_age);?></td>
                                            </tr>
                                        <?php endforeach;?>
                                    <?php else:?>
                                        <tr><td class="text-center alert-danger" colspan="12"><?= __('No Data Found')?></td></tr>
                                    <?php endif;?>
                                    </tbody>
                                </table>
                            <?php endif;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif;?>

<script type="text/javascript">

    $(document).ready(function(){
        $(document).on("change",".report_type", function()
        {
            if($(this).val()==1)
                $('.lpr_age_div').removeClass('hidden');
            else
                $('.lpr_age_div').addClass('hidden');
        });
    });

    function print_rpt() {
        URL = "<?php echo $this->request->webroot; ?>page/Print_a4_Eng.php?selLayer=PrintArea";
        day = new Date();
        id = day.getTime();
        eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=yes,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width=880,height=600,left = 20,top = 50');");
    }
</script>
