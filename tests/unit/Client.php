<?php

namespace GlpiProject\API\Rest\tests\units;

use atoum;

class Client extends atoum {

   /**
    * @engine inline
    */
   public function testInitSession() {
      $client = $this->newTestedInstance(GLPI_URL);

      // Test invalid credentials
      $this->exception(function() use ($client) {
         $client->initSessionByCredentials('glpi', 'bad password');
      })->isInstanceOf(\GuzzleHttp\Exception\ClientException::class);

      // Test valid credentials
      $success = $client->initSessionByCredentials('glpi', 'glpi');
      $this->boolean($success)->isTrue();
   }

   /**
    * @engine inline
    */
   public function testComputer() {
      $client = $this->newTestedInstance(GLPI_URL);
      $this->boolean($client->initSessionByCredentials('glpi', 'glpi'))->isTrue();

      $response = $client->computer('post', ['name' => 'computer 0001']);
      $this->object($response)->isInstanceOf(\Psr\Http\Message\ResponseInterface::class);
   }

   /**
    * @engine inline
    * @tags testGetFullSession
    */
   public function testGetFullSession() {
      $client = $this->newTestedInstance(GLPI_URL);
      $client->initSessionByCredentials('glpi', 'glpi');

      $response = $client->getFullSession();
      $this->array($response)
         ->integer['statusCode']->isEqualTo(200)
         ->string['body']->isNotEmpty()->given($json = $response['body'])->then->json($json);
   }

}