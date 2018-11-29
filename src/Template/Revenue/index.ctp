<?php
$cardTotalCheckin = 0;
$cardTotalCheckout = 0;
$cardTotalPrice = 0;
$monthlyCardTotalCheckin = 0;
$monthlyCardTotalCheckout = 0;
$monthlyCardTotalPrice = 0;
?>
<?php echo $this->element('search_box'); ?>

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
                        <?php foreach ($vehicleType as $k => $val): ?>
                            <?php
                            $vehicelType = !empty($data['card'][$k]) ? $data['card'][$k] : array();
                            $totalCheckin = !empty($vehicelType['total_checkin']) ? $vehicelType['total_checkin'] : 0;
                            $totalCheckout = !empty($vehicelType['total_checkout']) ? $vehicelType['total_checkout'] : 0;
                            $totalPrice = !empty($vehicelType['total_price']) ? $vehicelType['total_price'] : 0;
                            $cardTotalCheckin += $totalCheckin;
                            $cardTotalCheckout += $totalCheckout;
                            $cardTotalPrice += $totalPrice;
                            ?>
                            <tr>
                                <td><?php echo $val;?></td>
                                <td><?php echo $totalCheckin;?></td>
                                <td><?php echo $totalCheckout;?></td>
                                <td><?php echo !empty($totalPrice) ? number_format($totalPrice) : 0;?></td>
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
                    <?php foreach ($vehicleType as $k => $val): ?>
                            <?php
                            $vehicelType = !empty($data['monthly_card'][$k]) ? $data['monthly_card'][$k] : array();
                            $totalCheckin = !empty($vehicelType['total_checkin']) ? $vehicelType['total_checkin'] : 0;
                            $totalCheckout = !empty($vehicelType['total_checkout']) ? $vehicelType['total_checkout'] : 0;
                            $totalPrice = !empty($vehicelType['total_price']) ? $vehicelType['total_price'] : 0;
                            $monthlyCardTotalCheckin += $totalCheckin;
                            $monthlyCardTotalCheckout += $totalCheckout;
                            $monthlyCardTotalPrice += $totalPrice;
                            ?>
                            <tr>
                                <td><?php echo $val;?></td>
                                <td><?php echo $totalCheckin;?></td>
                                <td><?php echo $totalCheckout;?></td>
                                <td><?php echo !empty($totalPrice) ? number_format($totalPrice) : 0;?></td>
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
