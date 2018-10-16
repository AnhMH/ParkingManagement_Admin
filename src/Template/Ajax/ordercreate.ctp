<?php 
$data = array(
    'type' => 'orders',
    'order' => !empty($order) ? $order : array(),
    'id' => !empty($id) ? $id : '',
    'title' => 'đơn hàng'
);
echo $this->element('order_create', $data);