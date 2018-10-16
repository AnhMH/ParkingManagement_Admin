<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$limit = Configure::read('Config.PageSize');
$param = $this->getParams(array(
    'limit' => 20,
    'page' => 1
));

// Call api
$result = Api::call(Configure::read('API.url_products_autocomplete'), $param);

echo json_encode($result);
exit();