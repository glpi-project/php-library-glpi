<?php
/**
 * Created by PhpStorm.
 * User: Domingo Oropeza
 * Date: 18-10-2017
 * Time: 02:24 PM
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