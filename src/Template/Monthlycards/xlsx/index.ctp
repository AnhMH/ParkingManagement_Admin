<?php

$excelCol = array(
    array(
        'col' => 'A',
        'title' => 'STT',
        'key' => 'id'
    ),
    array(
        'col' => 'B',
        'title' => __('LABEL_CARD_CODE'),
        'key' => 'card_code'
    ),
    array(
        'col' => 'C',
        'title' => __('LABEL_CAR_NUMBER'),
        'key' => 'car_number'
    ),
    array(
        'col' => 'D',
        'title' => __('LABEL_CUSTOMER_NAME'),
        'key' => 'customer_name'
    ),
    array(
        'col' => 'E',
        'title' => __('CMND'),
        'key' => 'id_number'
    ),
    array(
        'col' => 'F',
        'title' => __('LABEL_EMAIL'),
        'key' => 'email'
    ),
    array(
        'col' => 'G',
        'title' => __('LABEL_COMPANY'),
        'key' => 'company'
    ),
    array(
        'col' => 'H',
        'title' => __('LABEL_ADDRESS'),
        'key' => 'address'
    ),
    array(
        'col' => 'I',
        'title' => __('LABEL_BRAND'),
        'key' => 'brand'
    ),
    array(
        'col' => 'J',
        'title' => __('LABEL_PARKING_FEE'),
        'key' => 'parking_fee'
    ),
    array(
        'col' => 'K',
        'title' => __('LABEL_VEHICLE_NAME'),
        'key' => 'vehicle_name'
    ),
    array(
        'col' => 'L',
        'title' => __('LABEL_START_DATE'),
        'key' => 'startdate'
    ),
    array(
        'col' => 'M',
        'title' => __('LABEL_END_DATE'),
        'key' => 'enddate'
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
