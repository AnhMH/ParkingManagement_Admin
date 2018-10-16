<?php

namespace App\Controller;
use Cake\Event\Event;

/**
 * Admins page
 */
class AdminsController extends AppController {
    
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Breadcrumb');
        $this->loadComponent('SimpleForm');
        $this->loadComponent('SearchForm');
        $this->loadComponent('UpdateForm');
        $this->loadComponent('SimpleTable');
    }
    
    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event) {
        parent::beforeRender($event);
        // Breadcrumb
        if (!empty($this->Breadcrumb->get())) {
            $this->set('breadcrumbTitle', $this->Breadcrumb->getTitle());
            $this->set('breadcrumb', $this->Breadcrumb->get());
        }
        
        // Form / Table
        if (!empty($this->SearchForm->get())) {
            $this->set('searchForm', $this->SearchForm->get());
        }
        if (!empty($this->UpdateForm->get())) {
            $this->set('updateForm', $this->UpdateForm->get());
        }
        if (!empty($this->SimpleTable->get())) {
            $this->set('table', $this->SimpleTable->get());
        }
    }
    /**
     * Admins page
     */
    public function updateprofile() {
        include ('Bus/Admins/updateprofile.php');
    }
}
