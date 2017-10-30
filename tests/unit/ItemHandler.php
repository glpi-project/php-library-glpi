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

use Glpi\Api\Rest\ErrorHandler;
use Glpi\Api\Rest\tests\BaseTestCase;

/**
 * @engine inline
 */
class ItemHandler extends BaseTestCase {

   public function setUp() {
      $this->loginSuperAdmin();
   }

   /**
    * @tags testGetItem
    */
   public function testGetItem() {
      $this->newTestedInstance($this->client);

      // check for valid returned data
      $userId = 2;
      $response = $this->testedInstance->getItem('User', $userId);
      $this->assertJsonResponse($response);
      $stdClass = json_decode($response['body']);
      $this->object($stdClass)
         ->integer($stdClass->id)->isEqualTo($userId)
         ->array($stdClass->links)->isNotEmpty();

      // check for invalid item
      $response = $this->testedInstance->getItem('LoremIpsum', $userId);
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for valid query param
      $response = $this->testedInstance->getItem('User', $userId, ['expand_dropdowns' => true]);
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
      $this->given($arrayOfStdClass)
         ->integer($arrayOfStdClass[0]->id)->isEqualTo($userId)
         ->integer($arrayOfStdClass[1]->id)->isEqualTo($userId + 1);

      // check if extra headers are valid
      $this->boolean(key_exists('contentRange', $response))->isTrue()
         ->string($response['contentRange'])->match('#\d+?-\d+?\/\d+?#');

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
      $testedInstance = $this->testedInstance;

      // Let's ensure than exists at least one simple subItem
      $userId = 2;
      $testEmail = 'get.sub@item.test';
      $testedInstance->addItems('UserEmail', ['users_id' => $userId, 'email' => $testEmail]);

      // check for valid returned data
      $response = $this->testedInstance->getSubItems('User', $userId, 'UserEmail');
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->given($arrayOfStdClass)
         ->integer($arrayOfStdClass[0]->users_id)->isEqualTo($userId)
         ->string($arrayOfStdClass[0]->email)->isEqualTo($testEmail);

      // check if extra headers are valid
      $this->boolean(key_exists('contentRange', $response))->isTrue()
         ->string($response['contentRange'])->match('#\d+?-\d+?\/\d+?#');

      $this->boolean(key_exists('acceptRange', $response))->isTrue()
         ->string($response['acceptRange'])->isEqualTo('UserEmail 1000');

      // check for invalid itemType
      $response = $this->testedInstance->getSubItems('Lorem', 2, 'Ipsum');
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for valid query param
      $response = $this->testedInstance->getSubItems('User', 2, 'UserEmail',
         ['expand_dropdowns' => true]);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->object($arrayOfStdClass[0])
         ->string($arrayOfStdClass[0]->users_id)->isEqualTo('glpi');

      // check for partial content
      $response = $this->testedInstance->getSubItems('User', 2, 'UserEmail', ['range' => '1-2']);
      $this->assertJsonResponse($response, parent::HTTP_PARTIAL_CONTENT);
   }

   /**
    * @tags testGetMultipleItems
    */
   public function testGetMultipleItems() {
      $this->newTestedInstance($this->client);
      $testedInstance = $this->testedInstance;

      // check for valid returned data
      $userId = 2;
      $entityId = 0;
      $items = [
         ['itemtype' => 'User', 'items_id' => $userId],
         ['itemtype' => 'Entity', 'items_id' => $entityId],
      ];
      $response = $testedInstance->getMultipleItems($items);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->array($arrayOfStdClass)
         ->integer($arrayOfStdClass[0]->id)->isEqualTo($userId)
         ->integer($arrayOfStdClass[1]->id)->isEqualTo($entityId);

      // check for valid query param
      $response = $testedInstance->getMultipleItems($items, ['expand_dropdowns' => true]);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->object($arrayOfStdClass[0])
         ->string($arrayOfStdClass[0]->entities_id)->isEqualTo('Root entity');

      // check for invalid itemType
      $items[0]['itemtype'] = 'loremIpsum';
      $this->exception(function () use ($testedInstance, $items) {
         $testedInstance->getMultipleItems($items);
      })->hasCode(parent::HTTP_INTERNAL_SERVER_ERROR);

      // check for missing itemType
      $tempValue = $items[0]['itemtype'] = 'User';
      unset($items[0]['itemtype']);
      $this->exception(function () use ($testedInstance, $items) {
         $testedInstance->getMultipleItems($items);
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY',
         "'itemtype' and 'items_id'"));
      $items[0]['itemtype'] = $tempValue;

      // check for invalid items_id
      $items[0]['items_id'] = 'loremIpsum';
      $response = $testedInstance->getMultipleItems($items);
      $this->assertJsonResponse($response, parent::HTTP_NOT_FOUND);

      // check for missing items_id
      $tempValue = $items[0]['items_id'] = 2;
      unset($items[0]['items_id']);
      $this->exception(function () use ($testedInstance, $items) {
         $testedInstance->getMultipleItems($items);
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY',
         "'itemtype' and 'items_id'"));
      $items[0]['items_id'] = $tempValue;

      // TODO: check for 401 error.
   }

