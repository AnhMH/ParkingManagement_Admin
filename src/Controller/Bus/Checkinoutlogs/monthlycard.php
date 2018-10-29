<?php
use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_MONTHLY_CARD_LOG');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));

// Create search form
$dataSearch = array(
    'disable' => 0, 
    'limit' => $pageSize
);
$this->SearchForm
        ->setAttribute('type', 'get')
        ->setData($dataSearch)
        ->addElement(array(
            'id' => 'customer_name',
            'label' => __('LABEL_CUSTOMER_NAME')
        ))
        ->addElement(array(
            'id' => 'company',
            'label' => __('LABEL_COMPANY')
        ))
        ->addElement(array(
            'id' => 'created',
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
    'disable' => 0,
    'card_type' => 'monthly'
));

$result = Api::call(Configure::read('API.url_orders_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();

// Show data
$this->SimpleTable
        ->setDataset($data)
        ->addColumn(array(
            'id' => 'id',
            'title' => __('ID'),
            'empty' => '',
        ))
        ->addColumn(array(
            'id' => 'card_code',
            'title' => __('LABEL_CARD_CODE'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'company',
            'title' => __('LABEL_COMPANY'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'customer_name',
            'title' => __('LABEL_CUSTOMER_NAME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'car_number',
            'title' => __('LABEL_CAR_NUMBER'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'checkintime',
            'title' => __('LABEL_ORDER_CHECKIN_TIME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'checkouttime',
            'title' => __('LABEL_ORDER_CHECKOUT_TIME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'vehicle_name',
            'title' => __('LABEL_VEHICLE_NAME'),
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