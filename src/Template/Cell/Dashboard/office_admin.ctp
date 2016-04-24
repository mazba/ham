<div class="row">
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-madison ">
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
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-intense ">
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
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
        <div class="dashboard-stat red-haze">
            <div class="visual">
                <i class="fa fa-shopping-cart"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php echo $assign_item_number; ?>
                </div>
                <div class="desc">
                    <?= __('Assigned Items') ?>
                </div>
            </div>
            <?php
            echo $this->Html->link(__('View More'), ['action' => 'index','controller'=>'item_assigns'], ['class' => 'more']);
            ?>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
        <div class="dashboard-stat blue-hoki">
            <div class="visual">
                <i class="fa fa-bank"></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php echo $building_number; ?>
                </div>
                <div class="desc">
                    <?= __('Number of Buildings') ?>
                </div>
            </div>
            <?php
            echo $this->Html->link(__('View More'), ['action' => 'index','controller'=>'office_buildings'], ['class' => 'more']);
            ?>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
        <div class="dashboard-stat yellow-casablanca">
            <div class="visual">
                <i class="fa fa-cube "></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php echo $room_number; ?>
                </div>
                <div class="desc">
                    <?= __('Number of Rooms') ?>
                </div>
            </div>
            <?php
            echo $this->Html->link(__('View More'), ['action' => 'index','controller'=>'office_rooms'], ['class' => 'more']);
            ?>
        </div>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-6 col-xs-12">
        <div class="dashboard-stat green-seagreen">
            <div class="visual">
                <i class="fa fa-mortar-board "></i>
            </div>
            <div class="details">
                <div class="number">
                    <?php echo $committee_number; ?>
                </div>
                <div class="desc">
                    <?= __('Number of Committee') ?>
                </div>
            </div>
            <?php
            echo $this->Html->link(__('View More'), ['action' => 'index','controller'=>'committees'], ['class' => 'more']);
            ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-12">
        <div class="portlet green-haze box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bank"></i><?= __('Office Warehouse') ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?= __('Warehouse') ?></th>
                                <th><?= __('Total Item') ?></th>
                                <th><?= __('Assigned Item') ?></th>
                                <th><?= __('Total Withdrawals Item') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($office_warehouse as $warehouse): ?>
                                <tr>
                                    <th><?php echo $warehouse->title_bn; ?></th>
                                    <td><?php echo count($warehouse->items); ?></td>
                                    <td><?php echo count($warehouse->item_assigns); ?></td>
                                    <td><?php echo count($warehouse->item_withdrawals); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="portlet green-haze box">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-bank"></i><?= __('Recently Assigned Items') ?>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <th><?= __('Item') ?></th>
                                <th><?= __('Designated Users') ?></th>
                                <th><?= __('Assigned Date') ?></th>
                                <th><?= __('Quantity') ?></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($recently_assigned_item as $item): ?>
                                <tr>
                                    <td><?php echo $item->item->title_bn.'('.$item->item->office_serial_number.')'; ?></td>
                                    <td><?php echo $item->designated_user->full_name_bn; ?></td>
                                    <td><?php echo $item->formatted_assign_date; ?></td>
                                    <td><?php echo $item->quantity; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>