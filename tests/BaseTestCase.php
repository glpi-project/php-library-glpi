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