<?php

use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$param = $this->request->data();
$order = array();
$error = array();
if (!empty($param['add_update'])) {
    if (!empty($param['detail_order'])) {
        $param['detail_order'] = json_encode($param['detail_order']);
    }
    // Call api
    $id = Api::call(Configure::read('API.url_orders_addupdate'), $param);
    $error = Api::getError();
    if (!empty($id) && empty($error)) {
        echo $id;
    } else {
        if (!empty($error)) {
            echo Api::parseErrorMess($error);
        } else {
            echo 'Đã có lỗi xảy ra.';
        }
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