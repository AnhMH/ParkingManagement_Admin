<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$limit = Configure::read('Config.PageSize');
$param = array(
    'limit' => $limit,
    'page' => $page
);
$postParam = $this->request->data();
if (!empty($postParam)) {
    $param = array_merge($param, $postParam);
}
if (!empty($param['cate_id'])) {
    $param['cate_id'] = implode(',', $this->getCategoriesByParentId($param['cate_id']));
}
// Call api
$result = Api::call(Configure::read('API.url_products_list'), $param);
$data = !empty($result['data']) ? $result['data'] : array();
$total = !empty($result['total']) ? $result['total'] : 0;

$products = $data;
// Set data
$this->set(compact(
    'products',
    'total',
    'limit',
    'page',
    'param'
));