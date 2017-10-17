<?php

namespace GlpiProject\API\Rest\tests\units;

use GlpiProject\API\Rest\tests\BaseTestCase;

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