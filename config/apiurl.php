<?php

/**
 * API's Url
 */
use Cake\Core\Configure;

Configure::write('API.Timeout', 60);
Configure::write('API.secretKey', 'chotreolethuy');

Configure::write('API.url_admins_login', 'admins/login');
Configure::write('API.url_admins_register', 'admins/register');
Configure::write('API.url_admins_updateprofile', 'admins/updateprofile');

Configure::write('API.url_suppliers_list', 'suppliers/list');
Configure::write('API.url_suppliers_addupdate', 'suppliers/addupdate');
Configure::write('API.url_suppliers_detail', 'suppliers/detail');
Configure::write('API.url_suppliers_delete', 'suppliers/delete');
Configure::write('API.url_suppliers_autocomplete', 'suppliers/autocomplete');

Configure::write('API.url_orders_list', 'orders/list');
Configure::write('API.url_orders_addupdate', 'orders/addupdate');
Configure::write('API.url_orders_detail', 'orders/detail');
Configure::write('API.url_orders_delete', 'orders/delete');
Configure::write('API.url_orders_disable', 'orders/disable');

Configure::write('API.url_cates_list', 'cates/list');
Configure::write('API.url_cates_all', 'cates/all');
Configure::write('API.url_cates_addupdate', 'cates/addupdate');
Configure::write('API.url_cates_detail', 'cates/detail');
Configure::write('API.url_cates_delete', 'cates/delete');

Configure::write('API.url_customers_list', 'customers/list');
Configure::write('API.url_customers_all', 'customers/all');
Configure::write('API.url_customers_addupdate', 'customers/addupdate');
Configure::write('API.url_customers_detail', 'customers/detail');
Configure::write('API.url_customers_delete', 'customers/delete');
Configure::write('API.url_customers_autocomplete', 'customers/autocomplete');

Configure::write('API.url_products_list', 'products/list');
Configure::write('API.url_products_addupdate', 'products/addupdate');
Configure::write('API.url_products_detail', 'products/detail');
Configure::write('API.url_products_delete', 'products/delete');
Configure::write('API.url_products_disable', 'products/disable');
Configure::write('API.url_products_autocomplete', 'products/autocomplete');
Configure::write('API.url_products_getinventory', 'products/getinventory');

Configure::write('API.url_settings_gettopdata', 'settings/gettopdata');