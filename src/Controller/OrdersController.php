<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Login page
 */
class OrdersController extends AppController {
    /**
     * List orders
     */
    public function index() {
        include ('Bus/Orders/index.php');
    }
    
    /**
     * Import
     */
    public function import() {
        include ('Bus/Orders/import.php');
    }
}
