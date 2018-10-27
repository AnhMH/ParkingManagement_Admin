<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Revenue page
 */
class RevenueController extends AppController {
    
    /**
     * Revenue list
     */
    public function index() {
        include ('Bus/Revenue/index.php');
    }
    
    /**
     * Revenue formula1
     */
    public function priceformula1($vehicleId = '') {
        include ('Bus/Revenue/priceformula1.php');
    }
    
    /**
     * Revenue formula2
     */
    public function priceformula2() {
        include ('Bus/Revenue/priceformula2.php');
    }
    
    /**
     * Revenue formula3
     */
    public function priceformula3() {
        include ('Bus/Revenue/priceformula3.php');
    }
}
