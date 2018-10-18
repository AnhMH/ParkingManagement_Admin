<?php

use App\Form\UpdateCardForm;
use App\Lib\Api;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;

// Load detail
$data = null;
if (!empty($id)) {
    // Edit
    $param['id'] = $id;
    $data = Api::call(Configure::read('API.url_cards_detail'), $param);
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

$vehicles = $this->Common->arrayKeyValue(
    Api::call(Configure::read('API.url_vehicles_all'), array()), 
    'id', 
    'name'
);

// Create breadcrumb
$listPageUrl = h($this->BASE_URL . '/cards');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'link' => $listPageUrl,
            'name' => __('LABEL_CARD_LIST'),
        ))
        ->add(array(
            'name' => $pageTitle,
        ));
// Create Update form 
$form = new UpdateCardForm();
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
        'id' => 'stt',
        'label' => __('STT'),
        'required' => true,
    ))
    ->addElement(array(
        'id' => 'code',
        'label' => __('LABEL_CARD_CODE'),
    ))
    ->addElement(array(
        'id' => 'vehicle_id',
        'label' => __('LABEL_VEHICLE_NAME'),
        'options' => $vehicles
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
        $id = Api::call(Configure::read('API.url_cards_addupdate'), $data);
        $err = Api::getError();
        if (!empty($id) && empty($err)) {
            $this->Flash->success(__('MESSAGE_SAVE_OK'));
            return $this->redirect("{$this->BASE_URL}/{$this->controller}/update/{$id}");
        } else {
            return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
        }
    }
}
