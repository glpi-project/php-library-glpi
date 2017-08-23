<?php
namespace GlpiProject\API\Rest\tests\units;
use atoum;
use GuzzleHttp\Client as HttpClient;

class Client extends atoum {

   public function testInitSession() {
      $client = $this->newTestedInstance(new HttpClient(), GLPI_URL);
      $success = $client->initSessionByCredentials('glpi', 'glpi');
      $this->boolean($success)->isTrue();
   }

}