<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Create breadcrumb
$pageTitle = __('LABEL_PRICE_FORMULA_3');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));

$type = Configure::read('Config.settingType')['price_formula3'];
$vehicles = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_vehicles_all'), array()), 
    'id', 
    'name'
);
if (empty($vehicleId)) {
    $vehicleId = key($vehicles);
}

$detail = $this->Common->arrayKeyValue(Api::call(Configure::read('API.url_settings_detail'), array(
    'type' => $type,
    'vehicle_id' => $vehicleId
)), 'name', 'value');


$settingKeys = array(
    'night_start',
    'night_end',
    'level_1_time',
    'level_1_price',
    'level_2_time',
    'level_2_price',
    'level_3_price',
    'level_3_time',
    'night_price',
    'level_3_price_type',
    'monthly_card_time',
    'monthly_card_time_price'
);

$this->set('settingKeys', $settingKeys);
$this->set('detail', $detail);
$this->set('vehicles', $vehicles);
$this->set('vehicleId', $vehicleId);
$this->set('priceLevel3Type', Configure::read('Config.priceLevel3Type'));

if ($this->request->is('post')) {
    // Trim data
    $data = $this->request->data();
    $param = array(
        'type' => $type,
        'vehicle_id' => $vehicleId
    );
    foreach ($settingKeys as $p) {
        $param['data'][$p] = !empty($data[$p]) ? $data[$p] : '';
    }
    $param['data'] = json_encode($param['data']);
    $result = Api::call(Configure::read('API.url_settings_addupdate'), $param);
    $err = Api::getError();
    if (!empty($result) && empty($err)) {
        $this->Flash->success(__('MESSAGE_SAVE_OK'));
        return $this->redirect("{$this->BASE_URL}/{$this->controller}/{$this->action}/{$vehicleId}");
    } else {
        return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
    }
}
