<?php

$excelCol = array(
    array(
        'col' => 'A',
        'title' => 'STT',
        'key' => 'stt'
    ),
    array(
        'col' => 'B',
        'title' => __('LABEL_CARD_CODE'),
        'key' => 'code'
    ),
    array(
        'col' => 'C',
        'title' => __('LABEL_VEHICLE_NAME'),
        'key' => 'vehicle_name'
    )
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
