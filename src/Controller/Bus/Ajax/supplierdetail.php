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
    $result = Api::call(Configure::read('API.url_suppliers_detail'), $param);
    if (!empty($result) && !Api::getError()) {
        $supplier = !empty($result['supplier']) ? $result['supplier'] : array();
        $this->set(compact(
                'supplier'
        ));
    } else {
        echo $errorMsg;
        exit();
    }
}