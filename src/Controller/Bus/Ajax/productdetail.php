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
    $result = Api::call(Configure::read('API.url_products_detail'), $param);
    if (!empty($result) && !Api::getError()) {
        $product = !empty($result['product']) ? $result['product'] : array();
        $this->set(compact(
                'product'
        ));
    } else {
        echo $errorMsg;
        exit();
    }
}