<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$limit = Configure::read('Config.PageSize');
$param = $this->getParams(array(
    'limit' => 20,
    'page' => 1
));
$postParam = $this->request->data();
if (!empty($postParam)) {
    $param = array_merge($param, $postParam);
}

// Call api
$result = Api::call(Configure::read('API.url_suppliers_autocomplete'), $param);

$suppliers = $result;
// Set data
$this->set(compact(
    'suppliers'
));