<?php
use App\Lib\Api;
use Cake\Core\Configure;

$param = $this->request->data();
$result = array();
foreach ($param as $key => $value) {
    if (is_scalar($value)) {
        $param[$key] = trim($value);
    }
}
// Call API
$data = Api::call(Configure::read('API.url_monthlycards_getcarddetail'), $param);
$err = Api::getError();
if (!empty($err)) {
    $result = array(
        'status' => 'ERROR',
        'data' => html_entity_decode(Api::parseErrorMess($err))
    );
} else {
    $result = array(
        'status' => 'OK',
        'data' => $data
    );
}
echo json_encode($result);
die();
