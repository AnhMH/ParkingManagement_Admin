<?php

use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_CARD_LIST');
$this->Breadcrumb->setTitle($pageTitle)
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
            'id' => 'stt',
            'label' => __('STT')
        ))
        ->addElement(array(
            'id' => 'vehicle_id',
            'label' => __('LABEL_VEHICLE_NAME'),
            'options' => $vehicles,
            'empty' => 'Chọn loại xe'
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

$result = Api::call(Configure::read('API.url_cards_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();

// Show data
$this->SimpleTable
        ->setDataset($data)
//        ->addColumn(array(
//            'id' => 'item',
//            'name' => 'items[]',
//            'type' => 'checkbox',
//            'value' => '{id}',
//            'width' => 20,
//        ))
        ->addColumn(array(
            'id' => 'id',
            'title' => __('ID'),
            'type' => 'link',
            'href' => $this->BASE_URL . '/' . $this->controller . '/update/{id}',
            'empty' => '',
            'width' => 50
        ))
        ->addColumn(array(
            'id' => 'code',
            'title' => __('LABEL_CARD_CODE'),
            'type' => 'link',
            'href' => $this->BASE_URL . '/' . $this->controller . '/update/{id}',
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'stt',
            'title' => __('STT'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'vehicle_id',
            'title' => __('LABEL_VEHICLE_NAME'),
            'rules' => $vehicles,
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
            'value' => __('LABEL_ADD_NEW'),
            'class' => 'btn btn-success btn-addnew',
        ))
        ->addButton(array(
            'type' => 'submit',
            'value' => __('LABEL_IMPORT_CARD'),
            'class' => 'btn btn-primary btn-import-excel',
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
$showSearchBox = false;
if (count($param) > 2) {
    $showSearchBox = true;
}
$this->set('showSearchBox', $showSearchBox);
