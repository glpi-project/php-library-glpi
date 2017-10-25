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

use Glpi\Api\Rest\tests\BaseTestCase;
use GuzzleHttp\Psr7\Response;

/**
 * @engine inline
 */
class Client extends BaseTestCase {

   /**
    * @tags testInitSession
    */
   public function testInitSession() {
      $client = $this->newTestedInstance(GLPI_URL);

      // Test invalid credentials
      $this->exception(function () use ($client) {
         $client->initSessionByCredentials('glpi', 'bad password');
      })->hasMessage('Cannot connect to api');

      // Test valid credentials
      $success = $client->initSessionByCredentials('glpi', 'glpi');
      $this->boolean($success)->isTrue();

      // Test invalid credentials for user token
      $this->exception(function () use ($client) {
         $client->initSessionByUserToken('loremIpsum');
      })->hasMessage('Cannot connect to api');

      // TODO: Test valid credentials for user token
      /*$response = $client->initSessionByUserToken('loremIpsum');
      $this->boolean($success)->isTrue();*/
   }

   /**
    * @tags testGetFullSession
    */
   public function testGetFullSession() {
      $this->loginSuperAdmin();
      $response = $this->client->getFullSession();
      $this->assertJsonResponse($response);
   }

   /**
    * @tags testKillSession
    */
   public function testKillSession() {
      $this->loginSuperAdmin();
      $client = $this->client;
      $response = $client->killSession();
      $this->boolean($response)->isTrue();

      // Test invalid kill session
      $this->exception(function () use ($client) {
         $client->killSession();
      })->hasMessage('session_token seems invalid');
   }


   /**
    * @tags testGetGlpiConfig
    */
   public function testGetGlpiConfig() {
      $this->loginSuperAdmin();
      $response = $this->client->getGlpiConfig();
      $this->assertJsonResponse($response);
      $arrayOfStdClass = json_decode($response['body']);
      $this->boolean(property_exists($arrayOfStdClass, 'cfg_glpi'))->isTrue();
   }

   /**
    * @tags testLostPassword
    */
   public function testLostPassword() {
      $mockedClient = new \mock\Glpi\Api\Rest\Client(GLPI_URL);

      // check for bad request
      $response = $mockedClient->lostPassword('lorem@ipsum.test');
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);

      // check for missing params request
      $this->exception(function () use ($mockedClient) {
         $mockedClient->lostPassword('lorem@ipsum.test', 'lorem');
      })->hasMessage('The recovery and new password are mandatory');

      $this->exception(function () use ($mockedClient) {
         $mockedClient->lostPassword('lorem@ipsum.test', '', 'lorem');
      })->hasMessage('The recovery and new password are mandatory');

      // as we can't check for the email message let's mock the response.
      $messages = [
         'emailSentMessage' => 'An email has been sent to your email address.',
         'invalidTokenMessage' => 'Your password reset request has expired or is invalid.',
         'successMessage' => 'Reset password successful.',
      ];

      // check for "valid" request for email notification
      $mockedClient->getMockController()->request = $this->changeMockedResponse(parent::HTTP_OK,
         $messages['emailSentMessage']);
      $response = $mockedClient->lostPassword('lorem@ipsum.test');
      $this->assertJsonResponse($response);
      $this->string(json_decode($response['body'])[0])->isEqualTo($messages['emailSentMessage']);

      // check for "invalid" request for reset password
      $mockedClient->getMockController()->request = $this->changeMockedResponse(parent::HTTP_BAD_REQUEST,
         $messages['invalidTokenMessage']);
      $response = $mockedClient->lostPassword('lorem@ipsum.test', 'invalidToken',
         'newFakePassword');
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);
      $this->string(json_decode($response['body'])[0])->isEqualTo($messages['invalidTokenMessage']);

      // check for "valid" request for reset password
      $mockedClient->getMockController()->request = $this->changeMockedResponse(parent::HTTP_OK,
         $messages['successMessage']);
      $response = $mockedClient->lostPassword('lorem@ipsum.test', 'm0ck3dT0k3n', 'newFakePassword');
      $this->assertJsonResponse($response);
      $this->string(json_decode($response['body'])[0])->isEqualTo($messages['successMessage']);
   }

   /**
    * @param integer $httpStatusCode
    * @param string $messages
    * @return Response
    */
   private function changeMockedResponse($httpStatusCode, $messages) {
      return new Response($httpStatusCode,
         ['Content-Type' => 'application/json; charset=UTF-8'],
         json_encode([$messages]));
   }
}