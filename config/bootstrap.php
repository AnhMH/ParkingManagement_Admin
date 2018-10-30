<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.8
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

/*
 * Configure paths required to find CakePHP + general filepath constants
 */
require __DIR__ . '/paths.php';

/*
 * Bootstrap CakePHP.
 *
 * Does the various bits of setup that CakePHP needs to do.
 * This includes:
 *
 * - Registering the CakePHP autoloader.
 * - Setting the default application paths.
 */
require CORE_PATH . 'config' . DS . 'bootstrap.php';

use Cake\Cache\Cache;
use Cake\Console\ConsoleErrorHandler;
use Cake\Core\App;
use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\Core\Plugin;
use Cake\Database\Type;
use Cake\Datasource\ConnectionManager;
use Cake\Error\ErrorHandler;
use Cake\Http\ServerRequest;
use Cake\Log\Log;
use Cake\Mailer\Email;
use Cake\Utility\Inflector;
use Cake\Utility\Security;

/**
 * Uncomment block of code below if you want to use `.env` file during development.
 * You should copy `config/.env.default to `config/.env` and set/modify the
 * variables as required.
 */
if (!env('APP_NAME') && file_exists(CONFIG . '.env')) {
    $dotenv = new \josegonzalez\Dotenv\Loader([CONFIG . '.env']);
    $dotenv->parse()
        ->putenv()
        ->toEnv()
        ->toServer();
}

/*
 * Read configuration file and inject configuration into various
 * CakePHP classes.
 *
 * By default there is only one configuration file. It is often a good
 * idea to create multiple configuration files, and separate the configuration
 * that changes from configuration that does not. This makes deployment simpler.
 */
try {
    Configure::config('default', new PhpConfig());
    Configure::load('app', 'default', false);
    
    // Load for each environment.
    $env = getenv('FUEL_ENV');
    if (!$env) {
        $env = 'development';
    }

    if ($env == 'production') {
        Configure::load('production/app', 'default', true);
    } else {
        Configure::load('development/app', 'default', true);
    }
} catch (\Exception $e) {
    exit($e->getMessage() . "\n");
}

/*
 * Load an environment local configuration file.
 * You can use a file like app_local.php to provide local overrides to your
 * shared configuration.
 */
//Configure::load('app_local', 'default');

/*
 * When debug = true the metadata cache should only last
 * for a short time.
 */
if (Configure::read('debug')) {
    Configure::write('Cache._cake_model_.duration', '+2 minutes');
    Configure::write('Cache._cake_core_.duration', '+2 minutes');
    // disable router cache during development
    Configure::write('Cache._cake_routes_.duration', '+2 seconds');
}

/*
 * Set the default server timezone. Using UTC makes time calculations / conversions easier.
 * Check http://php.net/manual/en/timezones.php for list of valid timezone strings.
 */
date_default_timezone_set(Configure::read('App.defaultTimezone'));

/*
 * Configure the mbstring extension to use the correct encoding.
 */
mb_internal_encoding(Configure::read('App.encoding'));

/*
 * Set the default locale. This controls how dates, number and currency is
 * formatted and sets the default language to use for translations.
 */
ini_set('intl.default_locale', Configure::read('App.defaultLocale'));

/*
 * Register application error and exception handlers.
 */
$isCli = PHP_SAPI === 'cli';
if ($isCli) {
    (new ConsoleErrorHandler(Configure::read('Error')))->register();
} else {
    (new ErrorHandler(Configure::read('Error')))->register();
}

/*
 * Include the CLI bootstrap overrides.
 */
if ($isCli) {
    require __DIR__ . '/bootstrap_cli.php';
}

/*
 * Set the full base URL.
 * This URL is used as the base of all absolute links.
 *
 * If you define fullBaseUrl in your config file you can remove this.
 */
if (!Configure::read('App.fullBaseUrl')) {
    $s = null;
    if (env('HTTPS')) {
        $s = 's';
    }

    $httpHost = env('HTTP_HOST');
    if (isset($httpHost)) {
        Configure::write('App.fullBaseUrl', 'http' . $s . '://' . $httpHost);
    }
    unset($httpHost, $s);
}

Cache::setConfig(Configure::consume('Cache'));
ConnectionManager::setConfig(Configure::consume('Datasources'));
Email::setConfigTransport(Configure::consume('EmailTransport'));
Email::setConfig(Configure::consume('Email'));
Log::setConfig(Configure::consume('Log'));
Security::setSalt(Configure::consume('Security.salt'));

/*
 * The default crypto extension in 3.0 is OpenSSL.
 * If you are migrating from 2.x uncomment this code to
 * use a more compatible Mcrypt based implementation
 */