   /**
    * @tags testUpdateItems
    */
   public function testUpdateItems() {
      $this->newTestedInstance($this->client);
      $testedInstance = $this->testedInstance;

      // check for bad request code
      $response = $testedInstance->updateItems('Lorem', 1, ['name' => 'glpi']);
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for update one item
      $userId = 2;
      $items = ['phone' => '555123'];
      $response = $testedInstance->updateItems('User', $userId, $items);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->given($arrayOfStdClass)
         ->boolean(property_exists($arrayOfStdClass[0], $userId))->isTrue()
         ->boolean($arrayOfStdClass[0]->{$userId})->isTrue()
         ->boolean(property_exists($arrayOfStdClass[0], 'message'))->isTrue()
         ->string($arrayOfStdClass[0]->message)->isEmpty();

      // check for missing id
      $this->exception(function () use ($testedInstance) {
         $testedInstance->updateItems('User', '', []); // empty array
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY',
         "'id' to identify the item"));

      $this->exception(function () use ($testedInstance, $items) {
         $testedInstance->updateItems('User', '', [$items]);
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY',
         "'id' to identify the item"));

      // check for update multiple items
      $items = [['id' => $userId, 'phone' => '555123'], ['id' => 3, 'phone' => '555123']];
      $response = $testedInstance->updateItems('User', '', $items);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->given($arrayOfStdClass)
         ->boolean(property_exists($arrayOfStdClass[0], $userId))->isTrue()
         ->boolean($arrayOfStdClass[0]->{$userId})->isTrue()
         ->boolean(property_exists($arrayOfStdClass[0], 'message'))->isTrue()
         ->string($arrayOfStdClass[0]->message)->isEmpty();

      // check for a multi-status code
      $items = [['id' => $userId, 'phone' => '555123'], ['id' => 0, 'phone' => '555123']];
      $response = $testedInstance->updateItems('User', '', $items);
      $this->assertJsonResponse($response, parent::HTTP_MULTI_STATUS);
   }

   /**
    * @tags testAddItems
    */
   public function testAddItems() {
      $this->newTestedInstance($this->client);
      $testedInstance = $this->testedInstance;

      // check for bad request code
      $response = $testedInstance->addItems('Lorem', []);
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for single add
      $items = ['name' => 'add-me', 'password' => 'P455w0rd'];
      $response = $testedInstance->addItems('User', $items);
      $this->assertJsonResponse($response, parent::HTTP_CREATED);
      $this->given($response)
         ->boolean(key_exists('location', $response))->isTrue()
         ->string($response['location'])->isNotEmpty()
         ->boolean(key_exists('link', $response))->isTrue()
         ->variable($response['link'])->isNull();

      // check for bulk add
      $items = [
         ['name' => 'add-me-1', 'password' => 'P455w0rd'],
         ['name' => 'add-me-2', 'password' => 'P455w0rd'],
      ];
      $response = $testedInstance->addItems('User', $items);
      $this->assertJsonResponse($response, parent::HTTP_CREATED);
      $arrayOfStdClass = json_decode($response['body']);
      $this->given($arrayOfStdClass)
         ->boolean(property_exists($arrayOfStdClass[0], 'id'))->isTrue()
         ->integer($arrayOfStdClass[0]->id)
         ->boolean(property_exists($arrayOfStdClass[0], 'message'))->isTrue()
         ->string($arrayOfStdClass[0]->message)->isEmpty();
      $this->given($response)
         ->boolean(key_exists('location', $response))->isTrue()
         ->variable($response['location'])->isNull()
         ->boolean(key_exists('link', $response))->isTrue()
         ->string($response['link'])->isNotEmpty();

      // check for multi-status
      $items = [
         ['users_id' => -1, 'email' => 'lorem@ipsum.test'],
         ['users_id' => 2, 'email' => 'lorem@ipsum.test'],
      ];
      $response = $testedInstance->addItems('UserEmail', $items);
      $this->assertJsonResponse($response, parent::HTTP_MULTI_STATUS);
      $arrayOfStdClass = json_decode($response['body']);
      $this->given($arrayOfStdClass)
         ->variable($arrayOfStdClass[0])->isEqualTo('ERROR_GLPI_PARTIAL_ADD');
   }

