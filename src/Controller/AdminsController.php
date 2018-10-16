<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Admins page
 */
class AdminsController extends AppController {
    /**
     * Admins page
     */
    public function updateprofile() {
        include ('Bus/Admins/updateprofile.php');
    }
    
    /**
     * Admins list
     */
    public function index() {
        include ('Bus/Admins/index.php');
    }
    
    /**
     * Admins log
     */
    public function viewlog() {
        include ('Bus/Admins/viewlog.php');
    }
}
