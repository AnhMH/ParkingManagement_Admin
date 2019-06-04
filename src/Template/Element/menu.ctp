<?php
$permission = array();
foreach ($AppUI['permission'] as $k => $v) {
    if (!empty($v)) {
        $permission[] = $k;
    }
}
$adminList = in_array('admin_list', $permission);
$adminLog = in_array('admin_log', $permission);
$adminType = in_array('admin_type', $permission);
$revenueList = in_array('revenue_list', $permission);
$priceFormula1 = in_array('price_formula_1', $permission);
$priceFormula2 = in_array('price_formula_2', $permission);
$priceFormula3 = in_array('price_formula_3', $permission);
$cardList = in_array('card_list', $permission);
$vehicleList = in_array('vehicle_list', $permission);
$cardActive = in_array('card_active', $permission);
$monthlyCardLog = in_array('monthly_card_log', $permission);
$monthlyCardList = in_array('monthly_card_list', $permission);
$monthlyCardRenewal = in_array('monthly_card_renewal', $permission);
$monthlyCardChange = in_array('monthly_card_change', $permission);
$monthlyCardActive = in_array('monthly_card_active', $permission);
$systemDisplaySetting = in_array('system_display_setting', $permission);
$systemOrderList = in_array('system_order_list', $permission);
$systemPermission = in_array('system_permission', $permission);
$systemLog = in_array('system_log', $permission);
$checkInOutCardLog = in_array('checkinout_card_log', $permission);
$checkInOutMonthlyCardLog = in_array('checkinout_monthly_card_log', $permission);
?>

<li class="<?php if (in_array($controller, array('top')) && $action == 'index') echo ' active ' ?>">
    <a href="<?php echo $BASE_URL; ?>">
        Trang<br/>chủ
    </a>
