<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Admins page
 */
class CompaniesController extends AppController {
    /**
     * Admins list
     */
    public function index() {
        include ('Bus/Companies/index.php');
    }
    
    /**
     * Add/update infos
     */
    public function update($id = '') {
        include ('Bus/Companies/update.php');
    }
}
