<?php
use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$param = array();
$this->_cateTemp = array();

// Call api
$result = Api::call(Configure::read('API.url_cates_all'), $param);
$data = !empty($result) ? $result : array();

$this->showCategories($data);
$cates = $this->_cateTemp;
// Set data
$this->set(compact(
    'cates',
    'param'    
));