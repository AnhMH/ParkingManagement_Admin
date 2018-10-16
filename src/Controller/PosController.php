<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Login page
 */
class PosController extends AppController {
    /**
     * List orders
     */
    public function index() {
        include ('Bus/Pos/index.php');
    }
}
