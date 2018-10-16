<?php

use App\Lib\Api;
use Cake\Core\Configure;

$param = $this->request->data();
$result = Api::call(Configure::read('API.url_products_detail'), $param);

$data = $result['product'];
$this->set(compact(
    'data',
    'param',
    'type'
));