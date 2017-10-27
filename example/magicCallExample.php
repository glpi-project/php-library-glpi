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

// Let's work with item types
$itemHandler = new \Glpi\Api\Rest\ItemHandler($client);


// create a new computer
$response = $itemHandler->Computer('create', ['name' => 'pc001', 'users_id' => 2]);
print_r($response);

// get the computer created
$computer = json_decode($response['body']);
$response = $itemHandler->Computer('read', $computer->id, ['expand_dropdowns' => true]);
print_r($response);

// update the computer description
$response = $itemHandler->Computer('update', ['id' => $computer->id, 'name' => 'pc100']);
print_r($response);

// delete de computer
$response = $itemHandler->Computer('delete', ['id' => $computer->id], ['force_purge' => true]);
print_r($response);

// let's end the session.
$client->killSession();