//Security::engine(new \Cake\Utility\Crypto\Mcrypt());

/*
 * Setup detectors for mobile and tablet.
 */
ServerRequest::addDetector('mobile', function ($request) {
    $detector = new \Detection\MobileDetect();

    return $detector->isMobile();
});
ServerRequest::addDetector('tablet', function ($request) {
    $detector = new \Detection\MobileDetect();

    return $detector->isTablet();
});

/*
 * Enable immutable time objects in the ORM.
 *
 * You can enable default locale format parsing by adding calls
 * to `useLocaleParser()`. This enables the automatic conversion of
 * locale specific date formats. For details see
 * @link https://book.cakephp.org/3.0/en/core-libraries/internationalization-and-localization.html#parsing-localized-datetime-data
 */
Type::build('time')
    ->useImmutable();
Type::build('date')
    ->useImmutable();
Type::build('datetime')
    ->useImmutable();
Type::build('timestamp')
    ->useImmutable();

/*
 * Custom Inflector rules, can be set to correctly pluralize or singularize
 * table, model, controller names or whatever other string is passed to the
 * inflection functions.
 */
//Inflector::rules('plural', ['/^(inflect)or$/i' => '\1ables']);
//Inflector::rules('irregular', ['red' => 'redlings']);
//Inflector::rules('uninflected', ['dontinflectme']);
//Inflector::rules('transliteration', ['/å/' => 'aa']);

Plugin::load('CakeExcel', ['bootstrap' => true, 'routes' => true]);

/*
 * Custom
 */
include_once ('apiurl.php');

