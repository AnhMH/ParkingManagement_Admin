<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo $AppUI['avatar']; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo $AppUI['display_name']; ?></p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="<?php if (in_array($controller, array('top')) && $action == 'index') echo ' active ' ?>">
                <a href="<?php echo $BASE_URL; ?>">
                    <i class="fa fa-dashboard"></i> <span><?php echo __('LABEL_DASHBOARD'); ?></span>
                </a>
            </li>
            
            <li class="treeview <?php if (in_array($controller, array('admins', 'admintypes'))) echo ' active ' ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span><?php echo __('LABEL_ADMIN_MANAGEMENT'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (in_array($action, array('index')) && $controller == 'admins') echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/admins">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_ADMIN_LIST');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('viewlog'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/admins/viewlog">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_ADMIN_LOG');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('index')) && $controller == 'admintypes') echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/admintypes">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_ADMIN_TYPE_LIST');?>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php if (in_array($controller, array('revenue'))) echo ' active ' ?>">
                <a href="#">
                    <i class="fa fa fa-usd"></i>
                    <span><?php echo __('LABEL_REVENUE_MANAGEMENT'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (in_array($action, array('index'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/revenue">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_REVENUE_LIST');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('priceformula1'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/revenue/priceformula1">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_PRICE_FORMULA_1');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('priceformula2'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/revenue/priceformula2">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_PRICE_FORMULA_2');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('priceformula3'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/revenue/priceformula3">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_PRICE_FORMULA_3');?>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php if (in_array($controller, array('vehicles', 'cards'))) echo ' active ' ?>">
                <a href="#">
                    <i class="fa fa-barcode"></i>
                    <span><?php echo __('LABEL_CARD_VEHICLE_MANAGEMENT'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (in_array($action, array('index' , 'update', 'import')) && $controller == 'cards') echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/cards">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_CARD_LIST');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('index')) && $controller == 'vehicles') echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/vehicles">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_VEHICLE_LIST');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('active')) && $controller == 'cards') echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/cards/active">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_CARD_ACTIVE');?>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php if (in_array($controller, array('monthlycards'))) echo ' active ' ?>">
                <a href="#">
                    <i class="fa fa-credit-card"></i>
                    <span><?php echo __('LABEL_MONTHLYCARD_MANAGEMENT'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (in_array($action, array('viewlog'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/monthlycards/viewlog">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_MONTHLYCARD_VIEWLOG');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('index' , 'update', 'import'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/monthlycards">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_MONTHLYCARD_LIST');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('renewal'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/monthlycards/renewal">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_MONTHLYCARD_RENEWAL');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('disablelist', 'updatecode'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/monthlycards/disablelist">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_MONTHLYCARD_CHANGE');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('active'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/monthlycards/active">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_MONTHLYCARD_ACTIVE');?>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php if (in_array($controller, array('settings'))) echo ' active ' ?>">
                <a href="#">
                    <i class="fa fa fa-gear"></i>
                    <span><?php echo __('LABEL_SYSTEM_SETTING'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (in_array($action, array('display'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/settings/display">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_DISPLAY_SETTING');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('order'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/settings/order">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_ORDER_LIST');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('permission'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/settings/permission">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_SETTING_PERMISSION');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('systemlog'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/settings/systemlog">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_SYSTEM_LOG');?>
                        </a>
                    </li>
                </ul>
            </li>
            
            <li class="treeview <?php if (in_array($controller, array('checkinoutlogs'))) echo ' active ' ?>">
                <a href="#">
                    <i class="fa fa-exchange"></i>
                    <span><?php echo __('LABEL_CHECKINOUT_LOG'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (in_array($action, array('card'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/checkinoutlogs/card">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_CARD_LOG');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('monthlycard'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/checkinoutlogs/monthlycard">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_MONTHLY_CARD_LOG');?>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
