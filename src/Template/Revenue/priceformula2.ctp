<div class="row">
    <div class="col-md-12">
        <div class="box box-primary box-update">   
            <div class="box-header with-border">
                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                <h3 class="box-title"></h3>
            </div>
            <div class="box-body">                
                <div class="form-body">
                    <form method="post" enctype="multipart/form-data" accept-charset="utf-8" role="form" autocomplete="off" novalidate="novalidate" action="/revenue/priceformula2/<?php echo $vehicleId; ?>">
                        <div style="display:none;">
                            <input type="hidden" name="_method" class="form-control" value="POST">
                            <input type="hidden" name="_csrfToken" class="form-control" autocomplete="off" value="<?php echo $this->request->getParam('_csrfToken'); ?>">
                        </div>
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
                        <div class="form-group form-inline">
                            <label for="level_1_time">Mốc 1:</label>
                            <input type="number" value="<?php echo !empty($detail['level_1_time']) ? $detail['level_1_time'] : ''; ?>" min="0" max="23" name="level_1_time" class="form-control"> h
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="number" value="<?php echo !empty($detail['level_1_price']) ? $detail['level_1_price'] : ''; ?>" name="level_1_price" class="form-control" step="1000">
                        </div>
                        <div class="form-group form-inline">
                            <label for="monthly_card_time">Mốc 2:</label>
                            <input type="number" value="<?php echo !empty($detail['level_2_time']) ? $detail['level_2_time'] : ''; ?>" min="0" max="23" name="level_2_time" class="form-control"> h
                            &nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="number" value="<?php echo !empty($detail['level_2_price']) ? $detail['level_2_price'] : ''; ?>" name="level_2_price" class="form-control" step="1000">
                        </div>
                        <div class="form-group form-inline">
                            <label for="normal_price">Lớn hơn mốc 2:</label>
                            <input type="number" value="<?php echo !empty($detail['level_3_price']) ? $detail['level_3_price'] : ''; ?>" name="level_3_price" class="form-control" step="1000">
                        </div>
                        <div class="form-group form-inline">
                            <label for="monthly_card_time">Chu kỳ:</label>
                            <input type="number" value="<?php echo !empty($detail['level_3_time']) ? $detail['level_3_time'] : ''; ?>" min="0" max="23" name="level_3_time" class="form-control"> h
                        </div>
                        <div class="form-group">
                            <?php foreach ($priceLevel3Type as $k => $v): ?>
                            <label class="radio-inline">
                                <input type="radio" name="level_3_price_type" value="<?php echo $k;?>" <?php echo isset($detail['level_3_price_type']) && $detail['level_3_time'] == $k ? 'checked' : ''; ?>><?php echo $v;?> 
                            </label>
                            <?php endforeach; ?>
                        </div>
                        <label>Vé tháng giới hạn giờ</label>
                        <div class="form-group form-inline">
                            <label for="monthly_card_time">Chu kỳ:</label>
                            <input type="number" value="<?php echo!empty($detail['monthly_card_time']) ? $detail['monthly_card_time'] : ''; ?>" min="0" max="23" name="monthly_card_time" class="form-control"> h
                            &nbsp;&nbsp;&nbsp;&nbsp;<label for="monthly_card_time_price">Giá</label>
                            <input type="number" value="<?php echo!empty($detail['monthly_card_time_price']) ? $detail['monthly_card_time_price'] : ''; ?>" name="monthly_card_time_price" class="form-control" step="1000">
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