   /**
    * @tags testDeleteItems
    */
   public function testDeleteItems() {
      $this->newTestedInstance($this->client);
      $testedInstance = $this->testedInstance;

      // check for missing id
      $this->exception(function () use ($testedInstance) {
         $testedInstance->deleteItems('User', '', []); // empty array
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY',
         "'id' to identify the item"));

      $this->exception(function () use ($testedInstance) {
         $testedInstance->deleteItems('User', '', [[]]); // array with invalid sub-array.
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY',
         "'id' to identify the item"));

      // check for bad request code
      $response = $testedInstance->deleteItems('User', -1);
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // Let's create first the tested data
      $response = $testedInstance->addItems('User', [
         ['name' => 'delete-me-forced', 'password' => 'P455w0rd'],
         ['name' => 'delete-me-1', 'password' => 'P455w0rd'],
         ['name' => 'delete-me-2', 'password' => 'P455w0rd'],
      ]);
      $usersCreated = json_decode($response['body']);

      // check for delete one item
      $userId = $usersCreated[0]->id;
      $response = $testedInstance->deleteItems('User', $userId);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->given($arrayOfStdClass)
         ->boolean(property_exists($arrayOfStdClass[0], $userId))->isTrue()
         ->boolean($arrayOfStdClass[0]->{$userId})->isTrue();

      // check for optional params
      $userId = $usersCreated[0]->id;
      $response = $testedInstance->deleteItems('User', $userId, [], ['force_purge' => true]);
      $this->assertJsonResponse($response);
      $response = $testedInstance->getItem('User', $userId);
      $this->assertJsonResponse($response, parent::HTTP_NOT_FOUND);

      // check for bulk deletion
      $userId = $usersCreated[1]->id;
      $items = [['id' => $userId], ['id' => $usersCreated[2]->id],];
      $response = $testedInstance->deleteItems('User', '', $items);
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->given($arrayOfStdClass)
         ->boolean(property_exists($arrayOfStdClass[0], $userId))->isTrue()
         ->boolean($arrayOfStdClass[0]->{$userId})->isTrue();

      // check for partial deletion
      $userId = -1;
      $items = [['id' => $userId], ['id' => $usersCreated[2]->id],];
      $response = $testedInstance->deleteItems('User', '', $items);
      $this->assertJsonResponse($response, parent::HTTP_MULTI_STATUS);
      $arrayOfStdClass = json_decode($response['body']);
      $this->given($arrayOfStdClass)
         ->variable($arrayOfStdClass[0])->isEqualTo('ERROR_GLPI_PARTIAL_DELETE');

      // check for bulk deletion with extra params
      $userId = $usersCreated[1]->id;
      $items = [['id' => $userId], ['id' => $usersCreated[2]->id],];
      $response = $testedInstance->deleteItems('User', '', $items, ['force_purge' => true]);
      $this->assertJsonResponse($response);
      $response = $testedInstance->getItem('User', $userId);
      $this->assertJsonResponse($response, parent::HTTP_NOT_FOUND);
   }

   /**
    * @tags testMagicCall
    */
   public function testMagicCall() {
      $this->newTestedInstance($this->client);
      $testedInstance = $this->testedInstance;

      // check for invalid itemType name
      $this->exception(function () use ($testedInstance) {
         $testedInstance->LoremIpsum('read', []);
      })->hasMessage("EndPoint 'LoremIpsum' is not valid. " . ErrorHandler::getMessage('ERROR_RESOURCE_NOT_FOUND_NOR_COMMONDBTM'));

      // check for invalid method name
      $this->exception(function () use ($testedInstance) {
         $testedInstance->User('loremIpsum', []);
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGUMENTS'));

      // check for missing arguments
      $this->exception(function () use ($testedInstance) {
         $testedInstance->User('read');
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGUMENTS'));

      // check for missing arguments
      $response = $testedInstance->User('read', 2);
      $this->assertJsonResponse($response);
      $stdClass = json_decode($response['body']);
      $this->given($stdClass)->integer($stdClass->id);
   }
}