<?php
$cardTotalCheckin = 0;
$cardTotalCheckout = 0;
$cardTotalPrice = 0;
$monthlyCardTotalCheckin = 0;
$monthlyCardTotalCheckout = 0;
$monthlyCardTotalPrice = 0;
?>
<div class="box box-primary box-search collapsed-box">
    <div class="box-header with-border">
        <h3 class="box-title"><?php echo __('LABEL_SEARCH') ?></h3>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div>
    </div>
    <div class="box-body">
        <?php echo $this->SimpleForm->render($searchForm); ?>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-result">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Loại xe</th>
                        <th>Lượt vào</th>
                        <th>Lượt ra</th>
                        <th>Tiền thu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($data['card'])): ?>
                    <?php foreach ($data['card'] as $val): ?>
                    <?php 
                    $cardTotalCheckin += $val['total_checkin'];
                    $cardTotalCheckout += $val['total_checkout'];
                    $cardTotalPrice += $val['total_price'];
                    ?>
                    <tr>
                        <td><?php echo $val['vehicle_name'];?></td>
                        <td><?php echo $val['total_checkin'];?></td>
                        <td><?php echo $val['total_checkout'];?></td>
                        <td><?php echo !empty($val['total_price']) ? number_format($val['total_price']) : 0;?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (empty($param['card_type']) || $param['card_type'] == 1): ?>
                    <tr class="info">
                        <td>__Tổng xe thường</td>
                        <td><?php echo $cardTotalCheckin; ?></td>
                        <td><?php echo $cardTotalCheckout; ?></td>
                        <td><?php echo number_format($cardTotalPrice); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if (!empty($data['monthly_card'])): ?>
                    <?php foreach ($data['monthly_card'] as $val): ?>
                    <?php 
                    $monthlyCardTotalCheckin += $val['total_checkin'];
                    $monthlyCardTotalCheckout += $val['total_checkout'];
                    $monthlyCardTotalPrice += $val['total_price'];
                    ?>
                    <tr>
                        <td><?php echo $val['vehicle_name'];?></td>
                        <td><?php echo $val['total_checkin'];?></td>
                        <td><?php echo $val['total_checkout'];?></td>
                        <td><?php echo !empty($val['total_price']) ? number_format($val['total_price']) : 0;?></td>
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                    <?php if (empty($param['card_type']) || $param['card_type'] == 2): ?>
                    <tr class="info">
                        <td>__Tổng xe tháng</td>
                        <td><?php echo $monthlyCardTotalCheckin; ?></td>
                        <td><?php echo $monthlyCardTotalCheckout; ?></td>
                        <td><?php echo number_format($monthlyCardTotalPrice); ?></td>
                    </tr>
                    <?php endif; ?>
                    <?php if (empty($param['card_type'])): ?>
                    <tr class="success">
                        <td>____Tổng cộng</td>
                        <td><?php echo $monthlyCardTotalCheckin + $cardTotalCheckin; ?></td>
                        <td><?php echo $monthlyCardTotalCheckout + $cardTotalCheckout; ?></td>
                        <td><?php echo number_format($monthlyCardTotalPrice + $cardTotalPrice); ?></td>
                    </tr>
                    <?php endif; ?>
                </tbody>
            </table>
            <div class="form-group button-group">
                <div class="form-group">
                    <input type="submit" value="Xuất file Excel" class="btn btn-primary btn-export-excel" data-param="<?php echo !empty($param) ? http_build_query($param) : '';?>">
                </div>
            </div>
        </div>
    </div>
</div>
