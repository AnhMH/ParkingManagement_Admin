<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Admins page
 */
class ProjectsController extends AppController {
    /**
     * Admins list
     */
    public function index() {
        include ('Bus/Projects/index.php');
    }
    
    /**
     * Add/update infos
     */
    public function update($id = '') {
        include ('Bus/Projects/update.php');
    }
}
