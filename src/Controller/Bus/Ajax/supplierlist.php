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
if (!empty($postParam)) {
    $param = array_merge($param, $postParam);
}

// Call api
$result = Api::call(Configure::read('API.url_suppliers_list'), $param);
$data = !empty($result['data']) ? $result['data'] : array();
$total = !empty($result['total']) ? $result['total'] : 0;

$suppliers = $data;
// Set data
$this->set(compact(
    'suppliers',
    'total',
    'limit',
    'page'
));