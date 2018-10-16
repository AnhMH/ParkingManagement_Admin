<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$limit = Configure::read('Config.PageSize');
$param = array(
    'limit' => $limit,
    'page' => $page,
    'get_order_import' => 1,
    'get_suppliers' => 1
);
$postParam = $this->request->data();
if (!empty($postParam)) {
    $param = array_merge($param, $postParam);
}

// Call api
$result = Api::call(Configure::read('API.url_orders_list'), $param);
$data = !empty($result['data']) ? $result['data'] : array();
$total = !empty($result['total']) ? $result['total'] : 0;
$suppliers = !empty($result['suppliers']) ? $result['suppliers'] : array();

$orders = $data;
$totalPrice = 0;
$totalLack = 0;
$orderStatus = Configure::read('Config.orderStatus');

// Set data
$this->set(compact(
    'orders',
    'total',
    'limit',
    'page',
    'param',
    'suppliers',
    'totalPrice',
    'totalLack',
    'orderStatus'
));