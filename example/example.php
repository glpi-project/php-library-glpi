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

require_once __DIR__ . '/../vendor/autoload.php';

$client = new \Glpi\Api\Rest\Client('http://localhost/glpi/apirest.php/', new GuzzleHttp\Client());

try {
   // try to do login
   $client->initSessionByCredentials('glpi', 'glpi');
} catch (Exception $e) {
   // print the error if failed
   echo $e->getMessage();
   die();
}

// Let's make a request to an End Point
$endPointHandler = new \Glpi\Api\Rest\EndPointHandler($client);
$response = $endPointHandler->getMyProfiles();
$profiles = json_decode($response['body']);
foreach ($profiles->myprofiles as $profile) {
   echo "Profile name: " . $profile->name . "\n";
}

// Let's work with item types
$itemHandler = new \Glpi\Api\Rest\ItemHandler($client);
$response = $itemHandler->getItem('User', 2);
$bodyDecoded = json_decode($response['body']);
if ($response['statusCode'] == 404) {
   // User not found
   die($bodyDecoded[1]);
}
echo "User name: " . $bodyDecoded->name . "\n";

// let's end the session.
$client->killSession();