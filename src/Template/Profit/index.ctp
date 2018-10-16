<div class="orders">
    <div class="breadcrumbs-fixed col-md-offset-2 panel-action padding-left-10">
        <h5 style="float: left;">
            <label style="color: #428bca;font-size: 23px;">Báo cáo lợi nhuận</label>
            <label style="color: #307ecc; padding-left: 10px;">
                <input type="radio" name="profit" value="1" checked>
                <span class="lbl">Theo đơn hàng</span>
            </label>
            <label style="color: #307ecc;">
                <input type="radio" name="profit" value="2">
                <span class="lbl">Theo khách hàng</span>
            </label>
            <label style="color: #307ecc;">
                <input type="radio" name="profit" value="3">
                <span class="lbl">Theo hàng hóa</span>
            </label>
        </h5>
    </div>
    <div class="main-space orders-space"></div>
    <div class="orders-content">
        <div class="product-sear panel-sear">
            <div class="form-group col-md-12 padd-0" style="padding-left: 5px;">
                <div class="col-md-3 padd-0">
                    <select id="search-option-1" class="form-control">
                        <option value="-1">-Khách Hàng-</option>
                        <option value="0">Không nhập</option>
                        <?php foreach ($customer as $key => $item) : ?>
                            <option
                                value="<?php echo $item['id']; ?>"><?php echo $item['name']; ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3 padd-0" style="padding-left: 5px;">
                    <div class="input-daterange input-group" id="datepicker">
                        <input type="text" class="input-sm form-control" id="search-date-from" placeholder="Từ ngày"
                               name="start"/>
                        <span class="input-group-addon">to</span>
                        <input type="text" class="input-sm form-control" id="search-date-to" placeholder="Đến ngày"
                               name="end"/>
                    </div>
                </div>
                <div class="col-md-2 padd-0">
                    <div class="btn-group order-btn-calendar">
                        <button type="button" onclick="cms_profit_all_week()" class="btn btn-default">Tuần</button>
                        <button type="button" onclick="cms_profit_all_month()" class="btn btn-default">Tháng</button>
                        <button type="button" onclick="cms_profit_all_quarter()" class="btn btn-default">Quý</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="profit-main-body">
        </div>
    </div>
</div>