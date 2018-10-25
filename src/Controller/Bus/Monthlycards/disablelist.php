<?php
use App\Lib\Api;
use Cake\Core\Configure;

$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_MONTHLYCARD_CHANGE');
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
    'disable' => 1
));

$result = Api::call(Configure::read('API.url_monthlycards_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();

// Show data
$this->SimpleTable
        ->setDataset($data)
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
            'title' => __('LABEL_UPDATE_CODE'),
            'href' => $this->BASE_URL . '/' . $this->controller . '/updatecode/{id}',
            'button' => true,
            'width' => 100,
        ));

$this->set('pageTitle', $pageTitle);
$this->set('total', $total);
$this->set('param', $param);
$this->set('limit', $param['limit']);
$this->set('data', $data);