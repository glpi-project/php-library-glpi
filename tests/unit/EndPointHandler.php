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
      $this->client->killSession();
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
}