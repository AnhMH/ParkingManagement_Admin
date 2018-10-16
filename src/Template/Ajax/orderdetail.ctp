<div class="breadcrumbs-fixed panel-action">
    <div class="row">
        <div class="orders-act">
            <div class="col-md-4 col-md-offset-2">
                <div class="left-action text-left clearfix">
                    <h2>Đơn hàng &raquo;<span
                            style="font-style: italic; font-weight: 400; font-size: 16px;"><?php echo $order['code']; ?></span>
                    </h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-action text-right">
                    <div class="btn-groups">
                            <button type="button" class="btn btn-primary" onclick="cms_vsell_order();"><i
                                    class="fa fa-plus"></i> Tạo đơn hàng mới
                            </button>
                            <button type="button" class="btn btn-primary"
                                    onclick="cms_vsell_order(<?php echo $order['id']; ?>)"><i
                                    class="fa fa-pencil-square-o"></i> Sửa
                            </button>
                            <button type="button" class="btn btn-default"
                                    onclick="cms_javascript_redirect( cms_javascrip_fullURL() )"><i
                                    class="fa fa-arrow-left"></i> Quay lại
                            </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="main-space orders-space"></div>
<div class="orders-content">
    <div class="row">
        <div class="col-md-8">
            <table class="table table-bordered table-striped" style="margin-top: 30px;">
                <thead>
                <tr>
                    <th class="text-center">STT</th>
                    <th>Hình ảnh</th>
                    <th>Mã hàng</th>
                    <th>Tên sản phẩm</th>
                    <th class="text-center">Số lượng</th>
                    <th class="text-center">Giá bán</th>
                    <th class="text-center">Thành tiền</th>
                </tr>
                </thead>
                <tbody>
                <?php if (!empty($order['detail'])) :
                    $_list_products = json_decode($order['detail'], true);
                    $nstt = 1;
                    foreach ($_list_products as $product) :
                        ?>
                        <tr data-id="<?php echo $product['id']; ?>">
                            <td class="text-center"><?php echo $nstt++; ?></td>
                            <td class="zoomin"><?php echo !empty($product['image']) ? "<img src='{$product['image']}' alt='{$product['name']}' />" : ""; ?></td>
                            <td><?php echo $product['code']; ?></td>
                            <td><?php echo $product['name']; ?></td>
                            <td class="text-center" style="max-width: 30px;"><?php echo $product['qty']; ?> </td>
                            <td class="text-center price-order"><?php echo $product['price']; ?></td>
                            <td class="text-center total-money"><?php echo $product['price'] * $product['qty']; ?></td>
                        </tr>
                    <?php endforeach; endif; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Mã phiếu</label>
                                </div>
                                <div class="col-md-7">
                                    <?php echo !empty($order['code']) ? $order['code'] : '-'; ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Khách hàng</label>
                                </div>
                                <div class="col-md-7" style="font-style: italic;">
                                    <?php echo !empty($order['customer_name']) ? $order['customer_name'] : '-'; ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Ngày bán</label>
                                </div>
                                <div class="col-md-7">
                                    <?php echo !empty($order['created']) ? date('Y-m-d H:i', $order['created']) : '-'; ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Ghi chú</label>
                                </div>
                                <div class="col-md-7">
                                    <textarea readonly id="note-order" cols="" class="form-control" rows="3"
                                              style="border-radius: 0;"><?php echo !empty($order['notes']) ? $order['notes'] : ''; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <h4 class="lighter" style="margin-top: 0;">
                        <i class="fa fa-info-circle blue"></i>
                        Thông tin thanh toán
                    </h4>

                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Hình thức</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="input-group">
                                        <input disabled type="radio" class="payment-method" name="method-pay"
                                               value="1" <?php echo (!empty($order['payment_method']) && $order['payment_method'] == 1) ? 'checked' : ''; ?>>
                                        Tiền mặt &nbsp;
                                        <input disabled type="radio" class="payment-method" name="method-pay"
                                               value="2" <?php echo (!empty($order['payment_method']) && $order['payment_method'] == 2) ? 'checked' : ''; ?>>
                                        CK&nbsp;
                                    </div>

                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Tiền hàng</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="">
                                        <?php echo !empty($order['total_sell_price']) ? $order['total_sell_price'] : 0; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Giảm giá</label>
                                </div>
                                <div class="col-md-7">
                                    <div><?php echo !empty($order['coupon']) ? $order['coupon'] : 0; ?></div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Tổng cộng</label>
                                </div>
                                <div class="col-md-7">
                                    <div class="">
                                        <?php echo !empty($order['total_price']) ? $order['total_price'] : 0; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5 padd-right-0">
                                    <label>Khách đưa</label>
                                </div>
                                <div class="col-md-7 orange">
                                    <?php echo !empty($order['customer_pay']) ? $order['customer_pay'] : 0; ?>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-5">
                                    <label>Còn nợ</label>
                                </div>
                                <div class="col-md-7">
                                    <div
                                        class=""><?php echo !empty($order['lack']) ? $order['lack'] : 0; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>