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
            <?= $this->Html->link(__('Item Report'), ['action' => 'index']) ?>
            <i class="fa fa-angle-right"></i>
        </li>
    </ul>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="portlet box green-seagreen">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-plus-square-o fa-lg"></i><?= __('Item Report') ?>
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
                        echo $this->Form->input('item_category_id', ['class' => 'form-control select2me item_category_id', 'options' => $itemCategories, 'empty' => __('Select'), 'templates' => ['inputContainer' => '<div class="form-group item_category {{type}}{{required}}">{{content}}</div>']]);
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
                        <h4 class="text-center"><?= __('Item Report') ?></h4>
                    </div>

                    <div class="row">
                        <div class="col-md-12 report-table" style="overflow: auto;">
                            <table class="table table-bordered">
                                <thead>
                                    <tr style="border-top: 3px solid #ddd">
                                        <th><?= __('Sl#') ?></th>
                                        <th><?= __('Item') ?></th>
                                        <th><?= __('Item Serial#') ?></th>
                                        <th><?= __('Item Model#') ?></th>
                                        <th><?= __('Warehouse Quantity') ?></th>
                                        <th><?= __('Assigned Quantity') ?></th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php if(sizeof($reportData)>0):?>
                                    <?php foreach($reportData as $key=>$detail):?>
                                        <tr>
                                            <td><?= $key+1;?></td>
                                            <td><?= $detail['title_bn'];?></td>
                                            <td><?= $detail['serial_number'];?></td>
                                            <td><?= $detail['model_number'];?></td>
                                            <td><?= $detail['quantity'];?></td>
                                            <td><?= $detail['assigned_quantity'];?></td>
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
<style>
    .ui-datepicker-month
    {
        color: dimgrey !important;
    }
</style>

<script type="text/javascript">
    $(document).ready(function(){
        $(document).on("focus",".datepicker", function()
        {
//            $(this).removeClass('hasDatepicker').datepicker({
//                dateFormat: 'dd-mm-yy'
//            });
        });

        $(document).on('change', '.item_category_id', function () {
            var type_id = $(this).val();
            var obj = $(this);
            $.ajax({
                type: 'POST',
                url: '<?= $this->Url->build("/ReportItem/ajax/getItemCategories")?>',
                data: {type_id: type_id},
                success: function (data, status) {
                    obj.closest('.item_category').nextAll('.item_category').remove();
                    if (data) {
                        obj.closest('.form-group').after(data);
                    }
                }
            });
        });
    });

    function print_rpt() {
        URL = "<?php echo $this->request->webroot; ?>page/Print_a4_Eng.php?selLayer=PrintArea";
        day = new Date();
        id = day.getTime();
        eval("page" + id + " = window.open(URL, '" + id + "', 'toolbar=yes,scrollbars=yes ,location=0,statusbar=0 ,menubar=yes,resizable=1,width=880,height=600,left = 20,top = 50');");
    }
</script>
