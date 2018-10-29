<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Checkinoutlogs page
 */
class CheckinoutlogsController extends AppController {
    
    /**
     * Checkinoutlogs list
     */
    public function card() {
        include ('Bus/Checkinoutlogs/card.php');
    }
    
    /**
     * Display setting
     */
    public function monthlycard() {
        include ('Bus/Checkinoutlogs/monthlycard.php');
    }
}
