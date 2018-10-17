<?php

use App\Form\UpdateAdminTypeForm;
use App\Lib\Api;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;

// Load detail
$data = null;
if (!empty($id)) {
    // Edit
    $param['id'] = $id;
    $data = Api::call(Configure::read('API.url_vehicles_detail'), $param);
    $this->Common->handleException(Api::getError());
    if (empty($data)) {
        AppLog::info("Cate unavailable", __METHOD__, $param);
        throw new NotFoundException("Cate unavailable", __METHOD__, $param);
    }

    $pageTitle = __('LABEL_UPDATE');
} else {
    // Create new
    $pageTitle = __('LABEL_ADD_NEW');
}

// Create breadcrumb
$listPageUrl = h($this->BASE_URL . '/vehicles');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'link' => $listPageUrl,
            'name' => __('LABEL_VEHICLE_LIST'),
        ))
        ->add(array(
            'name' => $pageTitle,
        ));
// Create Update form 
$form = new UpdateAdminTypeForm();
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
        'label' => __('LABEL_VEHICLE_NAME'),
        'required' => true,
    ))
    ->addElement(array(
        'id' => 'code',
        'label' => __('LABEL_VEHICLE_CODE'),
    ))
    ->addElement(array(
        'id' => 'monthly_cost',
        'label' => __('LABEL_MONTHLY_COST'),
    ))    
    ->addElement(array(
        'id' => 'limit',
        'label' => __('LABEL_LIMIT2'),
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
        $id = Api::call(Configure::read('API.url_vehicles_addupdate'), $data);
        $err = Api::getError();
        if (!empty($id) && empty($err)) {
            $this->Flash->success(__('MESSAGE_SAVE_OK'));
            return $this->redirect("{$this->BASE_URL}/{$this->controller}/update/{$id}");
        } else {
            return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
        }
    }
}
