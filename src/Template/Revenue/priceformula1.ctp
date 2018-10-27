<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-update">   
            <div class="box-header with-border">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body">                
                <div class="form-body">
                    <form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" autocomplete="off" novalidate="novalidate" action="/revenue/priceformula1/<?php echo $vehicleId;?>">
                        <div style="display:none;">
                            <input type="hidden" name="_method" class="form-control" value="POST">
                            <input type="hidden" name="_csrfToken" class="form-control" autocomplete="off" value="<?php echo $this->request->getParam('_csrfToken'); ?>">
                        </div>
                        <div class="form-group form-inline">
                            <label for="night_start">Tính đêm bắt đầu từ:</label>
                            <input type="number" min="0" max="23" name="night_start" class="form-control" value="<?php echo !empty($detail['night_start']) ? $detail['night_start'] : '';?>"> h
                            &nbsp;&nbsp;&nbsp;&nbsp;<label for="night_end">Đến:</label>
                            <input type="number" value="<?php echo !empty($detail['night_end']) ? $detail['night_end'] : '';?>" min="0" max="23" name="night_end" class="form-control"> h
                        </div>
                        <div class="form-group form-inline">
                            <label for="time_day_night">Khoảng giao ngày + đêm:</label>
                            <input type="number" value="<?php echo !empty($detail['time_day_night']) ? $detail['time_day_night'] : '';?>" min="0" max="23" name="time_day_night" class="form-control"> h
                        </div>
                        <div class="col-sm-6" style="padding-left: 0">
                            <div class="form-group form-inline">
                                <label class="" for="vehicle_id"><?php echo __('LABEL_VEHICLE_NAME'); ?>:</label>
                                <?php if (!empty($vehicles)): ?>
                                    <select name="vehicle_id" class="form-control" id="vehicleType">
                                        <?php foreach ($vehicles as $k => $v): ?>
                                            <option value="<?php echo $k; ?>" <?php echo ($k == $vehicleId) ? "selected='selected'" : ""; ?>><?php echo $v; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group form-inline">
                                <label for="normal_price" class="width-100">Giá thường:</label>
                                <input type="number" step="1000" value="<?php echo !empty($detail['normal_price']) ? $detail['normal_price'] : '';?>" name="normal_price" class="form-control">
                            </div>
                            <div class="form-group form-inline">
                                <label for="night_price" class="width-100">Giá đêm:</label>
                                <input type="number" step="1000" value="<?php echo !empty($detail['night_price']) ? $detail['night_price'] : '';?>" name="night_price" class="form-control">
                            </div>
                            <div class="form-group form-inline">
                                <label for="day_night_price" class="width-100">Ngày + đêm:</label>
                                <input type="number" step="1000" value="<?php echo !empty($detail['day_night_price']) ? $detail['day_night_price'] : '';?>" name="day_night_price" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-8 col-sm-offset-4">
                            <div class="form-group form-inline">
                                <label for="over_minute">Bé hơn:</label>
                                <input type="number" value="<?php echo !empty($detail['over_minute']) ? $detail['over_minute'] : '';?>" min="1" max="60" name="over_minute" class="form-control"> 
                                <label for="over_minute_price" class="width-100">Phút</label>
                                <input type="number" step="1000" value="<?php echo !empty($detail['over_minute_price']) ? $detail['over_minute_price'] : '';?>" name="over_minute_price" class="form-control">
                            </div>
                        </div>
                        <label>Vé tháng giới hạn giờ</label>
                        <div class="form-group form-inline">
                            <label for="monthly_card_time">Chu kỳ:</label>
                            <input type="number" value="<?php echo !empty($detail['monthly_card_time']) ? $detail['monthly_card_time'] : '';?>" min="0" max="23" name="monthly_card_time" class="form-control"> h
                            &nbsp;&nbsp;&nbsp;&nbsp;<label for="monthly_card_time_price">Giá</label>
                            <input type="number" step="1000" value="<?php echo !empty($detail['monthly_card_time_price']) ? $detail['monthly_card_time_price'] : '';?>" name="monthly_card_time_price" class="form-control">
                        </div>
                        <div class="form-group button-group">
                            <div class="form-group">
                                <input type="submit" value="Lưu" class="btn btn-primary">
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Quay lại" class="btn" onclick="return back();">
                            </div>
                            <div class="cls"></div>
                        </div>
                    </form>
                    <div class="cls"></div>
                </div>            
            </div>
        </div>
    </div>
</div>
