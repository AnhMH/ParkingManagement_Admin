<?php

use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$param = $this->request->data();

// Call api
$id = Api::call(Configure::read('API.url_products_disable'), $param);
if (!empty($id) && !Api::getError()) {
    echo $id;
} else {
    echo 0;
}

exit();