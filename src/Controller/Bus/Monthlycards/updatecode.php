<?php

use App\Form\UpdateMonthlyCardForm;
use App\Lib\Api;
use Cake\Core\Configure;
use Cake\Network\Exception\NotFoundException;

// Load detail
$data = null;
if (!empty($id)) {
    // Edit
    $param['id'] = $id;
    $data = Api::call(Configure::read('API.url_monthlycards_detail'), $param);
    $this->Common->handleException(Api::getError());
    if (empty($data)) {
        AppLog::info("Cate unavailable", __METHOD__, $param);
        throw new NotFoundException("Cate unavailable", __METHOD__, $param);
    }
    $pageTitle = __('LABEL_UPDATE');
} else {
    // Create new
    die('Lỗi');
}

// Create breadcrumb
$listPageUrl = h($this->BASE_URL . '/monthlycards');
$this->Breadcrumb->setTitle($pageTitle)
        ->add(array(
            'link' => $listPageUrl,
            'name' => __('LABEL_MONTHLYCARD_LIST'),
        ))
        ->add(array(
            'name' => $pageTitle,
        ));

// Create Update form 
$form = new UpdateMonthlyCardForm();
if (empty($data['start_date'])) {
    $data['start_date'] = date('Y-m-d', time());
}
if (empty($data['end_date'])) {
    $data['end_date'] = date('Y-m-d', strtotime("+1 months"));
}
$this->UpdateForm->reset()
    ->setModel($form)
    ->setData($data)
    ->setAttribute('autocomplete', 'off')
    ->addElement(array(
        'id' => 'id',
        'label' => __('ID'),
        'readonly' => true
    ))
    ->addElement(array(
        'id' => 'card_code',
        'label' => __('LABEL_CARD_CODE'),
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
        $id = Api::call(Configure::read('API.url_monthlycards_addupdate'), $data);
        $err = Api::getError();
        if (!empty($id) && empty($err)) {
            $this->Flash->success(__('MESSAGE_SAVE_OK'));
            return $this->redirect("{$this->BASE_URL}/{$this->controller}/updatecode/{$id}");
        } else {
            return $this->Flash->error(html_entity_decode(Api::parseErrorMess($err)));
        }
    }
}
