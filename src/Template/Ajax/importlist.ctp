<?php $option = !empty($param['option1']) ? $param['option1'] : 0; ?>
<table class="table table-bordered table-striped">
    <thead>
    <tr>
        <th></th>
        <th class="text-center">Mã phiếu nhập</th>
        <th class="text-center">Ngày nhập</th>
        <th class="text-center" style="padding: 0px;">
            <select style="text-align:center;" id="supplier-id">
                <option value="0">Nhà cung cấp</option>
                <?php if (!empty($suppliers)): ?>
                <?php foreach ($suppliers as $item) : ?>
                    <option <?php echo (!empty($param['supplier_id']) && ($item['id'] == $param['supplier_id'])) ? 'selected ' : ''; ?>
                        value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                <?php endforeach; ?>
                <?php endif; ?>
            </select></th>
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
                    <i style="color: #478fca!important;" title="Chi tiết phiếu nhập"
                                                   onclick="cms_show_detail_order(<?php echo $item['id'];?>)"
                                                   class="fa fa-plus-circle i-detail-order-<?php echo $item['id']?>">
                    </i>
                    <i style="color: #478fca!important;" title="Chi tiết phiếu nhập"
                       onclick="cms_show_detail_order(<?php echo $item['id'];?>)"
                       class="fa fa-minus-circle i-hide i-detail-order-<?php echo $item['id']?>">
                    </i>
                </td>
                <td class="text-center" style="color: #2a6496; cursor: pointer;" onclick="cms_edit_import(<?php echo $item['id']; ?>)"><?php echo $item['code']; ?></td>
                <td class="text-center"><?php echo !empty($item['created']) ? date('Y-m-d H:i', $item['created']) : ''; ?></td>
                <td class="text-center"><?php echo !empty($item['supplier_name']) ? $item['supplier_name'] : '-'; ?></td>
                <td class="text-center" style="background-color: #F2F2F2;"><?php echo $item['total_price']; ?></td>
                <td class="text-center" style="background: #fff;"><?php echo $item['lack']; ?></td>
                <td class="text-center" style="background: #fff;">
<!--                    <i title="In" onclick="cms_print_order(1,<?php echo $item['id']; ?>)"
                       class="fa fa-print blue"
                       style="margin-right: 5px;"></i>-->
                    <i title="Sửa" onclick="cms_vsell_import(<?php echo $item['id']; ?>)" class="fa fa-pencil-square-o" style="margin-right: 5px;"></i>
                   
                    <i class="fa fa-trash-o" style="color: darkred;" title="<?php if ($option == 1)
                        echo 'Xóa vĩnh viễn';
                    else
                        echo 'Xóa'?>"
                       onclick="<?php if ($option == 1)
                           echo 'cms_del_import';
                       else
                           echo 'cms_del_temp_import'?>(<?php echo $item['id'] . ',' . $page; ?>)"></i>
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
        Tổng số phiếu nhập: <span><?php echo $total; ?></span>
<!--        Tổng tiền:
        <span><?php echo $totalPrice; ?></span>
        Tổng nợ:
        <span><?php echo $totalLack; ?></span>-->
    </div>
    <div class="pull-right ajax-pagination">
        <?php echo $this->Paginate->render($total, $limit, 'cms_paging_input', $page); ?>
    </div>
</div>