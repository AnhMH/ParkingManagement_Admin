<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$param = array();

// Call api
$data = Api::call(Configure::read('API.url_settings_gettopdata'), $param);

$this->set(compact(
    'data'
));
