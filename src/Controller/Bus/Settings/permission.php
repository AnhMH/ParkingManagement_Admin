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

$permission = Configure::read('Config.settingPermission');

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
