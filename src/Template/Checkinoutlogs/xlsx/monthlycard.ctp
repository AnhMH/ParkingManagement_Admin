<?php

$excelCol = array(
    array(
        'col' => 'A',
        'title' => 'ID',
        'key' => 'id'
    ),
    array(
        'col' => 'B',
        'title' => __('LABEL_CARD_CODE'),
        'key' => 'card_code'
    ),
    array(
        'col' => 'C',
        'title' => __('LABEL_COMPANY'),
        'key' => 'company'
    ),
    array(
        'col' => 'D',
        'title' => __('LABEL_CUSTOMER_NAME'),
        'key' => 'customer_name'
    ),
    array(
        'col' => 'E',
        'title' => __('LABEL_CAR_NUMBER'),
        'key' => 'car_number'
    ),
    array(
        'col' => 'F',
        'title' => __('LABEL_ORDER_CHECKIN_TIME'),
        'key' => 'checkintime'
    ),
    array(
        'col' => 'G',
        'title' => __('LABEL_ORDER_CHECKOUT_TIME'),
        'key' => 'checkouttime'
    ),
    array(
        'col' => 'H',
        'title' => __('LABEL_VEHICLE_NAME'),
        'key' => 'vehicle_name'
    ),
);

// Init
$i = 1;

// Set header
$activeSheet = $this->PhpExcel->setActiveSheetIndex(0);
foreach ($excelCol as $v) {
    $activeSheet->setCellValue($v['col'] . $i, $v['title']);
}

// Set data
if (!empty($data)) {
    foreach ($data as $val) {
        $i++;
        foreach ($excelCol as $v) {
            $activeSheet->setCellValue($v['col'] . $i, $val[$v['key']]);
        }
    }
}
