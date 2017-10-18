<?php

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
      $this->given($this->newTestedInstance($this->client))->then
         ->array($response = $this->testedInstance->getMyProfiles());
      $this->assertJsonResponse($response);
   }

   /**
    * @tags testGetActiveProfile
    */
   public function testGetActiveProfile() {
      $this->given($this->newTestedInstance($this->client))->then
         ->array($response = $this->testedInstance->getActiveProfile());
      $this->assertJsonResponse($response);
   }

   /**
    * @tags testChangeActiveProfile
    */
   public function testChangeActiveProfile() {
      $this->newTestedInstance($this->client);
      $currentProfile = json_decode($this->testedInstance->getActiveProfile()['body']);

      // assert current profile with id
      $this->array($response = $this->testedInstance->changeActiveProfile($currentProfile->active_profile->id));
      $this->assertJsonResponse($response);

      // assert invalid profile
      $this->array($response = $this->testedInstance->changeActiveProfile(-1));
      $this->assertJsonResponse($response, parent::HTTP_NOT_FOUND);
   }

   /**
    * @tags testGetMyEntities
    */
   public function testGetMyEntities() {
      $this->given($this->newTestedInstance($this->client));
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
      $this->given($this->newTestedInstance($this->client))
         ->array($response = $this->testedInstance->getActiveEntities());
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
      $this->given($this->newTestedInstance($this->client));
      // check with no params (default behavior)
      $this->array($response = $this->testedInstance->changeActiveEntities())
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('true');

      // check for invalid entity param
      $this->array($response = $this->testedInstance->changeActiveEntities(['entities_id'=> -1]))
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('false');

      // check for invalid recursive param
      $this->array($response = $this->testedInstance->changeActiveEntities(['is_recursive'=> "lorem"]))
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('true'); // this could be a bug from glpi.

      $this->array($response = $this->testedInstance->changeActiveEntities(['entities_id'=> 0, 'is_recursive'=> "lorem"]))
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('true');

      // check for valid params with different default values
      $this->array($response = $this->testedInstance->changeActiveEntities(['entities_id'=> 0, 'is_recursive'=> true]))
         ->integer['statusCode']->isEqualTo(parent::HTTP_OK)
         ->string['body']->isEqualTo('true');
   }
}