<?php
use App\Lib\Api;
use Cake\Core\Configure;

$page = 1;
$limit = Configure::read('Config.PageSize');
$param = array(
    'page' => $page,
    'limit' => $limit,
    'get_order_data' => 1
);
$result = Api::call(Configure::read('API.url_customers_list'), $param);
$data = !empty($result['data']) ? $result['data'] : array();
$total = !empty($result['total']) ? $result['total'] : 0;

$customers = $data;
$this->set(compact(
    'customers',
    'total',
    'limit',
    'page'
));
