<?php

use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_MONTHLYCARD_RENEWAL');
$listPageUrl = h($this->BASE_URL . '/monthlycards');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'link' => $listPageUrl,
            'name' => __('LABEL_MONTHLYCARD_LIST'),
        ))
        ->add(array(
            'name' => $pageTitle,
        ));

// Create search form
$vehicles = $this->Common->arrayKeyValue(
        Api::call(Configure::read('API.url_vehicles_all'), array()), 'id', 'name'
);
$dataSearch = array(
    'disable' => 0,
    'limit' => $pageSize
);
$this->SearchForm
        ->setAttribute('type', 'get')
        ->setData($dataSearch)
        ->addElement(array(
            'id' => 'code',
            'label' => __('LABEL_CARD_CODE')
        ))
        ->addElement(array(
            'id' => 'vehicle_id',
            'label' => __('LABEL_VEHICLE_NAME'),
            'options' => $vehicles,
            'empty' => 'Chọn loại xe'
        ))
        ->addElement(array(
            'id' => 'is_expired',
            'label' => __('Hết hạn'),
            'options' => array(
                '1' => 'Hết hạn',
                '2' => 'Còn hạn'
            ),
            'empty' => __('LABEL_ALL')
        ))
        ->addElement(array(
            'id' => 'expire_day',
            'label' => __('Số ngày sắp hết hạn')
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

$result = Api::call(Configure::read('API.url_monthlycards_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();

// Show data
$this->SimpleTable
        ->setDataset($data)
        ->addColumn(array(
            'id' => 'item',
            'name' => 'items[]',
            'type' => 'checkbox',
            'value' => '{id}',
            'width' => 20,
        ))
        ->addColumn(array(
            'id' => 'id',
            'title' => __('ID'),
            'type' => 'link',
            'href' => $this->BASE_URL . '/' . $this->controller . '/update/{id}',
            'empty' => '',
            'width' => 50
        ))
        ->addColumn(array(
            'id' => 'card_code',
            'title' => __('LABEL_CARD_CODE'),
            'type' => 'link',
            'href' => $this->BASE_URL . '/' . $this->controller . '/update/{id}',
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'total_date',
            'title' => __('LABEL_TOTAL_DATE'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'car_number',
            'title' => __('LABEL_CAR_NUMBER'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'customer_name',
            'title' => __('LABEL_CUSTOMER_NAME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'id_number',
            'title' => __('CMND'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'email',
            'title' => __('LABEL_EMAIL'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'vehicle_id',
            'title' => __('LABEL_VEHICLE_NAME'),
            'rules' => $vehicles,
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'startdate',
            'title' => __('LABEL_START_DATE'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'enddate',
            'title' => __('LABEL_END_DATE'),
            'empty' => ''
        ))
        ->addColumn(array(
            'type' => 'link',
            'title' => __('LABEL_EDIT'),
            'href' => $this->BASE_URL . '/' . $this->controller . '/update/{id}',
            'button' => true,
            'width' => 100,
        ))
        ->addButton(array(
            'type' => 'submit',
            'value' => __('LABEL_RENEWAL_BY_DATE_SELECTED'),
            'class' => 'btn btn-success btn-renewal',
            'data-type' => 'date-selected'
        ))
        ->addButton(array(
            'type' => 'submit',
            'value' => __('LABEL_RENEWAL_BY_DAYS'),
            'class' => 'btn btn-primary btn-renewal',
            'data-type' => 'days'
        ))
        ->addButton(array(
            'type' => 'submit',
            'value' => __('LABEL_EXPORT_CARD'),
            'class' => 'btn btn-info btn-export-excel',
            'data-param' => http_build_query($param),
        ));

$this->set('pageTitle', $pageTitle);
$this->set('total', $total);
$this->set('param', $param);
$this->set('limit', $param['limit']);
$this->set('data', $data);
