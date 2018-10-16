<div class="breadcrumbs-fixed panel-action">
    <div class="row">
        <div class="orders-act">
            <div class="col-md-4 col-md-offset-2">
                <div class="left-action text-left clearfix">
                    <h2><?php echo 'Đơn hàng';?> &raquo; <?php echo !empty($order['code']) ? $order['code'] : ''; ?></h2>
                </div>
            </div>
            <div class="col-md-6">
                <div class="right-action text-right">
                    <div class="btn-groups">
                        <?php if (empty($id)): ?>
<!--                        <button type="button" class="btn btn-primary"  onclick="cms_save_<?php echo !empty($type) ? $type : 'orders';?>(0, <?php echo !empty($id) ? $id : 0; ?>)">
                            <i class="fa fa-floppy-o"></i> Khởi tạo
                        </button>-->
                        <?php endif; ?>
                        <button type="button" class="btn btn-primary"  onclick="cms_save_<?php echo !empty($type) ? $type : 'orders';?>(<?php echo isset($order['status']) ? $order['status'] : '1'; ?>, <?php echo !empty($id) ? $id : 0; ?>)"><i
                                class="fa fa-check"></i> Lưu
                        </button>
<!--                        <button type="button" class="btn btn-primary"  onclick="cms_save_orders(2)"><i class="fa fa-print"></i> Lưu và in
                        </button>-->
                        <a href="/<?php echo !empty($type) ? $type : 'orders';?>">
                            <button type="button" class="btn-back btn btn-default"><i class="fa fa-arrow-left"></i> Quay lại
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="main-space orders-space"></div>

<div class="orders-content check-order">
    <div class="row">
        <div class="col-md-8">
            <div class="order-search" style="margin: 10px 0px; position: relative;">
                <input type="text" class="form-control" placeholder="Nhập mã sản phẩm hoặc tên sản phẩm"
                       id="search-pro-box">
            </div>
<script>
    $(function () {
        $("#search-pro-box").autocomplete({
            minLength: 1,
            source: '<?php echo $BASE_URL;?>/ajax/productautocomplete/',
            focus: function (event, ui) {
                $("#search-pro-box").val(ui.item.code);
                return false;
            },
            select: function (event, ui) {
                cms_select_product_sell(ui.item.id, '<?php echo !empty($type) && $type == 'import' ? 'import' : '0'; ?>');
                $("#search-pro-box").val('');
                return false;
            }
        }).autocomplete("instance")._renderItem = function (ul, item) {
            return $("<li>")
                .append("<div>" + item.code + " - " + item.name + " - " + item.qty + "</div>")
                .appendTo(ul);
        };
    });
