<?php

use App\Lib\Api;
use Cake\Core\Configure;

// Init param
$limit = Configure::read('Config.PageSize');
$param = array(
//    'limit' => $limit,
//    'page' => $page,
//    'get_customers' => 1
);
$postParam = $this->request->data();
if (!empty($postParam)) {
    $param = array_merge($param, $postParam);
}

// Call api
$result = Api::call(Configure::read('API.url_orders_list'), $param);
$data = !empty($result['data']) ? $result['data'] : array();

// Modify data
$totalOrder = 0;
$totalQty = 0;
$totalDiscount = 0;
$totalPrice = 0;
$totalLack = 0;
$type = !empty($param['type']) ? $param['type'] : '';
if (!empty($data)) {
    foreach ($data as $val) {
        $totalOrder += 1;
        $totalQty += $val['total_qty'];
        $totalDiscount += $val['coupon'];
        $totalPrice += $val['total_price'];
        $totalLack += $val['lack'];
    }
    if ($type == 2) {
        $revenueByCustomer = array();
        foreach ($data as $val) {
            $revenueByCustomer[$val['customer_id']]['orders'][] = $val;
            $revenueByCustomer[$val['customer_id']]['customer_id'] = $val['customer_id'];
            $revenueByCustomer[$val['customer_id']]['name'] = $val['customer_name'];
            $revenueByCustomer[$val['customer_id']]['total_coupon'] += $val['coupon'];
            $revenueByCustomer[$val['customer_id']]['total_price'] += $val['total_price'];
            $revenueByCustomer[$val['customer_id']]['total_qty'] += $val['total_qty'];
            $revenueByCustomer[$val['customer_id']]['total_lack'] += $val['lack'];
        }
        $data = array_values($revenueByCustomer);
    } elseif ($type == 3) {
        $revenueByProduct = array();
        foreach ($data as $val) {
            $products = json_decode($val['detail'], true);
            foreach ($products as $p) {
                $coupon = number_format($val['coupon'] / $val['total_qty'] * $p['qty']);
                $revenueByProduct[$p['id']]['code'] = $p['code'];
                $revenueByProduct[$p['id']]['name'] = $p['name'];
                $revenueByProduct[$p['id']]['image'] = $p['image'];
                $revenueByProduct[$p['id']]['qty'] += $p['qty'];
                $revenueByProduct[$p['id']]['price'] += $p['qty'] * $p['price'] - $coupon;
                $revenueByProduct[$p['id']]['coupon'] += $coupon;
            }
        }
        $data = array_values($revenueByProduct);
    }
}

// Pagination
$total = !empty($data) ? count($data) : 0;
$revenue = $this->dataPagination($data, $page, $limit);

// Set data
$this->set(compact(
    'revenue', 
    'total',
    'totalOrder',
    'totalQty',
    'totalDiscount', 
    'totalLack', 
    'totalPrice', 
    'limit', 
    'page', 
    'param', 
    'type'
));
