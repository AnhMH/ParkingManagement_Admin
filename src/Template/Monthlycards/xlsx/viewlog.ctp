<?php

$excelCol = array(
    array(
        'col' => 'A',
        'title' => 'ID',
        'key' => 'id'
    ),
    array(
        'col' => 'B',
        'title' => __('LABEL_SYSTEM_LOG_TYPE'),
        'key' => 'type'
    ),
    array(
        'col' => 'C',
        'title' => __('LABEL_CREATED'),
        'key' => 'created'
    ),
    array(
        'col' => 'D',
        'title' => __('LABEL_ADMIN_NAME'),
        'key' => 'admin_name'
    ),
    array(
        'col' => 'E',
        'title' => __('LABEL_MONTHLYCARD_ID'),
        'key' => 'monthlycard_id'
    ),
    array(
        'col' => 'F',
        'title' => __('LABEL_CARD_CODE'),
        'key' => 'card_code'
    ),
    array(
        'col' => 'G',
        'title' => __('LABEL_CAR_NUMBER'),
        'key' => 'car_number'
    ),
    array(
        'col' => 'H',
        'title' => __('LABEL_START_DATE'),
        'key' => 'start_date'
    ),
    array(
        'col' => 'I',
        'title' => __('LABEL_END_DATE'),
        'key' => 'end_date'
    ),
    array(
        'col' => 'J',
        'title' => __('LABEL_CUSTOMER_NAME'),
        'key' => 'customer_name'
    ),
    array(
        'col' => 'K',
        'title' => __('CMND'),
        'key' => 'id_number'
    ),
    array(
        'col' => 'L',
        'title' => __('LABEL_EMAIL'),
        'key' => 'email'
    ),
    array(
        'col' => 'M',
        'title' => __('LABEL_ADDRESS'),
        'key' => 'address'
    ),
    array(
        'col' => 'N',
        'title' => __('LABEL_BRAND'),
        'key' => 'brand'
    ),
    array(
        'col' => 'Os',
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
