<?php
use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_VEHICLE_LIST');
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
            'id' => 'name',
            'label' => __('LABEL_VEHICLE_NAME')
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

$result = Api::call(Configure::read('API.url_vehicles_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();
$vehicleType = Configure::read('Config.vehicleType'); 
$vehicleCardType = Configure::read('Config.vehicleCardType'); 
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
        ))
        ->addColumn(array(
            'id' => 'name',
            'title' => __('LABEL_VEHICLE_NAME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'code',
            'title' => __('LABEL_VEHICLE_CODE'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'monthly_cost',
            'title' => __('LABEL_MONTHLY_COST'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'type',
            'title' => __('Loại xe'),
            'empty' => '',
            'rules' => $vehicleType
        ))
        ->addColumn(array(
            'id' => 'card_type',
            'title' => __('Loại vé'),
            'empty' => '',
            'rules' => $vehicleCardType
        ))
//        ->addColumn(array(
//            'id' => 'limit',
//            'title' => __('LABEL_LIMIT2'),
//            'empty' => ''
//        ))
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
            'value' => __('LABEL_DELETE'),
            'class' => 'btn btn-danger btn-disable',
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