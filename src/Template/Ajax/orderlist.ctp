<?php $option = !empty($param['option1']) ? $param['option1'] : 0; ?>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Mã đơn hàng</th>
        <th class="text-center">Ngày bán</th>
        <th class="text-center" style="padding: 0px;">
            <select style="text-align:center;" id="customer-id">
                <option value="-1">Khách hàng</option>
                <?php if (!empty($customers)): ?>
                <?php foreach ($customers as $item) : ?>
                    <option <?php echo (!empty($param['customer_id']) && ($item['id'] == $param['customer_id'])) ? 'selected ' : ''; ?>
                        value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
            </select></th>
        <th class="text-center">Trạng thái</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền</th>
        <th class="text-center"><i class="fa fa-clock-o"></i> Nợ</th>
        <th></th>
        <th class="text-center">
            <label class="checkbox" style="margin: 0;">
                <input type="checkbox" class="checkbox chkAll"/>
                <span style="width: 15px; height: 15px;"></span>
            </label>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($orders)) :
        foreach ($orders as $key => $item) :
            ?>
            <tr>
                <td style="text-align: center;">
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                                                   onclick="cms_show_detail_order(<?php echo $item['id'];?>)"
                                                   class="fa fa-plus-circle i-detail-order-<?php echo $item['id']?>">
                    </i>
                    <i style="color: #478fca!important;" title="Chi tiết đơn hàng"
                       onclick="cms_show_detail_order(<?php echo $item['id'];?>)"
                       class="fa fa-minus-circle i-hide i-detail-order-<?php echo $item['id']?>">
                    </i>
                </td>
                <td class="text-center" style="color: #2a6496; cursor: pointer;" onclick="cms_detail_order(<?php echo $item['id']; ?>)"><?php echo $item['code']; ?></td>
                <td class="text-center"><?php echo !empty($item['created']) ? date('Y-m-d H:i', $item['created']) : ''; ?></td>
                <td class="text-center"><?php echo !empty($item['customer_name']) ? $item['customer_name'] : '-'; ?></td>
                <td class="text-center"><?php echo !empty($orderStatus[$item['status']]) ? $orderStatus[$item['status']] : '-'; ?></td>
                <td class="text-center" style="background-color: #F2F2F2;"><?php echo number_format($item['total_price']); ?></td>
                <td class="text-center" style="background: #fff;"><?php echo number_format($item['lack']); ?></td>
                <td class="text-center" style="background: #fff;">
<!--                    <i title="In" onclick="cms_print_order(1,<?php echo $item['id']; ?>)"
                       class="fa fa-print blue"
                       style="margin-right: 5px;"></i>-->
                    <i title="Sửa" onclick="cms_vsell_order(<?php echo $item['id']; ?>)" class="fa fa-pencil-square-o" style="margin-right: 5px;"></i>
                   
                    <i class="fa fa-trash-o" style="color: darkred;" title="<?php if ($option == 1)
                        echo 'Xóa vĩnh viễn';
                    else
                        echo 'Xóa'?>"
                       onclick="<?php if ($option == 1)
                           echo 'cms_del_order';
                       else
                           echo 'cms_del_temp_order'?>(<?php echo $item['id'] . ',' . $page; ?>)"></i>
                </td>
                <td class="text-center">
                    <label class="checkbox" style="margin: 0;">
                        <input type="checkbox" value="<?php echo $item['id']; ?>" class="checkbox chk" />
                        <span style="width: 15px; height: 15px;"></span>
                    </label>
                </td>
            </tr>
            <?php echo $this->element('tr_order_detail', array('item' => $item)); ?>
        <?php endforeach;
    else :
        echo '<tr><td colspan="9" class="text-center">Không có dữ liệu</td></tr>';
    endif;
    ?>
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">
        Tổng số hóa đơn: <span><?php echo $total; ?></span>
<!--        Tổng tiền:
        <span><?php echo $totalPrice; ?></span>
        Tổng nợ:
        <span><?php echo $totalLack; ?></span>-->
    </div>
    <div class="pull-right ajax-pagination">
        <?php echo $this->Paginate->render($total, $limit, 'cms_paging_order', $page); ?>
    </div>
</div>