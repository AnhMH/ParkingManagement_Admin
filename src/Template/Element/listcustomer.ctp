<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th class="text-center">Mã KH</th>
            <th class="text-center">Tên KH</th>
            <th class="text-center">Điện thoại</th>
            <th class="text-center">Địa chỉ</th>
            <th class="text-center">Lần cuối mua hàng</th>
            <th class="text-center" style="background-color: #fff;">Tổng tiền hàng</th>
            <th class="text-center">Nợ</th>
            <th></th>
        </tr>
    </thead>
    <tbody class="ajax-loadlist-customer">
        <?php
        if (!empty($customers)) :
            foreach ($customers as $key => $item) :
                ?>
                <tr id="tr-item-<?php echo $item['id']; ?>">
                    <td onclick="cms_detail_customer(<?php echo $item['id']; ?>)" class="text-center tr-detail-item"
                        style="cursor: pointer; color: #1b6aaa;"><?php echo $item['code']; ?></td>
                    <td onclick="cms_detail_customer(<?php echo $item['id']; ?>)" class="text-center tr-detail-item"
                        style="cursor: pointer; color: #1b6aaa;"><?php echo $item['name']; ?></td>
                    <td class="text-center"><?php echo (!empty($item['phone'])) ? $item['phone'] :
                        '-';
                ?></td>
                    <td class="text-center"><?php echo (!empty($item['address'])) ? $item['address'] :
                        '-';
                ?></td>
                    <td class="text-center"><?php echo (!empty($item['order_created'])) ? date('H:i d/m/Y', $item['order_created']) :
                        '-';
                ?></td>
                    <td class="text-right"
                        style="font-weight: bold; background-color: #f9f9f9;"><?php echo (!empty($item['sum_total_price'])) ? number_format($item['sum_total_price']) :
                        '-';
                ?></td>
                    <td class="text-right"><?php echo (!empty($item['total_lack'])) ? number_format($item['total_lack']) :
                        '-';
                ?></td>
                    <td class="text-center"><i class="fa fa-trash-o" style="cursor:pointer;"
                                               onclick="cms_delCustomer(<?php echo $item['id'] . ',' . $page; ?>);"></i>
                    </td>
                </tr>
                <?php
            endforeach;
        else:
            ?>
            <tr>
                <td colspan="8" class="text-center">Không có dữ liệu</td>
            </tr>
<?php endif; ?>
    </tbody>
</table>
<div class="alert alert-info summany-info clearfix" role="alert">
    <div class="ajax-loadlist-total sm-info pull-left padd-0">
        Số khách hàng:<span><?php echo $total; ?></span>
    </div>
    <div class="pull-right">
        <?php echo $this->Paginate->render($total, $limit, 'cms_paging_listcustomer', $page); ?>
    </div>
</div>

