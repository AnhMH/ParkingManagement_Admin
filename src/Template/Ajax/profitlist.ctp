<div class="quick-info report row" style="margin-bottom: 15px;">
    <div class="col-md-12 padd-0">
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-tag blue" style="font-size: 45px;" aria-hidden="true"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title blue"
                        style="font-size: 25px;"><?php echo number_format($totalDiscount); ?></h3>
                    <span class="infobox-data-number text-center"
                          style="font-size: 14px; color: #555;">Chiết khấu</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 padd-right-0">
            <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-refresh orange" style="font-size: 45px;"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title orange"
                        style="font-size: 25px;"><?php echo number_format($totalPrice); ?></h3>
                    <span class="infobox-data-number text-center"
                          style="font-size: 14px; color: #555;">Doanh số</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 padd-right-0">
            <div class="report-box" style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-money cred" style="font-size: 45px;"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title cred"
                        style="font-size: 25px;"><?php echo number_format($totalOriginPrice); ?></h3>
                    <span class="infobox-data-number text-center" style="font-size: 14px; color: #555;">Tiền vốn</span>
                </div>
            </div>
        </div>
        <div class="col-md-3 padd-right-0">
            <div class="report-box " style="border: 1px dotted #ddd; border-radius: 0">
                <div class="infobox-icon">
                    <i class="fa fa-dollar orange" style="font-size: 45px;"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title orange"
                        style="font-size: 25px;"><?php echo number_format($totalPrice - $totalOriginPrice); ?></h3>
                    <span class="infobox-data-number text-center"
                          style="font-size: 14px; color: #555;">Lợi nhuận</span>
                </div>
            </div>
        </div>
    </div>
</div>
<?php if ($type == 2): ?>
    <?php echo $this->element('profit_customer', array('profit' => $profit)); ?>
<?php elseif ($type == 3): ?>
    <?php echo $this->element('profit_product', array('profit' => $profit)); ?>
<?php else: ?>
    <?php echo $this->element('profit_all', array('profit' => $profit)); ?>
<?php endif; ?>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="pull-right ajax-pagination">
        <?php echo $this->Paginate->render($total, $limit, 'cms_paging_profit', $page); ?>
    </div>
</div>