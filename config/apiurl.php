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