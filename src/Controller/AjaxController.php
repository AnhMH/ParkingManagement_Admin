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
     * Customer list
     */
    public function getlistcustomer($page) {
        include ('Bus/Ajax/getlistcustomer.php');
    }
    
    /**
     * Customer create
     */
    public function customercreate() {
        $this->autoRender = false;
        include ('Bus/Ajax/customercreate.php');
    }
    
    /**
     * Customer detail
     */
    public function customerdetail($id) {
        include ('Bus/Ajax/customerdetail.php');
    }
    
    /**
     * Customer delete
     */
    public function customerdel() {
        $this->autoRender = false;
        include ('Bus/Ajax/customerdel.php');
    }
    
    /**
     * Customer auto complete
     */
    public function customerautocomplete() {
        include ('Bus/Ajax/customerautocomplete.php');
    }
    
    /**
     * Supplier list
     */
    public function supplierlist($page) {
        include ('Bus/Ajax/supplierlist.php');
    }
    
    /**
     * Supplier create
     */
    public function suppliercreate() {
        $this->autoRender = false;
        include ('Bus/Ajax/suppliercreate.php');
    }
    
    /**
     * Supplier auto complete
     */
    public function supplierautocomplete() {
        include ('Bus/Ajax/supplierautocomplete.php');
    }
    
    /**
     * Supplier delete
     */
    public function supplierdel() {
        $this->autoRender = false;
        include ('Bus/Ajax/supplierdel.php');
    }
    
    /**
     * Supplier detail
     */
    public function supplierdetail($id) {
        include ('Bus/Ajax/supplierdetail.php');
    }
    
    /**
     * Product list
     */
    public function productlist($page) {
        include ('Bus/Ajax/productlist.php');
    }
    
    /**
     * Product detail
     */
    public function productdetail($id) {
        include ('Bus/Ajax/productdetail.php');
    }
    
    /**
     * Product create
     */
    public function productcreate($id = '') {
        include ('Bus/Ajax/productcreate.php');
    }
    
    /**
     * Product disable
     */
    public function productdisable() {
        $this->autoRender = false;
        include ('Bus/Ajax/productdisable.php');
    }
    
    /**
     * Product delete
     */
    public function productdel() {
        $this->autoRender = false;
        include ('Bus/Ajax/productdel.php');
    }
    
    /**
     * Product autocomplete
     */
    public function productautocomplete() {
        include ('Bus/Ajax/productautocomplete.php');
    }
    
    /**
     * Cate all
     */
    public function cateall() {
        include ('Bus/Ajax/cateall.php');
    }
    
    /**
     * Cate list
     */
    public function catelist($page) {
        include ('Bus/Ajax/catelist.php');
    }
    
    /**
     * Cate create
     */
    public function catecreate() {
        $this->autoRender = false;
        include ('Bus/Ajax/catecreate.php');
    }
    
    /**
     * Cate delete
     */
    public function catedel() {
        $this->autoRender = false;
        include ('Bus/Ajax/catedel.php');
    }
    
    /**
     * Order list
     */
    public function orderlist($page) {
        include ('Bus/Ajax/orderlist.php');
    }
    
    /**
     * Order create
     */
    public function ordercreate($id = 0) {
        include ('Bus/Ajax/ordercreate.php');
    }
    
    /**
     * Order select product
     */
    public function orderselectproduct($type = '') {
        include ('Bus/Ajax/orderselectproduct.php');
    }
    
    /**
     * Order disable
     */
    public function orderdisable() {
        $this->autoRender = false;
        include ('Bus/Ajax/orderdisable.php');
    }
    
    /**
     * Order delete
     */
    public function orderdel() {
        $this->autoRender = false;
        include ('Bus/Ajax/orderdel.php');
    }
    
    /**
     * Order detail
     */
    public function orderdetail($id) {
        include ('Bus/Ajax/orderdetail.php');
    }
    
    /**
     * Order print
     */
    public function orderprint() {
        include ('Bus/Ajax/orderprint.php');
    }
    
    /**
     * Import list
     */
    public function importlist($page) {
        include ('Bus/Ajax/importlist.php');
    }
    
    /**
     * Import create
     */
    public function importcreate($id = 0) {
        include ('Bus/Ajax/importcreate.php');
    }
    
    /**
     * Inventory list
     */
    public function inventorylist($page) {
        include ('Bus/Ajax/inventorylist.php');
    }
    
    /**
     * Revenue list
     */
    public function revenuelist($page) {
        include ('Bus/Ajax/revenuelist.php');
    }
    
    /**
     * Profit list
     */
    public function profitlist($page) {
        include ('Bus/Ajax/profitlist.php');
    }
}
