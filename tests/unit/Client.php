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

namespace Glpi\Api\Rest\tests\units;

use Glpi\Api\Rest\tests\BaseTestCase;

/**
 * @engine inline
 */
class Client extends BaseTestCase {

   public function testInitSession() {
      $client = $this->newTestedInstance(GLPI_URL);

      // Test invalid credentials
      $this->exception(function () use ($client) {
         $client->initSessionByCredentials('glpi', 'bad password');
      })->isIdenticalTo($this->exception);

      // Test valid credentials
      $success = $client->initSessionByCredentials('glpi', 'glpi');
      $this->boolean($success)->isTrue();

      // Test invalid credentials for user token
      $this->exception(function () use ($client){
         $client->initSessionByUserToken('loremIpsum');
      })->isIdenticalTo($this->exception);
   }

   /*public function testComputer() {
      $client = $this->newTestedInstance(GLPI_URL);
      $this->boolean($client->initSessionByCredentials('glpi', 'glpi'))->isTrue();

      $response = $client->computer('post', ['name' => 'computer 0001']);
      $this->object($response)->isInstanceOf(\Psr\Http\Message\ResponseInterface::class);
   }*/

   public function testGetFullSession() {
      $this->loginSuperAdmin();
      $response = $this->client->getFullSession();
      $this->assertJsonResponse($response);

   }

}