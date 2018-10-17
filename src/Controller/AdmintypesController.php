<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Admins page
 */
class AdmintypesController extends AppController {
    /**
     * Admins list
     */
    public function index() {
        include ('Bus/Admintypes/index.php');
    }
    
    /**
     * Add/update infos
     */
    public function update($id = '') {
        include ('Bus/Admintypes/update.php');
    }
}
