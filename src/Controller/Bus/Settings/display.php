<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Create breadcrumb
$pageTitle = __('LABEL_DISPLAY_SETTING');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));

$type = Configure::read('Config.settingType')['display'];

$detail = $this->Common->arrayKeyValue(Api::call(Configure::read('API.url_settings_detail'), array(
    'type' => $type
)), 'name', 'value');

$settingKeys = array(
    'parking_type',
    'card_lost_fee',
    'total_card',
    'total_card_car',
    'total_card_motor',
    'total_monthly_card',
    'monthly_card_limit',
    'overnight_limit',
    'monthly_card_expire_type'
);
$numberKey = array(
    'card_lost_fee',
    'total_card',
    'total_card_car',
    'total_card_motor',
    'total_monthly_card',
    'monthly_card_limit',
    'overnight_limit'
);

$data = array();
foreach ($settingKeys as $k) {
    if (in_array($k, $numberKey) && !empty($detail[$k])) {
        $detail[$k] = number_format($detail[$k]);
    }
    $data[$k] = !empty($detail[$k]) ? $detail[$k] : '';
}

$this->UpdateForm->reset()
    ->setData($data)
    ->setAttribute('autocomplete', 'off')
    ->addElement(array(
        'id' => 'parking_type',
        'label' => __('LABEL_PARKING_TYPE'),
        'options' => Configure::read('Config.parkingType')
    ))
    ->addElement(array(
        'id' => 'card_lost_fee',
        'label' => __('LABEL_CARD_LOST_FEE'),
    ))
    ->addElement(array(
        'id' => 'total_card',
        'label' => __('LABEL_TOTAL_CARD'),
    ))    
    ->addElement(array(
        'id' => 'total_card_car',
        'label' => __('Tổng sức chứa xe oto'),
    ))    
    ->addElement(array(
        'id' => 'total_card_motor',
        'label' => __('Tổng sức chứa xe máy'),
    ))    
    ->addElement(array(
        'id' => 'total_monthly_card',
        'label' => __('LABEL_TOTAL_MONTHLY_CARD'),
    ))    
    ->addElement(array(
        'id' => 'monthly_card_limit',
        'label' => __('LABEL_MONTHLY_CARD_LIMIT'),
    ))    
    ->addElement(array(
        'id' => 'overnight_limit',
        'label' => __('LABEL_OVERNIGHT_LIMIT'),
    ))    
    ->addElement(array(
        'id' => 'monthly_card_expire_type',
        'label' => __('LABEL_MONTHLY_CARD_EXPIRE_TYPE'),
        'options' => Configure::read('Config.monthlyCardExpireType')
    ))    
    ->addElement(array(
        'type' => 'submit',
        'value' => __('LABEL_SAVE'),
        'class' => 'btn btn-primary',
    ));

if ($this->request->is('post')) {
    // Trim data
    $data = $this->request->data();
    $param = array(
        'type' => $type
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
        return $this->redirect("{$this->BASE_URL}/{$this->controller}/display");
    } else {
        return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
    }
}
