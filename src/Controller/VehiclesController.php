<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Admins page
 */
class VehiclesController extends AppController {
    /**
     * Admins list
     */
    public function index() {
        include ('Bus/Vehicles/index.php');
    }
    
    /**
     * Add/update infos
     */
    public function update($id = '') {
        include ('Bus/Vehicles/update.php');
    }
}
