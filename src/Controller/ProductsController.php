<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Login page
 */
class ProductsController extends AppController {
    /**
     * List products
     */
    public function index() {
        include ('Bus/Products/index.php');
    }
}
