<?php
use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_ADMIN_LIST');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));

// Create search form
$dataSearch = array(
    'disable' => 0, 
    'limit' => $pageSize
);
$types = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_admintypes_all'), array()), 
    'id', 
    'name'
);
$this->SearchForm
        ->setAttribute('type', 'get')
        ->setData($dataSearch)
        ->addElement(array(
            'id' => 'name',
            'label' => __('LABEL_NAME')
        ))
        ->addElement(array(
            'id' => 'type',
            'label' => __('LABEL_ADMIN_TYPE'),
            'options' => $types,
            'empty' => __('LABEL_ALL')
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

$result = Api::call(Configure::read('API.url_admins_list'), $param);
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
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'name',
            'title' => __('LABEL_NAME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'account',
            'title' => __('LABEL_ACCOUNT'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'password',
            'title' => __('LABEL_PASSWORD'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'type_name',
            'title' => __('LABEL_ADMIN_TYPE'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'gender',
            'title' => __('LABEL_GENDER'),
            'rules' => Configure::read('Config.gender'),
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