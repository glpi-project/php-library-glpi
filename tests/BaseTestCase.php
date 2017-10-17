<?php

namespace GlpiProject\API\Rest\tests;

use atoum;
use GlpiProject\API\Rest\Client;

class BaseTestCase extends atoum {

   const HTTP_OK = 200;
   const HTTP_CREATED = 201;
   const HTTP_NO_CONTENT = 204;
   const HTTP_PARTIAL_CONTENT = 206;
   const HTTP_MULTI_STATUS = 207;          // RFC4918
   const HTTP_BAD_REQUEST = 400;
   const HTTP_UNAUTHORIZED = 401;
   const HTTP_PAYMENT_REQUIRED = 402;
   const HTTP_FORBIDDEN = 403;
   const HTTP_NOT_FOUND = 404;
   const HTTP_METHOD_NOT_ALLOWED = 405;
   const HTTP_REQUEST_TIMEOUT = 408;
   const HTTP_INTERNAL_SERVER_ERROR = 500;
   const HTTP_NOT_IMPLEMENTED = 501;
   const HTTP_BAD_GATEWAY = 502;
   const HTTP_SERVICE_UNAVAILABLE = 503;
   const HTTP_GATEWAY_TIMEOUT = 504;
   const HTTP_VERSION_NOT_SUPPORTED = 505;


   /**
    * @var Client
    */
   protected $client;

   /**
    * login via api with super user privileges
    */
   public function loginSuperAdmin() {
      $this->client = new Client(GLPI_URL);
      $this->client->initSessionByCredentials('glpi', 'glpi');
   }

   /**
    * @param array $response
    * @param integer $statusCode http
    * @return array assertion of atoum
    */
   protected function assertJsonResponse($response, $statusCode = 200) {
      $this->array($response)->integer['statusCode']->isEqualTo($statusCode);
      if (key_exists('body', $response) && $response['body']) {
         $this->json($response['body']);
      }
   }
}