<?php

use App\Form\UpdateAdminForm;
use App\Lib\Api;
use Cake\Core\Configure;

// Create breadcrumb
$pageTitle = __('LABEL_UPDATE_PROFILE');
$this->Breadcrumb->setTitle($pageTitle)
    ->add(array(
        'name' => $pageTitle,
    ));

$id = !empty($this->AppUI['id']) ? $this->AppUI['id'] : '';
$data = Api::call(Configure::read('API.url_admins_detail'), array('id' => $id));
if (empty($data)) {
    AppLog::info("Cate unavailable", __METHOD__, $param);
    throw new NotFoundException("Cate unavailable", __METHOD__, $param);
}
$data['pass'] = $data['password'];
$types = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_admintypes_all'), array()), 
    'id', 
    'name'
);
// Create Update form 
$form = new UpdateAdminForm();
$this->UpdateForm->reset()
        ->setModel($form)
        ->setData($data)
        ->setAttribute('autocomplete', 'off')
        ->addElement(array(
            'id' => 'id',
            'type' => 'hidden',
            'label' => __('id'),
        ))
        ->addElement(array(
            'id' => 'name',
            'label' => __('LABEL_NAME'),
            'required' => true,
        ))
        ->addElement(array(
            'id' => 'account',
            'label' => __('LABEL_ACCOUNT'),
            'required' => true,
        ))
        ->addElement(array(
            'id' => 'pass',
            'label' => __('LABEL_PASSWORD'),
            'required' => true,
        ))
        ->addElement(array(
            'id' => 'type',
            'label' => __('LABEL_ADMIN_TYPE'),
            'required' => true,
            'options' => $types
        ))
        ->addElement(array(
            'id' => 'gender',
            'label' => __('LABEL_GENDER'),
            'options' => Configure::read('Config.gender')
        ))
        ->addElement(array(
            'type' => 'submit',
            'value' => __('LABEL_SAVE'),
            'class' => 'btn btn-primary',
        ))
        ->addElement(array(
            'type' => 'submit',
            'value' => __('LABEL_CANCEL'),
            'class' => 'btn',
            'onclick' => "return back();"
        ));

// Valdate and update
if ($this->request->is('post')) {
    // Trim data
    $data = $this->request->data();
    foreach ($data as $key => $value) {
        if (is_scalar($value)) {
            $data[$key] = trim($value);
        }
    }
    // Validation
    if ($form->validate($data)) {
        // Call API
        $admin = Api::call(Configure::read('API.url_admins_updateprofile'), $data);
        $err = Api::getError();
        if (!empty($admin) && empty($err)) {
            $this->Auth->setUser($admin);
            $this->AppUI = $admin;
            $this->Flash->success(__('MESSAGE_SAVE_OK'));
            return $this->redirect("{$this->BASE_URL}/{$this->controller}/update/{$id}");
        } else {
            return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
        }
    }
}