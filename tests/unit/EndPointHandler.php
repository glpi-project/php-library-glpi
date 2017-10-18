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

namespace GlpiProject\API\Rest\tests\units;

use GlpiProject\API\Rest\tests\BaseTestCase;

/**
 * @engine inline
 */
class EndPointHandler extends BaseTestCase {

   public function setUp() {
      $this->loginSuperAdmin();
   }

   public function tearDown() {
//      $this->client->killSession();
   }

   /**
    * @tags testGetMyProfiles
    */
   public function testGetMyProfiles() {
      $this->newTestedInstance($this->client);
      $response = $this->testedInstance->getMyProfiles();
      $this->assertJsonResponse($response);
   }

   /**
    * @tags testGetActiveProfile
    */
   public function testGetActiveProfile() {
      $this->newTestedInstance($this->client);
      $response = $this->testedInstance->getActiveProfile();
      $this->assertJsonResponse($response);
   }

   /**
    * @tags testChangeActiveProfile
    */
   public function testChangeActiveProfile() {
      $this->newTestedInstance($this->client);
      $response = $this->testedInstance->getActiveProfile();
      $currentProfile = json_decode($response['body']);

      // assert current profile with id
      $response = $this->testedInstance->changeActiveProfile($currentProfile->active_profile->id);
      $this->assertJsonResponse($response);

      // assert invalid profile
      $response = $this->testedInstance->changeActiveProfile(-1);
      $this->assertJsonResponse($response, parent::HTTP_NOT_FOUND);
   }

   /**
    * @tags testGetMyEntities
    */
   public function testGetMyEntities() {
      $this->newTestedInstance($this->client);
      $response = $this->testedInstance->getMyEntities();
      $this->assertJsonResponse($response);

      // The returned json has to had this key(s)
      $stdClass = json_decode($response['body']);
      $this->boolean(property_exists($stdClass,
         'myentities'))->isTrue()->array($stdClass->myentities);

      $response = $this->testedInstance->getMyEntities(['is_recursive' => true]);
      $this->assertJsonResponse($response);
      // TODO: complete the test for recursive cases.
   }

   /**
    * @tags testGetActiveEntities
    */
   public function testGetActiveEntities() {
      $this->newTestedInstance($this->client);
      $response = $this->testedInstance->getActiveEntities();
      $this->assertJsonResponse($response);

      // The returned json has to had this key(s)
      $stdClass = json_decode($response['body']);
      $this->boolean(property_exists($stdClass, 'active_entity'))->isTrue();
      $this->boolean(property_exists($stdClass->active_entity,
         'active_entity_recursive'))->isTrue();
      $this->boolean(property_exists($stdClass->active_entity,
         'active_entities'))->isTrue()->array($stdClass->active_entity->active_entities);
   }

   /**
    * @tags testGetActiveEntities
    */
   public function testChangeActiveEntities() {
      $this->newTestedInstance($this->client);

      // check with no params (default behavior)
      $response = $this->testedInstance->changeActiveEntities();
      $this->array($response)
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('true');

      // check for invalid entity param
      $response = $this->testedInstance->changeActiveEntities(['entities_id' => -1]);
      $this->array($response)
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('false');

      // check for invalid recursive param
      $response = $this->testedInstance->changeActiveEntities(['is_recursive' => "lorem"]);
      $this->array($response)
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('true'); // this could be a bug from glpi.

      $response = $this->testedInstance->changeActiveEntities([
         'entities_id' => 0,
         'is_recursive' => "lorem",
      ]);
      $this->array($response)
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('true');

      // check for valid params with different default values
      $response = $this->testedInstance->changeActiveEntities([
         'entities_id' => 0,
         'is_recursive' => true,
      ]);
      $this->array($response)
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('true');
   }
}