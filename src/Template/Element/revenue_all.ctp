<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th></th>
            <th class="text-center">Mã đơn hàng</th>
            <th class="text-center">Ngày bán</th>
            <th class="text-center">Khách hàng</th>
            <th class="text-center">Số lượng</th>
            <th class="text-center">Chiết khấu</th>
            <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
            <th class="text-center"><i class="fa fa-clock-o"></i> Nợ</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($revenue)) :
            foreach ($revenue as $key => $item): ?>
                <tr>
                    <td style="text-align: center;">
                        <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                           onclick="cms_show_detail_order(<?php echo $item['id']; ?>)"
                           class="fa fa-plus-circle i-detail-order-<?php echo $item['id'] ?>">
                        </i>
                        <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                           onclick="cms_show_detail_order(<?php echo $item['id']; ?>)"
                           class="fa fa-minus-circle i-hide i-detail-order-<?php echo $item['id'] ?>">

                        </i>
                    </td>
                    <td class="text-center"><?php echo $item['code']; ?></td>
                    <td class="text-center"><?php echo date('H:i d/m/Y', $item['created']); ?></td>
                    <td class="text-center"><?php echo !empty($item['customer_name']) ? $item['customer_name'] : '-'; ?></td>
                    <td class="text-center"><?php echo $item['total_qty']; ?></td>
                    <td class="text-center"><?php echo number_format($item['coupon']); ?></td>
                    <td class="text-center" style="background-color: #F2F2F2;"><?php echo number_format($item['total_price']); ?></td>
                    <td class="text-center" style="background: #fff;"><?php echo number_format($item['lack']); ?></td>
                </tr>
                <?php echo $this->element('tr_order_detail', array('item' => $item)); ?>
            <?php
            endforeach;
        else :
            echo '<tr><td colspan="9" class="text-center">Không có dữ liệu</td></tr>';
        endif;
        ?>
    </tbody>
</table>
