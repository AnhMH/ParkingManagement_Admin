<?php
use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_MONTHLYCARD_VIEWLOG');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));
$logTypeConfig = Configure::read('Config.systemLogType');
$logTypeConfigKey = array(
    'MONTHLYCARD_CREATE',
    'MONTHLYCARD_UPDATE',
    'MONTHLYCARD_DELETE',
    'MONTHLYCARD_IMPORT',
    'MONTHLYCARD_EXPORT'
);
$logType = array();
foreach ($logTypeConfigKey as $val) {
    $logType[$logTypeConfig[$val]] = __('LABEL_LOG_TYPE_'.$val);
}
$vehicles = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_vehicles_all'), array()), 
    'id', 
    'name'
);
$dataSearch = array(
    'limit' => $pageSize
);
$this->SearchForm
        ->setAttribute('type', 'get')
        ->setData($dataSearch)
        ->addElement(array(
            'id' => 'type',
            'label' => __('LABEL_SYSTEM_LOG_TYPE'),
            'options' => array(implode(',', array_keys($logType)) => __('LABEL_ALL')) + $logType
        ))
        ->addElement(array(
            'id' => 'vehicle_id',
            'label' => __('LABEL_VEHICLE_NAME'),
            'options' => $vehicles,
            'empty' => __('LABEL_ALL')
        ))
        ->addElement(array(
            'id' => 'log_create',
            'label' => __('LABEL_MANY_DATE'),
            'type' => 'calendar_from_to'
        ))
        ->addElement(array(
            'id' => 'limit',
            'label' => __('LABEL_LIMIT'),
            'options' => Configure::read('Config.searchPageSize'),
        ))
        ->addElement(array(
            'type' => 'submit',
            'value' => __('LABEL_SEARCH'),
            'class' => 'btn btn-primary',
        ));

$param = $this->getParams(array(
    'limit' => $pageSize,
    'type' => implode(',', array_keys($logType))
));

$result = Api::call(Configure::read('API.url_systemlogs_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();

// Custom data
$listData = array();
if (!empty($data)) {
    foreach ($data as $v) {
        $detail = json_decode($v['detail'], true);
        $tmp = array(
            'id' => $v['id'],
            'type' => $v['type'],
            'created' => !empty($v['created']) ? date('Y-m-d H:i', $v['created']) : '-',
            'admin_name' => $v['admin_name'],
            'monthlycard_id' => !empty($detail['id']) ? $detail['id'] : '',
            'card_code' => !empty($detail['card_code']) ? $detail['card_code'] : '',
            'car_number' => !empty($detail['car_number']) ? $detail['car_number'] : '',
            'start_date' => !empty($detail['start_date']) ? date('Y-m-d H:i', $detail['start_date']) : '',
            'end_date' => !empty($detail['end_date']) ? date('Y-m-d H:i', $detail['end_date']) : '',
            'customer_name' => !empty($detail['customer_name']) ? $detail['customer_name'] : '',
            'id_number' => !empty($detail['id_number']) ? $detail['id_number'] : '',
            'email' => !empty($detail['email']) ? $detail['email'] : '',
            'address' => !empty($detail['address']) ? $detail['address'] : '',
            'brand' => !empty($detail['brand']) ? $detail['brand'] : '',
            'vehicle_id' => !empty($v['vehicle_id']) ? $v['vehicle_id'] : '',
        );
        $listData[] = $tmp;
    }
}

// Show data
$this->SimpleTable
        ->setDataset($listData)
        ->addColumn(array(
            'id' => 'id',
            'title' => __('ID'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'type',
            'title' => __('LABEL_SYSTEM_LOG_TYPE'),
            'rules' => $logType,
            'empty' => '',
            'width' => 200
        ))
        ->addColumn(array(
            'id' => 'created',
            'title' => __('LABEL_CREATED'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'admin_name',
            'title' => __('LABEL_ADMIN_NAME'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'monthlycard_id',
            'title' => __('LABEL_MONTHLYCARD_ID'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'card_code',
            'title' => __('LABEL_CARD_CODE'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'car_number',
            'title' => __('LABEL_CAR_NUMBER'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'start_date',
            'title' => __('LABEL_START_DATE'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'end_date',
            'title' => __('LABEL_END_DATE'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'customer_name',
            'title' => __('LABEL_CUSTOMER_NAME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'id_number',
            'title' => __('CMND'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'email',
            'title' => __('LABEL_EMAIL'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'address',
            'title' => __('LABEL_ADDRESS'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'brand',
            'title' => __('LABEL_BRAND'),
            'empty' => '',
            'width' => 100
        ))
        ->addColumn(array(
            'id' => 'vehicle_id',
            'title' => __('LABEL_VEHICLE_NAME'),
            'rules' => $vehicles,
            'empty' => '',
            'width' => 100
        ))
        ->addButton(array(
            'type' => 'submit',
            'value' => __('LABEL_EXPORT_EXCEL'),
            'class' => 'btn btn-primary btn-export-excel',
        ));
$this->set('pageTitle', $pageTitle);
$this->set('total', $total);
$this->set('param', $param);
$this->set('limit', $param['limit']);
$this->set('data', $data);