Configure::write('default_avatar', 'avatar_default.png');
Configure::write('Config.PageSize', 10);
Configure::write('Config.searchPageSize', array(
    10 => 10,
    20 => 20,
    50 => 50,
    80 => 80,
    100 => 100,
));
Configure::write('Config.systemLogType', array(
    'ADMIN_LOGIN' => 1,
    'ADMIN_LOGOUT' => 2,
    'ADMIN_UPDATE' => 3,
    'ADMIN_CREATE' => 4,
    'ADMIN_DELETE' => 5,
    
    'ADMIN_TYPE_UPDATE' => 6,
    'ADMIN_TYPE_CREATE' => 7,
    'ADMIN_TYPE_DELETE' => 8,
    
    'MONTHLYCARD_CREATE' => 9,
    'MONTHLYCARD_UPDATE' => 10,
    'MONTHLYCARD_DELETE' => 11,
    'MONTHLYCARD_IMPORT' => 12,
    'MONTHLYCARD_EXPORT' => 13,
    
    'CARD_CREATE' => 14,
    'CARD_UPDATE' => 15,
    'CARD_DELETE' => 16,
    'CARD_IMPORT' => 17,
    'CARD_EXPORT' => 18,
    
    'UPDATE_PRICE_FORMULA1' => 19,
    'UPDATE_PRICE_FORMULA2' => 20,
    'UPDATE_PRICE_FORMULA3' => 21,
));
Configure::write('Config.searchStatus', array(
    0 => __('LABEL_ACTIVE'),
    1 => __('LABEL_INACTIVE'),
));
Configure::write('Config.orderStatus', array(
    0 => 'Khởi tạo',
    1 => 'Hoàn thành',
));
Configure::write('Config.gender', array(
    1 => 'Nam',
    2 => 'Nữ',
));
Configure::write('Config.settingType', array(
    'permission' => 1,
    'display' => 2,
    'price_formula1' => 3,
    'price_formula2' => 4,
    'price_formula3' => 5,
));
Configure::write('Config.parkingType', array(
    '0' => 'Giữ xe miễn phí',
    '1' => 'Giữ xe theo công văn',
    '2' => 'Giữ xe tăng lũy tiến',
    '3' => 'Giữ xe tổng hợp',
));
Configure::write('Config.monthlyCardExpireType', array(
    '0' => 'Tính tiền như vãng lai',
    '1' => 'Chỉ cảnh báo hết hạn'
));
Configure::write('Config.priceLevel3Type', array(
    '0' => 'Không cộng',
    '1' => 'Cộng 1 mốc',
    '2' => 'Cộng 2 mốc'
));
Configure::write('Config.settingPermission', array(
    '1' => array(
        'title' => __('LABEL_ADMIN_MANAGEMENT'),
        'detail' => array(
            'admin_list' => array(
                'title' => __('LABEL_ADMIN_LIST'),
                'controller' => 'Admins',
                'action' => 'index,update'
            ),
            'admin_log' => array(
                'title' => __('LABEL_ADMIN_LOG'),
                'controller' => 'Admins',
                'action' => 'viewlog'
            ),
            'admin_type' => array(
                'title' => __('LABEL_ADMIN_TYPE_LIST'),
                'controller' => 'Admins',
                'action' => 'index,update'
            )
        )
    ),
    '2' => array(
        'title' => __('LABEL_REVENUE_MANAGEMENT'),
        'detail' => array(
            'revenue_list' => array(
                'title' => __('LABEL_REVENUE_LIST'),
                'controller' => 'Revenue',
                'action' => 'index'
            ),
            'price_formula_1' => array(
                'title' => __('LABEL_PRICE_FORMULA_1'),
                'controller' => 'Revenue',
                'action' => 'priceformula1'
            ),
            'price_formula_2' => array(
                'title' => __('LABEL_PRICE_FORMULA_2'),
                'controller' => 'Revenue',
                'action' => 'priceformula2'
            ),
            'price_formula_3' => array(
                'title' => __('LABEL_PRICE_FORMULA_3'),
                'controller' => 'Revenue',
                'action' => 'priceformula3'
            ),
        )
    ),
    '3' => array(
        'title' => __('LABEL_CARD_VEHICLE_MANAGEMENT'),
        'detail' => array(
            'card_list' => array(
                'title' => __('LABEL_CARD_LIST'),
                'controller' => 'Cards',
                'action' => 'index,update'
            ),
            'vehicle_list' => array(
                'title' => __('LABEL_VEHICLE_LIST'),
                'controller' => 'Vehicles',
                'action' => 'index,update'
            ),
            'card_active' => array(
                'title' => __('LABEL_CARD_ACTIVE'),
                'controller' => 'Cards',
                'action' => 'active'
            ),
        )
    ),
    '4' => array(
        'title' => __('LABEL_MONTHLYCARD_MANAGEMENT'),
        'detail' => array(
            'monthly_card_log' => array(
                'title' => __('LABEL_MONTHLYCARD_VIEWLOG'),
                'controller' => 'Monthlycards',
                'action' => 'viewlog'
            ),
            'monthly_card_list' =>array(
                'title' => __('LABEL_MONTHLYCARD_LIST'),
                'controller' => 'Monthlycards',
                'action' => 'index,update'
            ),
            'monthly_card_renewal' => array(
                'title' => __('LABEL_MONTHLYCARD_RENEWAL'),
                'controller' => 'Monthlycards',
                'action' => 'renewal'
            ),
            'monthly_card_change' => array(
                'title' => __('LABEL_MONTHLYCARD_CHANGE'),
                'controller' => 'Monthlycards',
                'action' => 'disablelist'
            ),
            'monthly_card_active' => array(
                'title' => __('LABEL_MONTHLYCARD_ACTIVE'),
                'controller' => 'Monthlycards',
                'action' => 'active'
            ),
        )
    ),
    '5' => array(
        'title' => __('LABEL_SYSTEM_SETTING'),
        'detail' => array(
            'system_display_setting' => array(
                'title' => __('LABEL_DISPLAY_SETTING'),
                'controller' => 'Settings',
                'action' => 'display'
            ),
            'system_order_list' => array(
                'title' => __('LABEL_ORDER_LIST'),
                'controller' => 'Settings',
                'action' => 'order'
            ),
            'system_permission' => array(
                'title' => __('LABEL_SETTING_PERMISSION'),
                'controller' => 'Settings',
                'action' => 'permission'
            ),
            'system_log' => array(
                'title' => __('LABEL_SYSTEM_LOG'),
                'controller' => 'Settings',
                'action' => 'systemlog'
            ),
        )
    ),
    '6' => array(
        'title' => __('LABEL_CHECKINOUT_LOG'),
        'detail' => array(
            'checkinout_card_log' => array(
                'title' => __('LABEL_CARD_LOG'),
                'controller' => 'checkinoutlogs',
                'action' => 'card'
            ),
            'checkinout_monthly_card_log' => array(
                'title' => __('LABEL_MONTHLY_CARD_LOG'),
                'controller' => 'checkinoutlogs',
                'action' => 'monthlycard'
            ),
        )
    )
));

if ($env == 'production') {
    define('VERSION_DATE', date('YmdHis'));
    include_once ('production/bootstrap.php');
} else {
    define('VERSION_DATE', date('YmdHis'));
    include_once ('development/bootstrap.php');
}

define('DEFAULT_SITE_TITLE', 'Parking Management');
if (!defined('USE_SUB_DIRECTORY')) {
    define('USE_SUB_DIRECTORY', '');
}
