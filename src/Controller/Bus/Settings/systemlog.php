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
            'empty' => ''
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
            'id' => 'detail',
            'title' => __('LABEL_DETAIL'),
            'empty' => ''
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