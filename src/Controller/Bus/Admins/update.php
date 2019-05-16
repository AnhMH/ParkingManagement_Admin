<?php

use App\Form\UpdateAdminForm;
use App\Lib\Api;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;

// Load detail
$data = array();
if (!empty($id)) {
    // Edit
    $param['id'] = $id;
    $data = Api::call(Configure::read('API.url_admins_detail'), $param);
    $this->Common->handleException(Api::getError());
    if (empty($data)) {
        AppLog::info("Cate unavailable", __METHOD__, $param);
        throw new NotFoundException("Cate unavailable", __METHOD__, $param);
    }
    $data['pass'] = $data['password'];
    $pageTitle = __('LABEL_UPDATE');
} else {
    // Create new
    $pageTitle = __('LABEL_ADD_NEW');
}
$options = Api::call(Configure::read('API.url_admins_getoptions'), array());
$types = $this->Common->arrayKeyValue(
    !empty($options['admin_type']) ? $options['admin_type'] : array(), 
    'id', 
    'name'
);
$companies = !empty($options['companies']) ? $options['companies'] : array();
$projects = !empty($options['projects']) ? $options['projects'] : array();
foreach ($companies as &$c) {
    foreach ($projects as $k => $p) {
        if ($p['company_id'] == $c['id']) {
            $c['projects'][] = $p;
            unset($projects[$k]);
        }
    }
}
$genders = Configure::read('Config.gender');

// Create breadcrumb
$listPageUrl = h($this->BASE_URL . '/admins');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'link' => $listPageUrl,
            'name' => __('LABEL_ADMIN_LIST'),
        ))
        ->add(array(
            'name' => $pageTitle,
        ));
$dataCompanies = array();
$dataProjects = array();
if (!empty($data['projects'])) {
    foreach ($data['projects'] as $v) {
        $dataCompanies[$v['company_id']][] = $v;
        $dataProjects[$v['project_id']] = $v;
    }
}

$this->set(compact(array(
    'data',
    'types',
    'companies',
    'genders',
    'dataCompanies',
    'dataProjects'
)));

// Valdate and update
if ($this->request->is('post')) {
    // Trim data
    $param = $this->request->data();
    foreach ($param as $key => $value) {
        if (is_scalar($value)) {
            $param[$key] = trim($value);
        }
    }
    // Validation
    if (empty($param['name'])) {
        return $this->Flash->error(__('MESSAGE_REQUIRED_NAME'));
    }
    if (empty($param['project'])) {
        return $this->Flash->error(__('Vui lòng chọn công ty và dự án'));
    } else {
        $projects = array();
        foreach ($param['project'] as $k => $v) {
            foreach ($v as $kp => $p) {
                $projects[$kp] = $k;
            }
        }
        if ($param['type'] == '-2' && count($projects) > 1) {
            return $this->Flash->error(__('Nhân viên chỉ được phép chọn 1 công ty và 1 dự án'));
        }
        $param['projects'] = json_encode($projects);
    }
    
    // Call API
    $id = Api::call(Configure::read('API.url_admins_addupdate'), $param);
    $err = Api::getError();
    if (!empty($id) && empty($err)) {
        $this->Flash->success(__('MESSAGE_SAVE_OK'));
        return $this->redirect("{$this->BASE_URL}/{$this->controller}/update/{$id}");
    } else {
        return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
    }
}
