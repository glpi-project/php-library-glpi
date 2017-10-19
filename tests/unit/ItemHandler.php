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
class ItemHandler extends BaseTestCase {

   public function setUp() {
      $this->loginSuperAdmin();
   }

   /**
    * @tags testGetAnItem
    */
   public function testGetAnItem() {
      $this->newTestedInstance($this->client);

      // check for valid returned data
      $userId = 2;
      $response = $this->testedInstance->getAnItem('User', $userId);
      $this->assertJsonResponse($response);
      $stdClass = json_decode($response['body']);
      $this->object($stdClass)
         ->integer($stdClass->id)->isEqualTo($userId)
         ->array($stdClass->links)->isNotEmpty();

      // check for invalid item
      $response = $this->testedInstance->getAnItem('LoremIpsum', $userId);
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for valid query param
      $response = $this->testedInstance->getAnItem('User', $userId, ['expand_dropdowns' => true]);
      $this->assertJsonResponse($response);
      $stdClass = json_decode($response['body']);
      $this->object($stdClass)
         ->string($stdClass->entities_id)->isNotEmpty();
   }

   /**
    * @tags testGetAllItems
    */
   public function testGetAllItems() {
      $this->newTestedInstance($this->client);

      // check for valid returned data
      $userId = 2;
      $response = $this->testedInstance->getAllItems('User');
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->array($arrayOfStdClass)
         ->integer($arrayOfStdClass[0]->id)->isEqualTo($userId)
         ->integer($arrayOfStdClass[1]->id)->isEqualTo($userId + 1);

      // check if extra headers are valid
      $this->boolean(key_exists('contentRange', $response))->isTrue()
         ->string($response['contentRange'])->isEqualTo('0-20/5');

      $this->boolean(key_exists('acceptRange', $response))->isTrue()
         ->string($response['acceptRange'])->isEqualTo('User 1000');

      // check for invalid itemType
      $response = $this->testedInstance->getAllItems('LoremIpsum');
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for valid query param
      $response = $this->testedInstance->getAllItems('User', ['expand_dropdowns' => true]);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->object($arrayOfStdClass[0])
         ->string($arrayOfStdClass[0]->entities_id)->isEqualTo('Root entity');

      // check for partial content
      $response = $this->testedInstance->getAllItems('User', ['range' => '1-2']);
      $this->assertJsonResponse($response, parent::HTTP_PARTIAL_CONTENT);
   }

   /**
    * @tags testGetSubItems
    */
   public function testGetSubItems() {
      $this->newTestedInstance($this->client);

      // check for valid returned data
      /*$userId = 2;
      $response = $this->testedInstance->getSubItems('User', $userId, 'Log');
      var_dump($response);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->array($arrayOfStdClass)
         ->integer($arrayOfStdClass[0]->items_id)->isEqualTo($userId)
         ->string($arrayOfStdClass[1]->itemtype)->isEqualTo('User');

      // check if extra headers are valid
      $this->boolean(key_exists('contentRange', $response))->isTrue()
         ->string($response['contentRange'])->isEqualTo('0-50/200');

      $this->boolean(key_exists('acceptRange', $response))->isTrue()
         ->string($response['acceptRange'])->isEqualTo('User 1000');

      // check for invalid itemType
      $response = $this->testedInstance->getSubItems('Lorem', 2, 'Ipsum');
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for valid query param
      $response = $this->testedInstance->getSubItems('User', 2, 'Log', ['expand_dropdowns' => true]);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->object($arrayOfStdClass[0])
         ->string($arrayOfStdClass[0]->entities_id)->isEqualTo('Root entity');

      // check for partial content
      $response = $this->testedInstance->getSubItems('User', 2, 'Log', ['range' => '1-2']);
      $this->assertJsonResponse($response, parent::HTTP_PARTIAL_CONTENT);*/
   }

   /**
    * @tags testGetAllItems
    */
   public function testGetMultipleItems() {
      $this->newTestedInstance($this->client);

      // check for valid returned data
      $userId = 2;
      $response = $this->testedInstance->getMultipleItems('User');
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->array($arrayOfStdClass)
         ->integer($arrayOfStdClass[0]->id)->isEqualTo($userId)
         ->integer($arrayOfStdClass[1]->id)->isEqualTo($userId + 1);

      // check if extra headers are valid
      $this->boolean(key_exists('contentRange', $response))->isTrue()
         ->string($response['contentRange'])->isEqualTo('0-20/5');

      $this->boolean(key_exists('acceptRange', $response))->isTrue()
         ->string($response['acceptRange'])->isEqualTo('User 1000');

      // check for invalid itemType
      $response = $this->testedInstance->getAllItems('LoremIpsum');
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for valid query param
      $response = $this->testedInstance->getAllItems('User', ['expand_dropdowns' => true]);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->object($arrayOfStdClass[0])
         ->string($arrayOfStdClass[0]->entities_id)->isEqualTo('Root entity');

      // check for partial content
      $response = $this->testedInstance->getAllItems('User', ['range' => '1-2']);
      $this->assertJsonResponse($response, parent::HTTP_PARTIAL_CONTENT);
   }
}