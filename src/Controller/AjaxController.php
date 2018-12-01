<?php

/* 
 * Ajax process
 */

namespace App\Controller;

class AjaxController extends AppController {
    /**
     * Initialize
     */
    public function initialize() {
        parent::initialize();
       // $this->autoRender = false;
    }
    
    /**
     * Monthlycard renewal
     */
    public function monthlycardrenewal() {
        $this->autoRender = false;
        include ('Bus/Ajax/monthlycardrenewal.php');
    }
    
    /**
     * Get card detail
     */
    public function getcarddetail() {
        $this->autoRender = false;
        include ('Bus/Ajax/getcarddetail.php');
    }
}
