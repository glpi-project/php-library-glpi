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

namespace Glpi\Api\Rest\tests\units;

use Glpi\Api\Rest\tests\BaseTestCase;

/**
 * @engine inline
 */
class EndPointHandler extends BaseTestCase {

   public function setUp() {
      $this->loginSuperAdmin();
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

      // for glpi 9.2.1 the status code is different
      $response = $this->client->getGlpiConfig();
      $stdClass = json_decode($response['body']);
      $statusCode = ($stdClass->cfg_glpi->version == '9.2.1') ? parent::HTTP_OK : parent::HTTP_BAD_REQUEST;

      // check for invalid entity param
      $response = $this->testedInstance->changeActiveEntities(['entities_id' => -1]);
      $this->assertJsonResponse($response, $statusCode);

      // check for invalid recursive param
      $response = $this->testedInstance->changeActiveEntities(['is_recursive' => "lorem"]);
      $this->assertJsonResponse($response, $statusCode);

      $response = $this->testedInstance->changeActiveEntities([
         'entities_id' => 0,
         'is_recursive' => "lorem",
      ]);
      $this->assertJsonResponse($response, $statusCode);

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