<?php
use App\Lib\Api;
use Cake\Core\Configure;

$errorMsg = 'ID không tồn tại.';
if (empty($id)) {
    echo $errorMsg;
    exit();
} else {
    $param = array(
        'id' => $id
    );
    $result = Api::call(Configure::read('API.url_orders_detail'), $param);
    if (!empty($result) && !Api::getError()) {
        $order = !empty($result['order']) ? $result['order'] : array();
        $this->set(compact(
                'order'
        ));
    } else {
        echo $errorMsg;
        exit();
    }
}