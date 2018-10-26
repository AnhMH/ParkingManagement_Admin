<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Create breadcrumb
$pageTitle = __('LABEL_SETTING_PERMISSION');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'name' => $pageTitle,
        ));

$adminType = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_admintypes_all'), array()), 
    'id', 
    'name'
);

if (empty($type)) {
    $type = key($adminType);
}

$detail = $this->Common->arrayKeyValue(Api::call(Configure::read('API.url_permissions_detail'), array(
    'admin_type' => $type
)), 'name', 'value');

$permission = array(
    '1' => array(
        'title' => __('LABEL_ADMIN_MANAGEMENT'),
        'detail' => array(
            'admin_list' => __('LABEL_ADMIN_LIST'),
            'admin_log' => __('LABEL_ADMIN_LOG'),
            'admin_type' => __('LABEL_ADMIN_TYPE_LIST')
        )
    ),
    '2' => array(
        'title' => __('LABEL_REVENUE_MANAGEMENT'),
        'detail' => array(
            'revenue_list' => __('LABEL_REVENUE_LIST'),
            'price_formula_1' => __('LABEL_PRICE_FORMULA_1'),
            'price_formula_2' => __('LABEL_PRICE_FORMULA_2'),
            'price_formula_3' => __('LABEL_PRICE_FORMULA_3'),
        )
    ),
    '3' => array(
        'title' => __('LABEL_CARD_VEHICLE_MANAGEMENT'),
        'detail' => array(
            'card_list' => __('LABEL_CARD_LIST'),
            'vehicle_list' => __('LABEL_VEHICLE_LIST'),
            'card_active' => __('LABEL_CARD_ACTIVE')
        )
    ),
    '4' => array(
        'title' => __('LABEL_MONTHLYCARD_MANAGEMENT'),
        'detail' => array(
            'monthly_card_log' => __('LABEL_MONTHLYCARD_VIEWLOG'),
            'monthly_card_list' => __('LABEL_MONTHLYCARD_LIST'),
            'monthly_card_renewal' => __('LABEL_MONTHLYCARD_RENEWAL'),
            'monthly_card_change' => __('LABEL_MONTHLYCARD_CHANGE'),
            'monthly_card_active' => __('LABEL_MONTHLYCARD_ACTIVE')
        )
    )
);

$this->set('adminType', $adminType);
$this->set('type', $type);
$this->set('permission', $permission);
$this->set('detail', $detail);

if ($this->request->is('post')) {
    // Trim data
    $data = $this->request->data();
    $param = array(
        'admin_type' => $type
    );
    foreach ($permission as $p) {
        foreach ($p['detail'] as $k => $v) {
            $param['data'][$k] = !empty($data[$k]) ? 1 : 0;
        }
    }
    $param['data'] = json_encode($param['data']);
    $result = Api::call(Configure::read('API.url_permissions_addupdate'), $param);
    $err = Api::getError();
    if (!empty($result) && empty($err)) {
        $this->Flash->success(__('MESSAGE_SAVE_OK'));
        return $this->redirect("{$this->BASE_URL}/{$this->controller}/permission/{$type}");
    } else {
        return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
    }
}
