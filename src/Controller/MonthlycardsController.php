<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Admins page
 */
class MonthlycardsController extends AppController {
    /**
     * Admins list
     */
    public function index() {
        include ('Bus/Monthlycards/index.php');
    }
    
    /**
     * Add/update infos
     */
    public function update($id = '') {
        include ('Bus/Monthlycards/update.php');
    }
    
    /**
     * Active
     */
    public function active() {
        include ('Bus/Monthlycards/active.php');
    }
    
    /**
     * Import
     */
    public function import() {
        include ('Bus/Monthlycards/import.php');
    }
    
    /**
     * Renewal
     */
    public function renewal() {
        include ('Bus/Monthlycards/renewal.php');
    }
    
    /**
     * Change code
     */
    public function disablelist() {
        include ('Bus/Monthlycards/disablelist.php');
    }
    
    /**
     * Update code
     */
    public function updatecode($id = '') {
        include ('Bus/Monthlycards/updatecode.php');
    }
}
