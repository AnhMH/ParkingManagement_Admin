<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Login page
 */
class CustomersController extends AppController {
    /**
     * List products
     */
    public function index() {
        include ('Bus/Customers/index.php');
    }
}
