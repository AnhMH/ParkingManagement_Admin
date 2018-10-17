<?php

/**
 * API's Url
 */
use Cake\Core\Configure;

Configure::write('API.Timeout', 60);
Configure::write('API.secretKey', 'parkingmanagement');

Configure::write('API.url_admins_login', 'admins/login');
Configure::write('API.url_admins_register', 'admins/register');
Configure::write('API.url_admins_updateprofile', 'admins/updateprofile');
Configure::write('API.url_admins_list', 'admins/list');

Configure::write('API.url_admintypes_list', 'admintypes/list');
Configure::write('API.url_admintypes_detail', 'admintypes/detail');
Configure::write('API.url_admintypes_all', 'admintypes/all');
Configure::write('API.url_admintypes_addupdate', 'admintypes/addupdate');
Configure::write('API.url_admintypes_disable', 'admintypes/disable');