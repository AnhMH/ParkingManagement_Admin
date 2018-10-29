<?php
use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

$logTypeConfig = Configure::read('Config.systemLogType');
$logType = array(
    0 => __("LABEL_ALL")
);
foreach ($logTypeConfig as $k => $val) {
    $logType[$val] = __('LABEL_LOG_TYPE_'.$k);
}

// Create breadcrumb
$pageTitle = __('LABEL_SYSTEM_LOG');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));

$dataSearch = array(
    'limit' => $pageSize
);
$this->SearchForm
        ->setAttribute('type', 'get')
        ->setData($dataSearch)
        ->addElement(array(
            'id' => 'type',
            'label' => __('LABEL_SYSTEM_LOG_TYPE'),
            'options' => $logType,
        ))
        ->addElement(array(
            'id' => 'option1',
            'label' => __('LABEL_ONE_DATE'),
            'calendar' => true
        ))
        ->addElement(array(
            'id' => 'option2',
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
    'limit' => $pageSize
));

$result = Api::call(Configure::read('API.url_systemlogs_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();

// Modify data
if (!empty($data)) {
    $vehicles = $this->Common->arrayKeyValue(
        Api::call(Configure::read('API.url_vehicles_all'), array()), 
        'id', 
        'name'
    );
    $adminTypes = $this->Common->arrayKeyValue(
        Api::call(Configure::read('API.url_admintypes_all'), array()), 
        'id', 
        'name'
    );
    $priceLevel3Type = Configure::read('Config.priceLevel3Type');
    $gender = Configure::read('Config.gender');
    $dataRules = array(
        $logTypeConfig['UPDATE_PRICE_FORMULA1'] => array(
            'night_start',
            'night_end',
            'time_day_night',
            'normal_price',
            'night_price',
            'day_night_price',
            'over_minute',
            'over_minute_price',
            'monthly_card_time',
            'monthly_card_time_price'
        ),
        $logTypeConfig['UPDATE_PRICE_FORMULA2'] => array(
            'level_1_time',
            'level_1_price',
            'level_2_time',
            'level_2_price',
            'level_3_price',
            'level_3_time',
            'level_3_price_type',
            'monthly_card_time',
            'monthly_card_time_price'
        ),
        $logTypeConfig['UPDATE_PRICE_FORMULA3'] => array(
            'night_start',
            'night_end',
            'level_1_time',
            'level_1_price',
            'level_2_time',
            'level_2_price',
            'level_3_price',
            'level_3_time',
            'night_price',
            'level_3_price_type',
            'monthly_card_time',
            'monthly_card_time_price'
        ),
        $logTypeConfig['ADMIN_UPDATE'] => array(
            'name',
            'account',
            'password',
            'type',
            'gender',
        ),
        $logTypeConfig['ADMIN_CREATE'] => array(
            'name',
            'account',
            'password',
            'type',
            'gender',
        ),
        $logTypeConfig['ADMIN_TYPE_UPDATE'] => array(
            'name'
        ),
        $logTypeConfig['ADMIN_TYPE_CREATE'] => array(
            'name'
        ),
        $logTypeConfig['MONTHLYCARD_CREATE'] => array(
            'card_code',
            'car_number',
            'company',
            'customer_name',
            'id_number',
            'email',
            'address',
        ),
        $logTypeConfig['MONTHLYCARD_UPDATE'] => array(
            'card_code',
            'car_number',
            'company',
            'customer_name',
            'id_number',
            'email',
            'address'
        ),
        $logTypeConfig['CARD_CREATE'] => array(
            'code',
            'stt',
            'vehicle_id',
        ),
        $logTypeConfig['CARD_UPDATE'] => array(
            'code',
            'stt',
            'vehicle_id',
        ),
    );
    $dataRuleTitle = array(
        'night_start' => 'Tính đêm bắt đầu từ',
        'night_end' => 'đến',
        'time_day_night' => 'Khoảng giao ngày + đêm',
        'normal_price' => 'Giá thường',
        'night_price' => 'Giá đêm',
        'day_night_price' => 'Ngày + đêm',
        'over_minute' => 'Lớn hơn phút',
        'over_minute_price' => 'Phụ thu',
        'monthly_card_time' => 'Chu kỳ vé tháng',
        'monthly_card_time_price' => 'Giá vé tháng',
        'level_1_time' => 'Mốc 1',
        'level_1_price' => 'Giá mốc 1',
        'level_2_time' => 'Mốc 2',
        'level_2_price' => 'Giá mốc 2',
        'level_3_price' => 'Lớn hơn mốc 2',
        'level_3_time' => 'Chu kỳ',
        'level_3_price_type' => 'Lớn hơn mốc 2 thực hiện',
        'name' => 'Tên',
        'account' => 'Tài khoản',
        'password' => 'Mật khẩu',
        'type' => 'Chức vụ',
        'gender' => 'Giới tính',
        'card_code' => 'Mã thẻ',
        'car_number' => 'Biển số xe',
        'company' => 'Công ty',
        'customer_name' => 'Tên KH',
        'id_number' => 'CMND',
        'email' => 'Email',
        'address' => 'Địa chỉ',
        'code' => 'Mã thẻ',
        'stt' => 'STT',
        'vehicle_id' => 'Loại xe'
    );
    foreach ($data as &$val) {
        $detail = json_decode($val['detail'], true);
        $val['type_name'] = !empty($logType[$val['type']]) ? $logType[$val['type']] : '';
        $val['detail_custom'] = '';
        if (json_last_error() === JSON_ERROR_NONE) {
            if (!empty($dataRules[$val['type']])) {
                $tmp = array();
                foreach ($dataRules[$val['type']] as $v) {
                    switch ($v) {
                        case 'vehicle_id':
                            $_val = !empty($detail[$v]) && !empty($vehicles[$detail[$v]]) ? $vehicles[$detail[$v]] : '0';
                            break;
                        case 'type':
                            $_val = !empty($detail[$v]) && !empty($adminTypes[$detail[$v]]) ? $adminTypes[$detail[$v]] : '0';
                            break;
                        case 'level_3_price_type':
                            $_val = isset($detail[$v]) && isset($priceLevel3Type[$detail[$v]]) ? $priceLevel3Type[$detail[$v]] : '0';
                            break;
                        case 'gender':
                            $_val = isset($detail[$v]) && isset($gender[$detail[$v]]) ? $gender[$detail[$v]] : '0';
                            break;
                        default :
                            $_val = !empty($detail[$v]) ? $detail[$v] : '0';
                            break;
                    }
                    $_title = !empty($dataRuleTitle[$v]) ? $dataRuleTitle[$v] : $v;
                    $tmp[] = $_title .': '.$_val;
                }
                $val['detail_custom'] = implode(' - ', $tmp);
            } else {
                $val['detail_custom'] = $val['detail'];
            }
        } else {
            $val['detail_custom'] = $val['detail'];
        }
    }
}

// Show data
$this->SimpleTable
        ->setDataset($data)
        ->addColumn(array(
            'id' => 'id',
            'title' => __('ID'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'type',
            'title' => __('LABEL_SYSTEM_LOG_TYPE'),
            'empty' => '',
            'rules' => $logType
        ))
        ->addColumn(array(
            'id' => 'created',
            'title' => __('LABEL_CREATED'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'admin_name',
            'title' => __('LABEL_ADMIN_NAME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'detail_custom',
            'title' => __('LABEL_DETAIL'),
            'empty' => '',
            'width' => 500
        ))
        ->addColumn(array(
            'id' => 'pc_name',
            'title' => __('LABEL_PC_NAME'),
            'empty' => ''
        ))
        ->addButton(array(
            'type' => 'submit',
            'value' => __('LABEL_EXPORT_EXCEL'),
            'class' => 'btn btn-primary btn-export-excel',
            'data-param' => http_build_query($param)
        ));
$this->set('pageTitle', $pageTitle);
$this->set('total', $total);
$this->set('param', $param);
$this->set('limit', $param['limit']);
$this->set('data', $data);