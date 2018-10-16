
<?php

use App\Lib\Api;
use Cake\Core\Configure;

$this->_cateTemp = array();

// Call api
$result = Api::call(Configure::read('API.url_cates_all'), array());
$this->showCategories($result);
$cates = $this->_cateTemp;
$this->set(compact(
            'cates'
    ));