</script>
            <div class="product-results">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th class="text-center">STT</th>
                        <th>Hình ảnh</th>
                        <th>Mã hàng</th>
                        <th>Tên sản phẩm</th>
                        <th class="text-center">Số lượng</th>
                        <th class="text-center">Giá bán</th>
                        <th class="text-center">Thành tiền</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="pro_search_append">
                        <?php 
                        if (!empty($order['detail'])): 
                            $products = json_decode($order['detail'], true);
                            $stt = 1;
                            foreach ($products as $p): 
                        ?>
                                <tr data-id="<?php echo $p['id']; ?>">
                                    <td class="text-center seq"><?php echo $stt++; ?></td>
                                    <td><?php echo !empty($p['image']) ? "<div class='zoomin'><img src='{$p['image']}' alt='{$p['name']}'/></div>" : "-"; ?></td>
                                    <td><?php echo $p['code']; ?></td>
                                    <td><?php echo $p['name']; ?></td>
                                    <td class="text-center" style="max-width: 30px;">
                                        <input style="max-height: 22px;" type="text" class="txtNumber form-control quantity_product_order text-center" value="<?php echo $p['qty'];?>">
                                    </td>
                                    <td class="text-center price-order"><?php echo number_format($p['price']); ?></td>
                                    <td style="display: none;"
                                        class="text-center price-order-hide"><?php echo $p['price']; ?></td>
                                    <td class="text-center total-money"><?php echo $p['price']*$p['qty']; ?></td>
                                    <td class="text-center"><i class="fa fa-trash-o del-pro-order"></i></td>
                                </tr>
                        <?php endforeach; endif; ?>
                    </tbody>
                </table>
                <div class="alert alert-success" style="margin-top: 30px;" role="alert">Gõ mã hoặc tên sản phẩm vào hộp
                    tìm kiếm để thêm hàng vào đơn hàng
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="morder-info" style="padding: 4px;">
                        <div class="tab-contents" style="padding: 8px 6px;">
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label><?php echo !empty($type) && $type == 'import' ? 'Nhà cung cấp' : 'Khách hàng'; ?></label>
                                </div>
                                <div class="col-md-8">
                                    <div class="col-md-10 padd-0" style="position: relative;">
                                        <input id="search-box-<?php echo !empty($type) && $type == 'import' ? 'mas' : 'cys'; ?>" class="form-control" type="text" placeholder="Tìm <?php echo !empty($type) && $type == 'import' ? 'nhà cung cấp' : 'khách hàng'; ?>" style="border-radius: 3px 0 0 3px !important;" 
                                            <?php echo !empty($order['customer_id']) ? "data-id='{$order['customer_id']}' value='{$order['customer_name']}'" : ""; ?>
                                               <?php echo !empty($order['supplier_id']) ? "data-id='{$order['supplier_id']}' value='{$order['supplier_name']}'" : ""; ?>
                                               />
                                        <span style="color: red; position: absolute; right: 5px; top:5px;" class="del-<?php echo !empty($type) && $type == 'import' ? 'mas' : 'cys'; ?>" ></span>
                                        <div id="<?php echo !empty($type) && $type == 'import' ? 'mas' : 'cys'; ?>-suggestion-box" style="border: 1px solid #444; display: none; overflow-y: auto;background-color: #fff; z-index: 2 !important; position: absolute; left: 0; width: 100%; padding: 5px 0px; max-height: 400px !important;">
                                            <div class="search-<?php echo !empty($type) && $type == 'import' ? 'mas' : 'cys'; ?>-inner"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-2 padd-0">
                                        <button type="button" data-toggle="modal" data-target="#create-<?php echo !empty($type) && $type == 'import' ? 'sup' : 'cust'; ?>" class="btn btn-primary" style="border-radius: 0 3px 3px 0; box-shadow: none; padding: 7px 11px;">+</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>Ngày bán</label>
                                </div>
                                <div class="col-md-8">
                                    <input id="date-order" class="form-control datepk" type="text" placeholder="Hôm nay" style="border-radius: 0 !important;" <?php echo !empty($order['created']) ? "value='".date('Y/m/d H:i', $order['created'])."'" : ""; ?>>
                                </div>
                            <script>
                                $('#date-order').datetimepicker({
                                    autoclose: true
                                });
                            </script>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div style="padding:0px" class="col-md-4">
                                    <label>Ghi chú</label>
                                </div>
                                <div class="col-md-8">
                                    <textarea id="note-order" cols="" class="form-control" rows="3" style="border-radius: 0;"><?php echo !empty($order['notes']) ? $order['notes'] : ''; ?></textarea>
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
                                <div class="col-md-4">
                                    <label>Hình thức</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="radio" class="payment-method" name="method-pay" value="1" <?php echo empty($order['payment_method']) ? 'checked' : '';?> <?php echo (!empty($order['payment_method']) && $order['payment_method'] == 1) ? 'checked' : ''; ?>>
                                        Tiền mặt &nbsp;
                                        <input type="radio" class="payment-method" name="method-pay" value="2" <?php echo (!empty($order['payment_method']) && $order['payment_method'] == 2) ? 'checked' : ''; ?>> Thẻ&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Tiền hàng</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="total-money">
                                        <?php if (!empty($type) && $type == 'import'): ?>
                                            <?php echo !empty($order['total_origin_price']) ? $order['total_origin_price'] : '0'; ?>
                                        <?php else: ?>
                                            <?php echo !empty($order['total_sell_price']) ? $order['total_sell_price'] : '0'; ?>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Giảm giá</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" class="form-control text-right txtMoney discount-order" placeholder="0" value="<?php echo !empty($order['coupon']) ? $order['coupon'] : '0';?>" style="border-radius: 0 !important;">
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label>Tổng cộng</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="total-after-discount">
                                        <?php echo !empty($order['total_price']) ? $order['total_price'] : '0'; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4 padd-right-0">
                                    <label>Thanh toán</label>
                                </div>
                                <div class="col-md-8">
                                    <input type="text" value="<?php echo !empty($order['customer_pay']) ? $order['customer_pay'] : '0'; ?>"
                                           class="form-control text-right txtMoney customer-pay"
                                           placeholder="0" style="border-radius: 0 !important;">
                                </div>
                            </div>
                            <div class="form-group marg-bot-10 clearfix">
                                <div class="col-md-4">
                                    <label class="debt">Còn nợ</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="debt"><?php echo !empty($order['lack']) ? $order['lack'] : '0'; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="btn-groups pull-right" style="margin-bottom: 50px;">
                        <?php if (empty($id)): ?>
<!--                        <button type="button" class="btn btn-primary"  onclick="cms_save_<?php echo !empty($type) ? $type : 'orders';?>(0, <?php echo !empty($id) ? $id : 0; ?>)">
                            <i class="fa fa-floppy-o"></i> Khởi tạo
                        </button>-->
                        <?php endif; ?>
                        <button type="button" class="btn btn-primary"  onclick="cms_save_<?php echo !empty($type) ? $type : 'orders';?>(<?php echo isset($order['status']) ? $order['status'] : '1'; ?>, <?php echo !empty($id) ? $id : 0; ?>)"><i
                                class="fa fa-check"></i> Lưu
                        </button>
<!--                        <button type="button" class="btn btn-primary"  onclick="cms_save_orders(2)"><i class="fa fa-print"></i> Lưu và in
                        </button>-->
                        <a href="/<?php echo !empty($type) ? $type : 'orders';?>">
                            <button type="button" class="btn-back btn btn-default"><i class="fa fa-arrow-left"></i> Quay lại
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
