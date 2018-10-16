<?php

use App\Lib\Api;
use Cake\Core\Configure;

$data = array();
$check = true;
// Valdate and login
if ($this->request->is('post')) {
    // Trim data
    $data = $this->request->data();
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
    }

    // Register
    if (!empty($data['register'])) {
        // Validation
        if (empty($data['register_email'])) {
            $check = false;
        }
        if (empty($data['register_name'])) {
            $check = false;
        }
        if (empty($data['register_password'])) {
            $check = false;
        }
        if ($check) {
            $user = Api::call(Configure::read('API.url_admins_register'), $data);
            $error = Api::getError();
            if (!empty($error)) {
                $this->Flash->error("Email {$data['register_email']} đã được đăng ký.");
            } else {
                // Auth
                unset($user['password']);

                $user['is_admin'] = !empty($user['admin_type']) ? 1 : 0;
                $user['display_name'] = !empty($user['name']) ? $user['name'] : $user['login_id'];
                if (empty($user['avatar'])) {
                    $user['avatar'] = $this->BASE_URL . '/img/' . Configure::read('default_avatar');
                }
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
        } else {
            $this->Flash->error('Đăng ký không thành công.');
        }
    } else {
        // Validation
        if (empty($data['email'])) {
            $this->Flash->error(__('MESSAGE_EMAIL_EMPTY'));
            $check = false;
        }
        if (empty($data['password'])) {
            $this->Flash->error(__('MESSAGE_PASSWORD_EMPTY'));
            $check = false;
        }

        // Call API to Login
        if ($check) {
            $user = Api::call(Configure::read('API.url_admins_login'), $data);
            if (Api::getError() || empty($user)) {
                $this->Flash->error(__('MESSAGE_LOGIN_FAIL'));
            } else {
                // Auth
                unset($user['password']);

                $user['is_admin'] = !empty($user['admin_type']) ? 1 : 0;
                $user['display_name'] = !empty($user['name']) ? $user['name'] : $user['login_id'];
                if (empty($user['avatar'])) {
                    $user['avatar'] = $this->BASE_URL . '/img/' . Configure::read('default_avatar');
                }
                $this->Auth->setUser($user);

                // Did they select the remember me checkbox?
                if (!empty($data['remembera'])) {
                    $data['admin_password'] = $data['password'];
                    unset($data['password']);
                    $this->Cookie->write($rememberAdminCookie, $data, true, '2 weeks');
                }
                return $this->redirect($this->Auth->redirectUrl());
            }
        }
    }
}

$this->set('data', $data);
