<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Admins page
 */
class CardsController extends AppController {
    /**
     * Admins list
     */
    public function index() {
        include ('Bus/Cards/index.php');
    }
    
    /**
     * Add/update infos
     */
    public function update($id = '') {
        include ('Bus/Cards/update.php');
    }
}
