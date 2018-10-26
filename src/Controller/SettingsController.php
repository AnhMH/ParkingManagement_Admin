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
}
