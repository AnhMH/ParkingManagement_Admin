<?php

use App\Form\UpdateAdminForm;
use App\Lib\Api;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;

// Load detail
$data = null;
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
$types = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_admintypes_all'), array()), 
    'id', 
    'name'
);

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
        $id = Api::call(Configure::read('API.url_admins_addupdate'), $data);
        $err = Api::getError();
        if (!empty($id) && empty($err)) {
            $this->Flash->success(__('MESSAGE_SAVE_OK'));
            return $this->redirect("{$this->BASE_URL}/{$this->controller}/update/{$id}");
        } else {
            return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
        }
    }
}
