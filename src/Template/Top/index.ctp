<?php
$totalOrder = !empty($data['order']['total_order']) ? number_format($data['order']['total_order']) : 0;
$sumTotalPrice = !empty($data['order']['sum_total_price']) ? number_format($data['order']['sum_total_price']) : 0;
$sumTotalQty = !empty($data['order']['sum_total_qty']) ? number_format($data['order']['sum_total_qty']) : 0;
$totalProduct = !empty($data['total_product']['cnt_id']) ? number_format($data['total_product']['cnt_id']) : 0;
$totalInventoryProduct = !empty($data['total_inventory']['cnt_id']) ? number_format($data['total_inventory']['cnt_id']) : 0;
$totalInventoryProductQty = !empty($data['total_inventory']['sum_qty']) ? number_format($data['total_inventory']['sum_qty']) : 0;
$totalProductNotSellPrice = !empty($data['product_not_sell_price']['cnt_id']) ? number_format($data['product_not_sell_price']['cnt_id']) : 0;
$totalProductNotOriginPrice = !empty($data['product_not_origin_price']['cnt_id']) ? number_format($data['product_not_origin_price']['cnt_id']) : 0;
$totalProductNotCate = !empty($data['product_not_cate']['cnt_id']) ? number_format($data['product_not_cate']['cnt_id']) : 0;
$totalInventoryProductEmpty = !empty($data['total_inventory2']['cnt_id']) ? number_format($data['total_inventory2']['cnt_id']) : 0;
?>

<!--<div class="row">-->
<!--    <div class="col-md-12">-->
<!--        <div class="alert alert-success text-center text-capitalize" role="alert">Chào mừng bạn đến với hệ thông quản lý bán hàng doanh nghiệp tư nhân kim khí Quang Na</div>-->
<!--    </div>-->
<!--</div>-->

<div class="row">
    <div class="report">
        <div class="col-md-12"><h4 class="dashboard-title"><i class="fa fa-signal"></i>Hoạt động hôm nay</h4></div>
        <div class="col-md-3">
            <div class="report-box box-green">
                <div class="infobox-icon">
                    <i class="fa fa-signal"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title">Tiền bán hàng</h3>
                    <span
                        class="infobox-data-number text-center"><?php echo $sumTotalPrice; ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-box box-blue">
                <div class="infobox-icon">
                    <i class="fa fa-shopping-cart"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title">Số đơn hàng:</h3>
                    <span
                        class="infobox-data-number text-center"><?php echo $totalOrder; ?></span>

                    <h3 class="infobox-title">Số sản phẩm:</h3>
                    <span
                        class="infobox-data-number text-center"><?php echo $sumTotalQty; ?></span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-box box-red">
                <div class="infobox-icon">
                    <i class="fa fa-undo"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title">Hàng khách trả</h3>
                    <span class="infobox-data-number">0</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="report-box box-orange">
                <div class="infobox-icon">
                    <i class="fa fa-cloud"></i>
                </div>
                <div class="infobox-data">
                    <h3 class="infobox-title">Đơn hàng web</h3>
                    <span class="infobox-data-number">0</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="background: #efefef; margin: 20px 0; overflow: hidden; ">
    <div class="col-md-4">
        <div class="widget widget-blue">
            <div class="widget-header">
                <h3 class="widget-title"><i class="fa fa-signal"></i>Hoạt động</h3>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="info col-xs-7">Tiền bán hàng</div>
                    <div
                        class="info col-xs-5 data text-right"><?php echo $sumTotalPrice; ?></div>
                    <div class="info col-xs-7">Số đơn hàng</div>
                    <div
                        class="info col-xs-5 data text-right"><?php echo $totalOrder; ?></div>
                    <div class="info col-xs-7">Số sản phẩm</div>
                    <div
                        class="info col-xs-5 data text-right"><?php echo $sumTotalQty; ?></div>
                    <div class="info col-xs-7">Khách hàng trả</div>
                    <div class="info col-xs-5 data text-right">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget widget-orange">
            <div class="widget-header">
                <h3 class="widget-title"><i class="fa fa-tags"></i>Thông tin kho</h3>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="info col-xs-7">Tồn kho SP/SL</div>
                    <div
                        class="info col-xs-5 data text-right"><?php echo $totalInventoryProduct.'/'.$totalInventoryProductQty; ?></div>
                    <div class="info col-xs-7">Hết Hàng</div>
                    <div
                        class="info col-xs-5 data text-right"><?php echo $totalInventoryProductEmpty; ?></div>
                    <div class="info col-xs-7">Sắp hết hàng</div>
                    <div class="info col-xs-5 data text-right">0</div>
                    <div class="info col-xs-7">Vượt định mức</div>
                    <div class="info col-xs-5 data text-right">0</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="widget widget-green">
            <div class="widget-header">
                <h3 class="widget-title"><i class="fa fa-barcode"></i>Thông tin sản phẩm</h3>
            </div>
            <div class="widget-body">
                <div class="row">
                    <div class="info col-xs-7">Sản phẩm</div>
                    <div class="info col-xs-5 data text-right"><?php echo $totalProduct; ?></div>
                    <div class="info col-xs-7">Chưa làm giá bán</div>
                    <div
                        class="info col-xs-5 data text-right"><?php echo $totalProductNotSellPrice; ?></div>
                    <div class="info col-xs-7">Chưa nhập giá mua</div>
                    <div
                        class="info col-xs-5 data text-right"><?php echo $totalProductNotOriginPrice; ?></div>
                    <div class="info col-xs-7">Hàng chưa phân loại</div>
                    <div class="info col-xs-5 data text-right"><?php echo $totalProductNotCate; ?></div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row" style="display: none; margin: 20px 0; overflow: hidden; ">
    <div class="chart-report">
        <div class="row">
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-signal"></i>Biểu đồ doanh số tuần</div>
                    <div class="panel-body">
                        Đang xây dựng - coming soon
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-cloud"></i>Thông tin từ web</div>
                    <div class="panel-body">
                        Đang xây dựng - coming soon
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading"><i class="fa fa-rss"></i>Tin chuyên ngành</div>
                    <div class="panel-body">
                        Đang xây dựng - coming soon
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>