</li>
<?php if ($adminList || $adminLog || $adminType): ?>
    <li class="dropdown <?php if (in_array($controller, array('admins', 'admintypes')) && $action != 'updateprofile') echo ' active ' ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Quản lý </br> nhân sự
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <?php if ($adminList): ?>
                <li class="<?php if (in_array($action, array('index')) && $controller == 'admins') echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/admins">
                        <?php echo __('LABEL_ADMIN_LIST'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($adminLog): ?>
                <li class="<?php if (in_array($action, array('viewlog'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/admins/viewlog">
                        <?php echo __('LABEL_ADMIN_LOG'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($adminType): ?>
                <li class="<?php if (in_array($action, array('index')) && $controller == 'admintypes') echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/admintypes">
                        <?php echo __('LABEL_ADMIN_TYPE_LIST'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>

<li class="dropdown <?php if (in_array($controller, array('companies', 'projects'))) echo ' active ' ?>">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        Quản lý <br /> công ty - dự án
        <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li class="<?php if ($controller == 'companies') echo ' active ' ?>">
            <a href="<?php echo $BASE_URL; ?>/companies">
                <?php echo __('LABEL_COMPANY_MANAGEMENT'); ?>
            </a>
        </li>
        <li class="<?php if ($controller == 'projects') echo ' active ' ?>">
            <a href="<?php echo $BASE_URL; ?>/projects">
                <?php echo __('LABEL_PROJECT_MANAGEMENT'); ?>
            </a>
        </li>
    </ul>
</li>

<?php if ($revenueList || $priceFormula1 || $priceFormula2 || $priceFormula3): ?>
    <li class="dropdown <?php if (in_array($controller, array('revenue'))) echo ' active ' ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Quản lý <br /> doanh thu
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <?php if ($revenueList): ?>
                <li class="<?php if (in_array($controller, array('revenue')) && in_array($action, array('index'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/revenue">
                        <?php echo __('LABEL_REVENUE_LIST'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($priceFormula1): ?>
                <li class="<?php if (in_array($action, array('priceformula1'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/revenue/priceformula1">
                        <?php echo __('LABEL_PRICE_FORMULA_1'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($priceFormula2): ?>
                <li class="<?php if (in_array($action, array('priceformula2'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/revenue/priceformula2">
                        <?php echo __('LABEL_PRICE_FORMULA_2'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($priceFormula3): ?>
                <li class="<?php if (in_array($action, array('priceformula3'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/revenue/priceformula3">
                        <?php echo __('LABEL_PRICE_FORMULA_3'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>

<?php if ($cardList || $cardActive || $vehicleList): ?>
    <li class="dropdown <?php if (in_array($controller, array('vehicles', 'cards'))) echo ' active ' ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
            Quản lý <br/> thẻ xe - loại xe
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <?php if ($cardList): ?>
                <li class="<?php if (in_array($action, array('index', 'update', 'import')) && $controller == 'cards') echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/cards">
                        <?php echo __('LABEL_CARD_LIST'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($vehicleList): ?>
                <li class="<?php if (in_array($action, array('index')) && $controller == 'vehicles') echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/vehicles">
                        <?php echo __('LABEL_VEHICLE_LIST'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($cardActive): ?>
                <li class="<?php if (in_array($action, array('active')) && $controller == 'cards') echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/cards/active">
                        <?php echo __('LABEL_CARD_ACTIVE'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>

<?php if ($monthlyCardList || $monthlyCardLog || $monthlyCardRenewal || $monthlyCardChange || $monthlyCardActive): ?>
    <li class="dropdown <?php if (in_array($controller, array('monthlycards'))) echo ' active ' ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Quản lý <br/> vé tháng
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <?php if ($monthlyCardLog): ?>
                <li class="<?php if (in_array($action, array('viewlog'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/monthlycards/viewlog">
                        <?php echo __('LABEL_MONTHLYCARD_VIEWLOG'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($monthlyCardList): ?>
                <li class="<?php if (in_array($controller, array('monthlycards')) && in_array($action, array('index', 'update', 'import'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/monthlycards">
                        <?php echo __('LABEL_MONTHLYCARD_LIST'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($monthlyCardRenewal): ?>
                <li class="<?php if (in_array($action, array('renewal'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/monthlycards/renewal">
                        <?php echo __('LABEL_MONTHLYCARD_RENEWAL'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($monthlyCardChange): ?>
                <li class="<?php if (in_array($action, array('disablelist', 'updatecode'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/monthlycards/disablelist">
                        <?php echo __('LABEL_MONTHLYCARD_CHANGE'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($monthlyCardActive): ?>
                <li class="<?php if (in_array($action, array('active'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/monthlycards/active">
                        <?php echo __('LABEL_MONTHLYCARD_ACTIVE'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>

<?php if ($systemDisplaySetting || $systemOrderList || $systemPermission || $systemLog): ?>
    <li class="dropdown <?php if (in_array($controller, array('settings'))) echo ' active ' ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Quản lý<br/>hệ thống
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <?php if ($systemDisplaySetting): ?>
                <li class="<?php if (in_array($action, array('display'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/settings/display">
                        <?php echo __('LABEL_DISPLAY_SETTING'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($systemOrderList): ?>
                <li class="<?php if (in_array($action, array('order'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/settings/order">
                        <?php echo __('LABEL_ORDER_LIST'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($systemPermission): ?>
                <li class="<?php if (in_array($action, array('permission'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/settings/permission">
                        <?php echo __('LABEL_SETTING_PERMISSION'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($systemLog): ?>
                <li class="<?php if (in_array($action, array('systemlog'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/settings/systemlog">
                        <?php echo __('LABEL_SYSTEM_LOG'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>

<?php if ($checkInOutCardLog || $checkInOutMonthlyCardLog): ?>
    <li class="dropdown <?php if (in_array($controller, array('checkinoutlogs'))) echo ' active ' ?>">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            Quản lý<br/>xe ra vào
            <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
            <?php if ($checkInOutCardLog): ?>
                <li class="<?php if (in_array($action, array('card'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/checkinoutlogs/card">
                        <?php echo __('LABEL_CARD_LOG'); ?>
                    </a>
                </li>
            <?php endif; ?>
            <?php if ($checkInOutMonthlyCardLog): ?>
                <li class="<?php if (in_array($action, array('monthlycard'))) echo ' active ' ?>">
                    <a href="<?php echo $BASE_URL; ?>/checkinoutlogs/monthlycard">
                        <?php echo __('LABEL_MONTHLY_CARD_LOG'); ?>
                    </a>
                </li>
            <?php endif; ?>
        </ul>
    </li>
<?php endif; ?>

<li class="<?php if (in_array($controller, array('admins')) && $action == 'updateprofile') echo ' active ' ?>">
    <a href="<?php echo $BASE_URL; ?>/admins/updateprofile">
        Cập nhật<br/>tài khoản
    </a>
</li>