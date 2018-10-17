<?php
use App\Lib\Api;
use Cake\Core\Configure;

$logout = Api::call(Configure::read('API.url_admins_logout'), array());

if ($this->Auth->logout()) {
    return $this->redirect('/login');
}
