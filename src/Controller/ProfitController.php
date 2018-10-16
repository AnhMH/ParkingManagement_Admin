<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Profit page
 */
class ProfitController extends AppController {
    
    /**
     * Profit page
     */
    public function index() {
        include ('Bus/Profit/index.php');
    }
}
