<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * Use the DS to separate the directories in other defines
 */
if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

/**
 * These defines should only be edited if you have cake installed in
 * a directory layout other than the way it is distributed.
 * When using custom settings be sure to use the DS and do not add a trailing DS.
 */

/**
 * The full path to the directory which holds "App", WITHOUT a trailing DS.
 */
define('ROOT', dirname(__DIR__));

/**
 * The actual directory name for the "App".
 */
define('APP_DIR', 'src');

/**
 * Path to the application's directory.
 */
define('APP', ROOT . DS . APP_DIR . DS);

/**
 * Path to the config directory.
 */
define('CONFIG', ROOT . DS . 'config' . DS);

/**
 * File path to the webroot directory.
 */
define('WWW_ROOT', ROOT . DS . 'webroot' . DS);

/**
 * Path to the tests directory.
 */
define('TESTS', ROOT . DS . 'tests' . DS);

/**
 * Path to the temporary files directory.
 */
define('TMP', ROOT . DS . 'tmp' . DS);

/**
 * Path to the logs directory.
 */
define('LOGS', ROOT . DS . 'logs' . DS);

/**
 * Path to the cache files directory. It can be shared between hosts in a multi-server setup.
 */
define('CACHE', TMP . 'cache' . DS);

/**
 * The absolute path to the "cake" directory, WITHOUT a trailing DS.
 *
 * CakePHP should always be installed with composer, so look there.
 */
define('CAKE_CORE_INCLUDE_PATH', ROOT . DS . 'vendor' . DS . 'cakephp' . DS . 'cakephp');

/**
 * Path to the cake directory.
 */
define('CORE_PATH', CAKE_CORE_INCLUDE_PATH . DS);
define('CAKE', CORE_PATH . 'src' . DS);

/** *******DEFINE GEOIP ******* **/
//GeoIP folder
define('GEOIP_PATH', ROOT . DS . 'src' . DS . 'Controller' . DS . 'Component' . DS . 'GeoIP' . DS);

//GeoIP country data file
define('GEOIP_COUNTRY_DATA_FILE', GEOIP_PATH . 'GeoLite2-Country.mmdb');

//GeoIP city data file
define('GEOIP_CITY_DATA_FILE', GEOIP_PATH . 'GeoLite2-City.mmdb');

/** *******DEFINE PAGES (CATOT)******* **/
define('USER_LOGIN', '/users/login');
define('USER_PROFILE', '/users/profile');
define('ADMIN_LOGIN', '/admin/login');
define('ADMIN_DASHBOARD', '/admin/dashboard');
define('ADMIN_USERS', '/admin/user');
define('ADMIN_REGIONS', '/admin/regions');
define('ADMIN_CITIES','/admin/cities');
define('ADMIN_POSTS', '/admin/posts');
define('ADMIN_TAGS', '/admin/tags');
define('ADMIN_WISHLISTS', '/admin/wishlists');
define('ADMIN_MEDIA', '/admin/media');
define('ADMIN_IMAGES', '/adminimages');
define('ADMIN_PAYMENTS', '/admin/payments');
define('ADMIN_NEWSLETTERS', '/admin/newsletter');
define('ADMIN_TEMPLATES', '/admin/templates');
define('ADMIN_FRIENDS', '/admin/friends');
define('ADMIN_RATING', '/admin/rating');
define('ADMIN_MESSAGES', '/admin/messages');
define('ADMIN_REPORTS', '/admin/reports');
define('ADMIN_EXCHANGES', '/admin/exchanges');