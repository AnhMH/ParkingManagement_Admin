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
    $result = Api::call(Configure::read('API.url_customers_detail'), $param);
    if (!empty($result) && !Api::getError()) {
        $customer = !empty($result['customer']) ? $result['customer'] : array();
        $this->set(compact(
                'customer'
        ));
    } else {
        echo $errorMsg;
        exit();
    }
}