<?php
use App\Lib\Api;
use Cake\Core\Configure;

$data = $this->request->data();
foreach ($data as $key => $value) {
    if (is_scalar($value)) {
        $data[$key] = trim($value);
    }
}
// Call API
$result = Api::call(Configure::read('API.url_monthlycards_renewal'), $data);
$err = Api::getError();
if (!empty($err)) {
    echo html_entity_decode(Api::parseErrorMess($err));
} else {
    $this->Flash->success(__('MESSAGE_SAVE_OK'));
    echo 'OK';
}
