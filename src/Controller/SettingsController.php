<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Settings page
 */
class SettingsController extends AppController {
    
    /**
     * Settings list
     */
    public function permission($type = '') {
        include ('Bus/Settings/permission.php');
    }
    
    /**
     * Display setting
     */
    public function display() {
        include ('Bus/Settings/display.php');
    }
    
    /**
     * Order list
     */
    public function order() {
        include ('Bus/Settings/order.php');
    }
}
