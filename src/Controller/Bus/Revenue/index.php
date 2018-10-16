
<?php

use App\Lib\Api;
use Cake\Core\Configure;

// Call api
$customer = Api::call(Configure::read('API.url_customers_all'), array());

$this->set(compact(
            'customer'
    ));