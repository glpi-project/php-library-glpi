<?php
/**
 * --------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of the GLPI API Client Library for PHP,
 * a subproject of GLPI. GLPI is a free IT Asset Management.
 *
 * GLPI is free software: you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 3
 * of the License, or (at your option) any later version.
 *
 * GLPI is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 * --------------------------------------------------------------------
 * @author    Domingo Oropeza - <doropeza@teclib.com>
 * @copyright (C) 2017 Teclib' and contributors.
 * @license   GPLv3 https://www.gnu.org/licenses/gpl-3.0.html
 * @link      https://github.com/glpi-project/php-library-glpi
 * @link      http://www.glpi-project.org/
 * --------------------------------------------------------------------
 */

global $CFG_GLPI, $PLUGIN_HOOKS;

require __DIR__ . '/../vendor/autoload.php';

$glpiUrl = getenv('GLPI_URL'); // set this on .travis.yml
if (empty($glpiUrl)) {
   die('environment variable GLPI_URL not set' . PHP_EOL);
}
define('GLPI_URL', $glpiUrl . '/apirest.php/');

$glpiRoot = getenv('GLPI_ROOT_DIR'); // set this on .travis.yml
if (empty($glpiRoot)) {
   die('environment variable GLPI_ROOT_DIR not set' . PHP_EOL);
}
define('GLPI_ROOT', realpath($glpiRoot));
if (!file_exists(GLPI_ROOT . '/config/config_db.php')) {
   echo "config_db.php missing. Did GLPI successfully initialized ?\n";
   exit(1);
}

// Giving --debug argument to atoum will be detected by GLPI too
// the error handler in Toolbox may output to stdout a message and break process communication
// in atoum
$key = array_search('--debug', $_SERVER['argv']);
if ($key) {
   unset($_SERVER['argv'][$key]);
}

require_once(GLPI_ROOT . '/inc/includes.php');

// need to set theses in DB, because tests for API use http call and this bootstrap file is not called
Config::setConfigurationValues('core', [
   'url_base' => $glpiUrl,
   'url_base_api' => $glpiUrl . '/apirest.php',
   'use_notifications' => '1',
   'notifications_mailing' => '1',
   'enable_api' => '1',
   'enable_api_login_credentials' => '1',
   'enable_api_login_external_token' => '1',
]);