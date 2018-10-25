<?php
use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_ADMIN_LOG');
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
    'limit' => $pageSize,
    'type' => Configure::read('Config.systemLogType')['ADMIN_LOGIN']
));

$result = Api::call(Configure::read('API.url_systemlogs_list'), $param);
$total = !empty($result['total']) ? $result['total'] : 0;
$data = !empty($result['data']) ? $result['data'] : array();

// Show data
$this->SimpleTable
        ->setDataset($data)
        ->addColumn(array(
            'id' => 'id',
            'title' => __('ID'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'admin_name',
            'title' => __('LABEL_ADMIN_NAME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'login_time',
            'title' => __('LABEL_LOGIN_TIME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'logout_time',
            'title' => __('LABEL_LOGOUT_TIME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'pc_name',
            'title' => __('LABEL_PC_NAME'),
            'empty' => ''
        ))
        ->addColumn(array(
            'id' => 'total_hours',
            'title' => __('LABEL_HOURS'),
            'empty' => ''
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