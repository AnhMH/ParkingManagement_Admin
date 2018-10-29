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
        'key' => 'type_name'
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
        'title' => __('LABEL_DETAIL'),
        'key' => 'detail_custom'
    ),
    array(
        'col' => 'F',
        'title' => __('LABEL_PC_NAME'),
        'key' => 'pc_name'
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
