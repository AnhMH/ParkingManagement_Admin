<?php
use App\Lib\Api;
use Cake\Core\Configure;

$this->doGeneralAction();
$pageSize = Configure::read('Config.PageSize');

// Create breadcrumb
$pageTitle = __('LABEL_REVENUE_LIST');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));

$admins = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_admins_all'), array()), 
    'id', 
    'name'
);

$this->SearchForm
        ->setAttribute('type', 'get')
        ->addElement(array(
            'id' => 'admin',
            'label' => __('Nhân viên'),
            'options' => $admins,
            'empty' => __('LABEL_ALL')
        ))
        ->addElement(array(
            'id' => 'card_type',
            'label' => __('Loại thẻ'),
            'options' => array(
                '1' => 'Vãng lai',
                '2' => 'Vé tháng'
            ),
            'empty' => __('LABEL_ALL')
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
            'type' => 'submit',
            'value' => __('LABEL_SEARCH'),
            'class' => 'btn btn-primary',
        ));

$param = $this->getParams();

$data = Api::call(Configure::read('API.url_orders_revenue'), $param);

$this->set('data', $data);
$this->set('param', $param);