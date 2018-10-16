<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Check remember userName and password
$rememberAdminCookie = 'remember_admin_cookie';
$loginCookie = array();
if (empty($this->AppUI->id) && !empty($this->Cookie->read($rememberAdminCookie))) {
    $loginCookie = $this->Cookie->read($rememberAdminCookie);
}

// Valdate and login
if ($this->request->is('post')) {
    // Trim data
    $data = $this->request->data();
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
    }
    
    // Call API to Login
    $user = Api::call(Configure::read('API.url_admins_login'), $data);
    if (Api::getError() || empty($user)) {
        $this->Flash->error(__('MESSAGE_LOGIN_FAIL'));
    } else {
        // Auth
        unset($user['password']);
        $user['display_name'] = !empty($user['name']) ? $user['name'] : $user['login_id'];
        $this->Auth->setUser($user);
        
        // Did they select the remember me checkbox?
        if (!empty($data['remembera'])) {
            $this->Cookie->write($rememberAdminCookie, $data);
        }
        return $this->redirect($this->Auth->redirectUrl());
    }
}

// Set data for view
$this->set('data', $loginCookie);
