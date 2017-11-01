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

namespace Glpi\Api\Rest\tests;

use atoum;
use Glpi\Api\Rest\Client;
use GuzzleHttp\Client as httpClient;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

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
      $this->client = new Client(GLPI_URL, new httpClient());
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

   /**
    * @param integer $httpStatusCode
    * @param string $body
    * @param array $extraHeaders
    * @param bool $jsonEncoded
    * @return Response
    */
   protected function mockedResponse($httpStatusCode, $body = '', $extraHeaders = [], $jsonEncoded = true) {
      $headers = [];
      if ($jsonEncoded) {
         $headers['Content-Type'] = 'application/json; charset=UTF-8';
         $body = json_encode($body);
      }
      if ($extraHeaders) {
         $headers = array_merge($headers, $extraHeaders);
      }
      return new Response($httpStatusCode, $headers, $body);
   }

   /**
    * Creates a queue of responses for testing
    * @see http://docs.guzzlephp.org/en/stable/testing.html
    *
    * @param array $queue of responses or exceptions
    * @return httpClient
    */
   protected function mockedHttpClient(array $queue) {
      $mock = new MockHandler($queue);
      $httpClient = new httpClient(['handler' => new HandlerStack($mock)]);
      return $httpClient;
   }
}