<?php
// Init
$i = 1;
$cardTotalCheckin = 0;
$cardTotalCheckout = 0;
$cardTotalPrice = 0;
$monthlyCardTotalCheckin = 0;
$monthlyCardTotalCheckout = 0;
$monthlyCardTotalPrice = 0;

// Set header
$activeSheet = $this->PhpExcel->setActiveSheetIndex(0);
$activeSheet->setCellValue('A' . $i, 'Loại xe');
$activeSheet->setCellValue('B' . $i, 'Lượt vào');
$activeSheet->setCellValue('C' . $i, 'Lượt ra');
$activeSheet->setCellValue('D' . $i, 'Tiền thu');

if (!empty($data['card'])) {
    foreach ($data['card'] as $val) {
        $i++;
        $cardTotalCheckin += $val['total_checkin'];
        $cardTotalCheckout += $val['total_checkout'];
        $cardTotalPrice += $val['total_price'];
        $activeSheet->setCellValue('A' . $i, $val['vehicle_name']);
        $activeSheet->setCellValue('B' . $i, $val['total_checkin']);
        $activeSheet->setCellValue('C' . $i, $val['total_checkout']);
        $activeSheet->setCellValue('D' . $i, $val['total_price']);
    }
}
if (empty($param['card_type']) || $param['card_type'] == 1) {
    $i++;
    $activeSheet->setCellValue('A' . $i, '__Tổng xe thường');
    $activeSheet->setCellValue('B' . $i, $cardTotalCheckin);
    $activeSheet->setCellValue('C' . $i, $cardTotalCheckout);
    $activeSheet->setCellValue('D' . $i, $cardTotalPrice);
}
if (!empty($data['monthly_card'])) {
    foreach ($data['monthly_card'] as $val) {
        $i++;
        $monthlyCardTotalCheckin += $val['total_checkin'];
        $monthlyCardTotalCheckout += $val['total_checkout'];
        $monthlyCardTotalPrice += $val['total_price'];
        $activeSheet->setCellValue('A' . $i, $val['vehicle_name']);
        $activeSheet->setCellValue('B' . $i, $val['total_checkin']);
        $activeSheet->setCellValue('C' . $i, $val['total_checkout']);
        $activeSheet->setCellValue('D' . $i, $val['total_price']);
    }
}
if (empty($param['card_type']) || $param['card_type'] == 1) {
    $i++;
    $activeSheet->setCellValue('A' . $i, '__Tổng xe tháng');
    $activeSheet->setCellValue('B' . $i, $monthlyCardTotalCheckin);
    $activeSheet->setCellValue('C' . $i, $monthlyCardTotalCheckout);
    $activeSheet->setCellValue('D' . $i, $monthlyCardTotalPrice);
}
if (empty($param['card_type'])) {
    $i++;
    $activeSheet->setCellValue('A' . $i, '____Tổng cộng');
    $activeSheet->setCellValue('B' . $i, $monthlyCardTotalCheckin + $cardTotalCheckin);
    $activeSheet->setCellValue('C' . $i, $monthlyCardTotalCheckout + $cardTotalCheckout);
    $activeSheet->setCellValue('D' . $i, $monthlyCardTotalPrice + $cardTotalPrice);
}

