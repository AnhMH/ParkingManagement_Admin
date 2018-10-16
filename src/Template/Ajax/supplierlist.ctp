<table class="table table-bordered">
    <thead>
    <tr>
        <th class="text-center">Mã NCC</th>
        <th class="text-center">Tên NCC</th>
        <th class="text-center">Điện thoại</th>
        <th class="text-center">Địa chỉ</th>
        <th class="text-center">Lần cuối nhập hàng</th>
        <th class="text-center" style="background-color: #fff;">Tổng tiền hàng</th>
        <th class="text-center">Nợ</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php if (!empty($suppliers)) :
        foreach ($suppliers as $key => $item) : ?>
            <tr>
                <td class="text-center" onclick="cms_detail_supplier(<?php echo $item['id']; ?>)"
                    style="cursor: pointer; color: #1b6aaa;"><?php echo $item['code']; ?></td>
                <td class="text-center" onclick="cms_detail_supplier(<?php echo $item['id']; ?>)"
                    style="cursor: pointer; color: #1b6aaa;"><?php echo $item['name']; ?></td>
                <td class="text-center"><?php echo (!empty($item['phone'])) ?
                        $item['phone'] : '-'; ?></td>
                <td class="text-left"><?php echo (!empty($item['address'])) ? $item['address'] :
                        ''; ?></td>
                <td class="text-center"><?php echo (!empty($item['order_created'])) ? date('H:i d/m/Y', $item['order_created']) :
                        '-'; ?></td>
                <td class="text-right"
                    style="font-weight: bold; background-color: #f9f9f9;"><?php echo (!empty($item['sum_total_price'])) ? number_format($item['sum_total_price']) :
                        '0'; ?>
                </td>
                <td class="text-right"><?php echo (!empty($item['total_lack'])) ? number_format($item['total_lack']) :
                        '0'; ?></td>
                <td class="text-center"><i class="fa fa-trash-o" style="cursor:pointer;"
                                           onclick="cms_delsup(<?php echo $item['id'].','.$page; ?>);"></i></td>
            </tr>
        <?php endforeach;
    else : ?>
        <tr>
            <td colspan="8" class="text-center">Không có dữ liệu</td>
        </tr>
    <?php endif; ?>
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="sm-info pull-left padd-0">
        Số NCC:<span><?php echo $total; ?></span>
        Tổng tiền: <span><?php echo (isset($_total_supplier['total_money']) && !empty($_total_supplier['total_money'])) ? number_format($_total_supplier['total_money']) : '0'; ?> đ</span>
        Tổng nợ: <span><?php echo (isset($_total_supplier['total_debt']) && !empty($_total_supplier['total_debt'])) ? number_format($_total_supplier['total_debt']) : '0'; ?> đ</span>
    </div>
    <div class="pull-right ajax-pagination">
        <?php echo $this->Paginate->render($total, $limit, 'cms_paging_supplier', $page); ?>
    </div>
</div>