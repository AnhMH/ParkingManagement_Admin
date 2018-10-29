<?php

$excelCol = array(
    array(
        'col' => 'A',
        'title' => 'ID',
        'key' => 'id'
    ),
    array(
        'col' => 'B',
        'title' => __('STT'),
        'key' => 'card_stt'
    ),
    array(
        'col' => 'C',
        'title' => __('LABEL_CARD_CODE'),
        'key' => 'card_code'
    ),
    array(
        'col' => 'D',
        'title' => __('LABEL_ORDER_CHECKIN_TIME'),
        'key' => 'checkintime'
    ),
    array(
        'col' => 'E',
        'title' => __('LABEL_ORDER_CHECKOUT_TIME'),
        'key' => 'checkouttime'
    ),
    array(
        'col' => 'F',
        'title' => __('LABEL_CAR_NUMBER'),
        'key' => 'car_number'
    ),
    array(
        'col' => 'G',
        'title' => __('LABEL_ADMIN_CHECKIN_NAME'),
        'key' => 'admin_checkin_name'
    ),
    array(
        'col' => 'H',
        'title' => __('LABEL_VEHICLE_CODE'),
        'key' => 'vehicle_code'
    ),
    array(
        'col' => 'I',
        'title' => __('LABEL_ADMIN_CHECKOUT_NAME'),
        'key' => 'admin_checkout_name'
    ),
    array(
        'col' => 'J',
        'title' => __('LABEL_VEHICLE_NAME'),
        'key' => 'vehicle_name'
    ),
    array(
        'col' => 'K',
        'title' => __('LABEL_IS_CARD_LOST'),
        'key' => 'is_card_lost'
    ),
    array(
        'col' => 'L',
        'title' => __('LABEL_ORDER_TOTAL_PRICE'),
        'key' => 'total_price'
    ),
    array(
        'col' => 'M',
        'title' => __('LABEL_PC_NAME'),
        'key' => 'pc_name'
    ),
    array(
        'col' => 'N',
        'title' => __('LABEL_ACCOUNT'),
        'key' => 'account'
    ),
    array(
        'col' => 'O',
        'title' => __('LABEL_MONTHLY_CARD'),
        'key' => 'monthly_card_code'
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
