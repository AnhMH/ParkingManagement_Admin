<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Revenue page
 */
class RevenueController extends AppController {
    
    /**
     * Revenue page
     */
    public function index() {
        include ('Bus/Revenue/index.php');
    }
}
