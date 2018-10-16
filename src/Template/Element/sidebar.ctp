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
            
            <li class="treeview <?php if (in_array($controller, array('admins'))) echo ' active ' ?>">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span><?php echo __('LABEL_ADMIN_MANAGEMENT'); ?></span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li class="<?php if (in_array($action, array('index'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/admins">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_ADMIN_LIST');?>
                        </a>
                    </li>
                    <li class="<?php if (in_array($action, array('viewlog'))) echo ' active ' ?>">
                        <a href="<?php echo $BASE_URL; ?>/admins/viewlog">
                            <i class="fa fa-circle-o"></i> <?php echo __('LABEL_ADMIN_LOG');?>
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
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
