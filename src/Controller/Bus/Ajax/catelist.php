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

// Call api
$result = Api::call(Configure::read('API.url_cates_list'), $param);
$data = !empty($result['data']) ? $result['data'] : array();
$total = !empty($result['total']) ? $result['total'] : 0;

$cates = $data;
// Set data
$this->set(compact(
    'cates',
    'total',
    'limit',
    'page'
));