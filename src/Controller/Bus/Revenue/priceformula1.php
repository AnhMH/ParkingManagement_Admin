<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Create breadcrumb
$pageTitle = __('LABEL_PRICE_FORMULA_1');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));

$type = Configure::read('Config.settingType')['price_formula1'];
$vehicles = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_vehicles_all'), array(
        'card_type' => 1
    )), 
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
    'time_day_night',
    'normal_price',
    'night_price',
    'day_night_price',
    'over_minute',
    'over_minute_price',
    'monthly_card_time',
    'monthly_card_time_price'
);
$numberKey = array(
    'normal_price',
    'night_price',
    'day_night_price',
    'over_minute_price',
    'monthly_card_time_price'
);

$this->set('settingKeys', $settingKeys);
$this->set('detail', $detail);
$this->set('vehicles', $vehicles);
$this->set('vehicleId', $vehicleId);

if ($this->request->is('post')) {
    // Trim data
    $data = $this->request->data();
    $param = array(
        'type' => $type,
        'vehicle_id' => $vehicleId
    );
    foreach ($settingKeys as $p) {
        if (in_array($p, $numberKey) && !empty($data[$p])) {
            $data[$p] = preg_replace('[,]', '', $data[$p]);
        }
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
