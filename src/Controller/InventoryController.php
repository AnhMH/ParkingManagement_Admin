<?php

namespace App\Controller;

use Cake\Event\Event;

/**
 * Inventory page
 */
class InventoryController extends AppController {
    
    /**
     * Inventory page
     */
    public function index() {
        include ('Bus/Inventory/index.php');
    }
}
