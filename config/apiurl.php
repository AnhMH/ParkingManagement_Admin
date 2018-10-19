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
Configure::write('API.url_admins_addupdate', 'admins/addupdate');
Configure::write('API.url_admins_detail', 'admins/detail');
Configure::write('API.url_admins_disable', 'admins/disable');

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

Configure::write('API.url_vehicles_list', 'vehicles/list');
Configure::write('API.url_vehicles_detail', 'vehicles/detail');
Configure::write('API.url_vehicles_all', 'vehicles/all');
Configure::write('API.url_vehicles_addupdate', 'vehicles/addupdate');
Configure::write('API.url_vehicles_disable', 'vehicles/disable');

Configure::write('API.url_admintypes_list', 'admintypes/list');
Configure::write('API.url_admintypes_detail', 'admintypes/detail');
Configure::write('API.url_admintypes_all', 'admintypes/all');
Configure::write('API.url_admintypes_addupdate', 'admintypes/addupdate');
Configure::write('API.url_admintypes_disable', 'admintypes/disable');

Configure::write('API.url_systemlogs_list', 'systemlogs/list');