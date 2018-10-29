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
            'id' => 'card_code',
            'label' => __('LABEL_CARD_CODE')
        ))
        ->addElement(array(
            'id' => 'car_number',
            'label' => __('LABEL_CAR_NUMBER')
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
    'disable' => 0
));

$result = Api::call(Configure::read('API.url_orders_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();

// Show data
$this->SimpleTable
        ->setDataset($data)
        ->addColumn(array(
            'id' => 'card_code',
            'title' => __('LABEL_CARD_CODE'),
            'empty' => '',
        ))
        ->addColumn(array(
            'id' => 'car_number',
            'title' => __('LABEL_CAR_NUMBER'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'notes',
            'title' => __('LABEL_NOTES'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'checkintime',
            'title' => __('LABEL_ORDER_CHECKIN_TIME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'total_price',
            'title' => __('LABEL_ORDER_TOTAL_PRICE'),
            'empty' => '0'
        ))
        ->addColumn(array(
            'id' => 'checkouttime',
            'title' => __('LABEL_ORDER_CHECKOUT_TIME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'account',
            'title' => __('LABEL_ACCOUNT'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'is_card_lost',
            'title' => __('LABEL_IS_CARD_LOST'),
            'empty' => '0'
        ))
        ->addColumn(array(
            'id' => 'pc_name',
            'title' => __('LABEL_PC_NAME'),
            'empty' => ''
        ));

$this->set('pageTitle', $pageTitle);
$this->set('total', $total);
$this->set('param', $param);
$this->set('limit', $param['limit']);
$this->set('data', $data);