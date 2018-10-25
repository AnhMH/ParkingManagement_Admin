<?php

$excelCol = array(
    array(
        'col' => 'A',
        'title' => 'ID',
        'key' => 'id'
    ),
    array(
        'col' => 'B',
        'title' => __('LABEL_ADMIN_NAME'),
        'key' => 'admin_name'
    ),
    array(
        'col' => 'C',
        'title' => __('LABEL_LOGIN_TIME'),
        'key' => 'login_time'
    ),
    array(
        'col' => 'D',
        'title' => __('LABEL_LOGOUT_TIME'),
        'key' => 'logout_time'
    ),
    array(
        'col' => 'E',
        'title' => __('LABEL_PC_NAME'),
        'key' => 'pc_name'
    ),
    array(
        'col' => 'F',
        'title' => __('LABEL_HOURS'),
        'key' => 'total_hours'
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
