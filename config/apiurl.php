<?php

/**
 * API's Url
 */
use Cake\Core\Configure;

Configure::write('API.Timeout', 60);
Configure::write('API.secretKey', 'parkingmanagement');

Configure::write('API.url_admins_login', 'admins/login');
Configure::write('API.url_admins_logout', 'admins/logout');
Configure::write('API.url_admins_register', 'admins/register');
Configure::write('API.url_admins_updateprofile', 'admins/updateprofile');
Configure::write('API.url_admins_list', 'admins/list');
Configure::write('API.url_admins_all', 'admins/all');
Configure::write('API.url_admins_addupdate', 'admins/addupdate');
Configure::write('API.url_admins_detail', 'admins/detail');
Configure::write('API.url_admins_disable', 'admins/disable');
Configure::write('API.url_admins_getoptions', 'admins/getoptions');

Configure::write('API.url_cards_list', 'cards/list');
Configure::write('API.url_cards_detail', 'cards/detail');
Configure::write('API.url_cards_all', 'cards/all');
Configure::write('API.url_cards_addupdate', 'cards/addupdate');
Configure::write('API.url_cards_disable', 'cards/disable');
Configure::write('API.url_cards_import', 'cards/import');

Configure::write('API.url_monthlycards_list', 'monthlycards/list');
Configure::write('API.url_monthlycards_detail', 'monthlycards/detail');
Configure::write('API.url_monthlycards_all', 'monthlycards/all');
Configure::write('API.url_monthlycards_addupdate', 'monthlycards/addupdate');
Configure::write('API.url_monthlycards_disable', 'monthlycards/disable');
Configure::write('API.url_monthlycards_import', 'monthlycards/import');
Configure::write('API.url_monthlycards_renewal', 'monthlycards/renewal');
Configure::write('API.url_monthlycards_getcarddetail', 'monthlycards/getcarddetail');

Configure::write('API.url_vehicles_list', 'vehicles/list');
Configure::write('API.url_vehicles_detail', 'vehicles/detail');
Configure::write('API.url_vehicles_all', 'vehicles/all');
Configure::write('API.url_vehicles_addupdate', 'vehicles/addupdate');
Configure::write('API.url_vehicles_disable', 'vehicles/disable');

Configure::write('API.url_companies_list', 'companies/list');
Configure::write('API.url_companies_detail', 'companies/detail');
Configure::write('API.url_companies_all', 'companies/all');
Configure::write('API.url_companies_addupdate', 'companies/addupdate');
Configure::write('API.url_companies_disable', 'companies/disable');

Configure::write('API.url_projects_list', 'projects/list');
Configure::write('API.url_projects_detail', 'projects/detail');
Configure::write('API.url_projects_all', 'projects/all');
Configure::write('API.url_projects_addupdate', 'projects/addupdate');
Configure::write('API.url_projects_disable', 'projects/disable');

Configure::write('API.url_admintypes_list', 'admintypes/list');
Configure::write('API.url_admintypes_detail', 'admintypes/detail');
Configure::write('API.url_admintypes_all', 'admintypes/all');
Configure::write('API.url_admintypes_addupdate', 'admintypes/addupdate');
Configure::write('API.url_admintypes_disable', 'admintypes/disable');

Configure::write('API.url_systemlogs_list', 'systemlogs/list');

Configure::write('API.url_orders_list', 'orders/list');
Configure::write('API.url_orders_revenue', 'orders/revenue');

Configure::write('API.url_permissions_addupdate', 'permissions/addupdate');
Configure::write('API.url_permissions_detail', 'permissions/detail');

Configure::write('API.url_settings_addupdate', 'settings/addupdate');
Configure::write('API.url_settings_detail', 'settings/detail');