<?php
/**
 * LICENSE
 *
 * Copyright © 2017 Teclib'
 *
 * This file is part of GLPI Api Client Library for PHP.
 *
 * GLPI Api Client Library for PHP is a subproject of Flyve MDM. Flyve MDM is a mobile
 * device management software.
 *
 * GLPI Api Client Library for PHP is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Affero General Public License as published
 * by the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * GLPI Api Client Library for PHP is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 * You should have received a copy of the GNU Affero General Public License
 * along with GLPI Api Client Library for PHP. If not, see http://www.gnu.org/licenses/.
 * ------------------------------------------------------------------------------
 * @author    Domingo Oropeza
 * @copyright Copyright © 2017 Teclib
 * @license   AGPLv3+ http://www.gnu.org/licenses/agpl.txt
 * @link      https://github.com/flyve-mdm/composer-package-glpi
 * @link      https://flyve-mdm.com/
 * ------------------------------------------------------------------------------
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