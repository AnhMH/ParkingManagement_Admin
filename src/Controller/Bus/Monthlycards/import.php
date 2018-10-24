<?php

use App\Lib\Api;
use Cake\Core\Configure;

// Create breadcrumb
$pageTitle = __('LABEL_IMPORT_CARD');
$listPageUrl = h($this->BASE_URL . '/monthlycards');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'link' => $listPageUrl,
            'name' => __('LABEL_MONTHLYCARD_LIST'),
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
                    'title' => __('LABEL_CARD_CODE'),
                    'key' => 'card_code'
                ),
                array(
                    'col' => 'B',
                    'title' => __('LABEL_CAR_NUMBER'),
                    'key' => 'car_number'
                ),
                array(
                    'col' => 'C',
                    'title' => __('LABEL_CUSTOMER_NAME'),
                    'key' => 'customer_name'
                ),
                array(
                    'col' => 'D',
                    'title' => __('CMND'),
                    'key' => 'id_number'
                ),
                array(
                    'col' => 'E',
                    'title' => __('LABEL_EMAIL'),
                    'key' => 'email'
                ),
                array(
                    'col' => 'F',
                    'title' => __('LABEL_COMPANY'),
                    'key' => 'company'
                ),
                array(
                    'col' => 'G',
                    'title' => __('LABEL_ADDRESS'),
                    'key' => 'address'
                ),
                array(
                    'col' => 'H',
                    'title' => __('LABEL_BRAND'),
                    'key' => 'brand'
                ),
                array(
                    'col' => 'I',
                    'title' => __('LABEL_PARKING_FEE'),
                    'key' => 'parking_fee'
                ),
                array(
                    'col' => 'J',
                    'title' => __('LABEL_VEHICLE_NAME'),
                    'key' => 'vehicle_name'
                ),
                array(
                    'col' => 'K',
                    'title' => __('LABEL_START_DATE'),
                    'key' => 'start_date'
                ),
                array(
                    'col' => 'L',
                    'title' => __('LABEL_END_DATE'),
                    'key' => 'end_date'
                ),
            );
            $excelData = $this->get_excel_data($data['file']['tmp_name'], $excelCol);
            $data = Api::call(Configure::read('API.url_monthlycards_import'), array(
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