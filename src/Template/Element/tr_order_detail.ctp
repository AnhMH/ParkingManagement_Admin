<tr class="tr-hide" id="tr-detail-order-<?php echo $item['id'] ?>">
    <td colspan="15">
        <div class="tabbable">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab">
                        <i class="green icon-reorder bigger-110"></i>
                        Chi tiết đơn hàng
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active">
                    <div class="alert alert-success clearfix" style="display: flex;">
                        <div>
                            <i class="fa fa-cart-arrow-down">
                            </i>
                            <span
                                class="hidden-768">Số lượng SP:
                            </span>
                            <label><?php echo $item['total_qty']; ?>
                            </label>
                        </div>
                        <div class="padding-left-10">
                            <i class="fa fa-dollar">
                            </i>
                            <span
                                class="hidden-768">Tiền hàng:
                            </span>
                            <label><?php echo $item['total_sell_price']; ?>
                            </label>
                        </div>
                        <div class="padding-left-10">
                            <i class="fa fa-dollar">
                            </i>
                            <span
                                class="hidden-768">Giảm giá:
                            </span>
                            <label><?php echo $item['coupon']; ?>
                            </label>
                        </div>
                        <div class="padding-left-10">
                            <i class="fa fa-dollar">
                            </i>
                            <span
                                class="hidden-768">Tổng tiền:
                            </span>
                            <label><?php echo $item['total_price']; ?>
                            </label>
                        </div>
                        <div class="padding-left-10">
                            <i class="fa fa-clock-o"></i>
                            <span class="hidden-768">Còn nợ: </span>
                            <label
                                ><?php echo $item['lack']; ?>
                            </label>
                        </div>
                    </div>
                    <table class="table table-striped table-bordered table-hover dataTable">
                        <thead>
                            <tr role="row">
                                <th class="text-center">STT</th>
                                <th class="text-left">Hình</th>
                                <th class="text-left hidden-768">Mã sản phẩm</th>
                                <th class="text-left">Tên sản phẩm</th>
                                <th class="text-center">Số lượng</th>
                                <th class="text-center">Giá bán</th>
                                <th class="text-center ">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $list_products = json_decode($item['detail'], true);
                            if (!empty($list_products)):
                                $queue = 1;
                                foreach ($list_products as $product):
                                    ?>
                                    <tr>
                                        <td class="text-center width-5 hidden-320 ">
                                            <?php echo $queue++; ?>
                                        </td>
                                        <td class="text-left zoomin">
                                            <?php echo!empty($product['image']) ? "<img src='{$product['image']}' alt='{$product['name']}' />" : ""; ?>
                                        </td>
                                        <td class="text-left hidden-768">
                                            <?php echo $product['code']; ?>
                                        </td>
                                        <td class="text-left ">
                                            <?php echo $product['name']; ?>
                                        </td>
                                        <td class="text-center ">
                                            <?php echo $product['qty']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $product['price']; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php echo $product['price'] * $product['qty']; ?>
                                        </td>
                                    </tr>
                                <?php endforeach;
                            endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </td>
</tr>
