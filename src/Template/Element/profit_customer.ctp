<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Tên khách hàng</th>
        <th class="text-center">Tổng số đơn</th>
        <th class="text-center">Tổng SP</th>
        <th class="text-center">Tổng chiếc khấu</th>
        <th class="text-center">Doanh số</th>
        <th class="text-center">Tiền vốn</th>
        <th class="text-center">Lợi nhuận</th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($profit)) :
        foreach ($profit as $key => $item) :
            ?>
            <tr>
                <td style="text-align: center;">
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                                                   onclick="cms_show_list_order(<?php echo $item['customer_id'];?>)"
                                                   class="fa fa-plus-circle i-list-order-<?php echo $item['customer_id']?>">

                    </i>
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                       onclick="cms_show_list_order(<?php echo $item['customer_id'];?>)"
                       class="fa fa-minus-circle i-hide i-list-order-<?php echo $item['customer_id']?>">
                    </i>
                </td>
                <td class="text-center"><?php echo !empty($item['name']) ? $item['name'] : '-'; ?></td>
                <td class="text-center"><?php echo count($item['orders']); ?></td>
                <td class="text-center"><?php echo $item['total_qty']; ?></td>
                <td class="text-center"><?php echo number_format($item['total_discount']); ?></td>
                <td class="text-center"><?php echo number_format($item['total_price']); ?></td>
                <td class="text-center"><?php echo number_format($item['total_origin_price']); ?></td>
                <td class="text-center"><?php echo number_format($item['total_price']-$item['total_origin_price']); ?></td>
            </tr>
            <tr class="tr-hide" id="tr-list-order-<?php echo $item['customer_id']?>">
                <td colspan="15">
                    <div class="tabbable">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a data-toggle="tab">
                                    <i class="green icon-reorder bigger-110"></i>
                                    Danh sách đơn hàng
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active">
                                <table class="table table-striped table-bordered table-hover dataTable">
                                    <thead>
                                    <tr role="row">
                                        <th class="text-center">STT</th>
                                        <th class="text-left">Mã đơn hàng</th>
                                        <th class="text-center">Ngày bán</th>
                                        <th class="text-center ">Số lượng</th>
                                        <th class="text-center ">Chiết khấu</th>
                                        <th class="text-center ">Doanh số</th>
                                        <th class="text-center ">Tiền vốn</th>
                                        <th class="text-center ">Lợi nhuận</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $queue= 1;
                                    foreach ($item['orders'] as $order) {
                                        ?>
                                        <tr>
                                            <td class="text-center width-5 hidden-320 "><?php echo $queue++; ?></td>
                                            <td class="text-center"><?php echo $order['code']; ?></td>
                                            <td class="text-center"><?php echo date('H:i d/m/Y', $order['created']); ?></td>
                                            <td class="text-center"><?php echo $order['total_qty']; ?></td>
                                            <td class="text-center"><?php echo number_format($order['coupon']); ?></td>
                                            <td class="text-center"
                                                style="background-color: #F2F2F2;"><?php echo number_format($order['total_price']); ?></td>
                                            <td class="text-center"
                                                style="background: #fff;"><?php echo number_format($order['total_origin_price']); ?></td>
                                            <td class="text-center"
                                                style="background: #fff;"><?php echo number_format($order['total_price']-$order['total_origin_price']); ?></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>
        <?php endforeach;
    else :
        echo '<tr><td colspan="11" class="text-center">Không có dữ liệu</td></tr>';
    endif;
    ?>
    </tbody>
</table>
