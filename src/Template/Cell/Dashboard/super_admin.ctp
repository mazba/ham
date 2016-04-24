<div class="row">
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison">
            <div class="visual">
                <i class="fa fa-bank"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php echo $office_number; ?>
                </div>
                <div class="desc">
                   <?= __('Total Office') ?>
                </div>
            </div>
            <?php
            echo $this->Html->link(__('View More'), ['action' => 'index','controller'=>'offices'], ['class' => 'more']);
            ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense">
            <div class="visual">
                <i class="fa fa-users"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php echo $user_number; ?>
                </div>
                <div class="desc">
                    <?= __('Total User') ?>
                </div>
            </div>
            <?php
            echo $this->Html->link(__('View More'), ['action' => 'index','controller'=>'users'], ['class' => 'more']);
            ?>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-haze">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php echo $item_number; ?>
                </div>
                <div class="desc">
                    <?= __('Number Of Item') ?>
                </div>
            </div>
            <?php
            echo $this->Html->link(__('View More'), ['action' => 'index','controller'=>'items'], ['class' => 'more']);
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="portlet grey-cascade box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-cogs"></i>Shopping Cart
                </div>
                <div class="actions">
                    <a class="btn btn-default btn-sm" href="#">
                        <i class="fa fa-pencil"></i> Edit </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>

                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>