<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$limit = Configure::read('Config.PageSize');
$param = array(
    'limit' => $limit,
    'page' => $page,
    'get_order_data' => 1
);
$postParam = $this->request->data();
if (!empty($postParam['data'])) {
    $param = array_merge($param, $postParam['data']);
}

// Call api
$result = Api::call(Configure::read('API.url_customers_list'), $param);
$data = !empty($result['data']) ? $result['data'] : array();
$total = !empty($result['total']) ? $result['total'] : 0;

$customers = $data;
// Set data
$this->set(compact(
    'customers',
    'total',
    'limit',
    'page'
));