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
    $data = $this->request->getData();
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
        if (empty($user['avatar'])) {
            $user['avatar'] = $this->BASE_URL . '/img/' . Configure::read('default_avatar');
        }
        $this->Auth->setUser($user);
        if (!empty($user['projects'])) {
            foreach ($user['projects'] as $val) {
                if (!empty($val['data'])) {
                    $this->request->getSession()->write(COOKIE_COMPANY_ID, $val['id']);
                    $this->request->getSession()->write(COOKIE_PROJECT_ID, $val['data'][0]['project_id']);
                    break;
                }
            }
        }
        
        // Did they select the remember me checkbox?
        if (!empty($data['remembera'])) {
            $this->Cookie->write($rememberAdminCookie, $data);
        }
        return $this->redirect($this->Auth->redirectUrl());
    }
}

// Set data for view
$this->set('data', $loginCookie);
