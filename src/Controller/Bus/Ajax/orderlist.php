<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$limit = Configure::read('Config.PageSize');
$param = array(
    'limit' => $limit,
    'page' => $page,
    'get_customers' => 1
);
$postParam = $this->request->data();
if (!empty($postParam)) {
    $param = array_merge($param, $postParam);
}

// Call api
$result = Api::call(Configure::read('API.url_orders_list'), $param);
$data = !empty($result['data']) ? $result['data'] : array();
$total = !empty($result['total']) ? $result['total'] : 0;
$customers = !empty($result['customers']) ? $result['customers'] : array();

$orders = $data;
$totalPrice = 0;
$totalLack = 0;
$orderStatus = Configure::read('Config.orderStatus');
//if (!empty($orders)) {
//    foreach ($orders as $val) {
//        $totalPrice += $val['total_price'];
//        $totalLack += $val['lack'];
//    }
//}
// Set data
$this->set(compact(
    'orders',
    'total',
    'limit',
    'page',
    'param',
    'customers',
    'totalPrice',
    'totalLack',
    'orderStatus'
));