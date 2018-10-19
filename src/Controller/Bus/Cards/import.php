<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Create breadcrumb
$pageTitle = __('LABEL_IMPORT_CARD');
$listPageUrl = h($this->BASE_URL . '/cards');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'link' => $listPageUrl,
            'name' => __('LABEL_CARD_LIST'),
        ))
        ->add(array(
            'name' => $pageTitle,
        ));

if ($this->request->is('post')) {
    // Trim data
    $data = $this->request->data();
    foreach ($data as $key => $value) {
        if (is_scalar($value)) {
            $data[$key] = trim($value);
        }
    }
    
    if (is_uploaded_file($data['file']['tmp_name'])) {
        // Check file type
        $mimes = array('application/octet-stream');
        if (!in_array($data['file']['type'], $mimes)) {
            $this->Flash->error(__('MESSAGE_ERROR_EXCEL_FORMAT'));
        } else {
            $excelData = array();
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
            $objReader = \PHPExcel_IOFactory::createReader('Excel2007');
            $objPHPExcel = $objReader->load($data['file']['tmp_name']);
            $worksheetInfo = $objReader->listWorksheetInfo($data['file']['tmp_name']);
            $activeSheet = $objPHPExcel->getActiveSheet();
            $totalColumns = !empty($worksheetInfo[0]['totalColumns']) ? $worksheetInfo[0]['totalColumns'] : '';
            $totalRows = !empty($worksheetInfo[0]['totalRows']) ? $worksheetInfo[0]['totalRows'] : '';
            if (!empty($totalColumns) && !empty($totalRows) && $totalRows > 1) {
                for ($i = 1; $i <= $totalRows; $i++) {
                    if ($i == 1) {
                        continue;
                    }
                    $tmp = array();
                    foreach ($excelCol as $col) {
                        $tmp[$col['key']] = $activeSheet->getCell($col['col'].$i)->getValue();
                    }
                    $excelData[] = $tmp;
                }
            }            
            $data = Api::call(Configure::read('API.url_cards_import'), array(
                'data' => json_encode($excelData)
            ));
            if (empty($data) || Api::getError() || !$data) {
                $this->Flash->error(__('MESSAGE_SYSTEM_ERROR'));
            } else {
                $this->Flash->success(__('MESSAGE_UPDATE_SUCCESSFULLY'));
                $this->set('data', $data);
            }
        }
    } else {
        $this->Flash->error(__('MESSAGE_IMPORT_FILE'));
    }
}