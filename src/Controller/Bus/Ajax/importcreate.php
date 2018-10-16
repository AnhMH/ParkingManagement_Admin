<?php

use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$param = $this->request->data();
$order = array();
if (!empty($param['add_update'])) {
    if (!empty($param['detail_order'])) {
        $param['detail_order'] = json_encode($param['detail_order']);
    }
    // Call api
    $id = Api::call(Configure::read('API.url_orders_addupdate'), $param);
    if (!empty($id) && !Api::getError()) {
        echo $id;
    } else {
        echo 0;
    }
    exit();
}
if (!empty($id)) {
    $result = Api::call(Configure::read('API.url_orders_detail'), array(
        'id' => $id
    ));
    $order = !empty($result['order']) ? $result['order'] : array();
}
$this->set(compact(
    'order',
    'id'
));