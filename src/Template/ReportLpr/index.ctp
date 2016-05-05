<?php
use Cake\Core\Configure;

$user = $this->request->Session()->read('Auth')['User'];

//echo $this->System->get_date_diff(strtotime('05-05-1916'), time());
//$years = 60;
//$dateBeforePostYears = strtotime("- ".$years." year", time());
//echo date('d-m-y', $dateBeforePostYears);
//exit;

//echo strtotime('10-12-1950');
//exit;
//$dateBeforePostYears = strtotime("- 60 year", time());
//echo $dateBeforePostYears;
//exit;
?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?= $this->Url->build(('/Dashboard'), true); ?>"><?= __('Dashboard') ?></a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <?= $this->Html->link(__('LPR Report'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-seagreen">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('LPR Report') ?>
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
//                        echo $this->Form->input('employee', ['empty'=>'Select', 'class'=>'form-control select2me', 'options'=>$employees]);
//                        echo $this->Form->input('minimum_years', ['class'=>'form-control select2me', 'options'=>$yearRange, 'empty'=>'Select']);
                        ?>
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
                        <h4 class="text-center"><?= __('LPR Report') ?></h4>
                    </div>

                    <div class="row">
                        <div class="col-md-12 report-table" style="overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="border-top: 3px solid #ddd">
                                        <th><?= __('Sl#') ?></th>
                                        <th><?= __('Employee') ?></th>
                                        <th><?= __('Joining Date') ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if(sizeof($reportData)>0):?>
                                    <?php foreach($reportData as $key=>$detail):?>
                                        <tr>
                                            <td><?= $key+1;?></td>
                                            <td><?= $detail['full_name_bn'];?></td>
                                            <td><?= date('d-m-y', $detail['create_date']);?></td>
                                        </tr>
                                    <?php endforeach;?>
                                    <?php else:?>
                                        <tr><td class="text-center alert-danger" colspan="12"><?= __('No Data Found')?></td></tr>
                                    <?php endif;?>
                                </tbody>
                            </table>
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
//        $(document).on("focus",".datepicker", function()
//        {
//            $(this).removeClass('hasDatepicker').datepicker({
//                dateFormat: 'dd-mm-yy'
//            });
//        });
    });

    function print_rpt() {
        URL = "<?php echo $this->request->webroot; ?>page/Print_a4_Eng.php?selLayer=PrintArea";
        day = new Date();
        id = day.getTime();
        eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=yes,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width=880,height=600,left = 20,top = 50');");
    }
</script>
