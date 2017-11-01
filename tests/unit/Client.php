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

use Glpi\Api\Rest\ErrorHandler;
use Glpi\Api\Rest\tests\BaseTestCase;

/**
 * @engine inline
 */
class Client extends BaseTestCase {

   private $httpClient;

   private $mailMessages = [
      'emailSentMessage' => 'An email has been sent to your email address.',
      'invalidTokenMessage' => 'Your password reset request has expired or is invalid.',
      'successMessage' => 'Reset password successful.',
      'emailNotFound' => 'Email address not found.',
   ];

   public function setUp() {
      $this->httpClient = new \GuzzleHttp\Client();
   }

   /**
    * @tags testInitSession
    */
   public function testInitSession() {
      $client = $this->newTestedInstance(GLPI_URL, $this->httpClient);

      // Test invalid credentials
      $this->exception(function () use ($client) {
         $client->initSessionByCredentials('glpi', 'bad password');
      })->hasMessage(ErrorHandler::getMessage('ERROR_GLPI_LOGIN'));

      // Test valid credentials
      $success = $client->initSessionByCredentials('glpi', 'glpi');
      $this->boolean($success)->isTrue();

      // Test invalid credentials for user token
      $this->exception(function () use ($client) {
         $client->initSessionByUserToken('loremIpsum');
      })->hasMessage(ErrorHandler::getMessage('ERROR_LOGIN_PARAMETERS_MISSING'));

      // Test valid credentials for user token
      $usertoken = '10r3mIp5umT0k3n';
      $mocked = $this->newMockInstance('Glpi\Api\Rest\Client', null, null,
         [GLPI_URL, $this->httpClient]);
      $mocked->getMockController()->request = $this->mockedResponse(parent::HTTP_OK,
         ['session_token' => '' . $usertoken . '']);
      $success = $mocked->initSessionByUserToken($usertoken);
      $this->boolean($success)->isTrue();
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
      })->hasMessage(ErrorHandler::getMessage('ERROR_SESSION_TOKEN_INVALID'));
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
    * @tags testRecoveryPassword
    */
   public function testRecoveryPassword() {
      $httpClient = $this->mockedHttpClient([
         $this->mockedResponse(parent::HTTP_BAD_REQUEST,
            ['ERROR', $this->mailMessages['emailNotFound']]),
         $this->mockedResponse(parent::HTTP_OK,
            [$this->mailMessages['emailSentMessage']]),
      ]);
      $this->newTestedInstance(GLPI_URL, $httpClient);
      $client = $this->testedInstance;

      // check for bad request
      $response = $client->recoveryPassword('lorem@ipsum.test');
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);
      $this->string(json_decode($response['body'])[1])->isEqualTo($this->mailMessages['emailNotFound']);

      // check for "valid" request for email notification
      $response = $client->recoveryPassword('lorem@ipsum.test');
      $this->assertJsonResponse($response);
      $this->string(json_decode($response['body'])[0])->isEqualTo($this->mailMessages['emailSentMessage']);
   }

   /**
    * @tags testResetPassword
    */
   public function testResetPassword() {
      $httpClient = $this->mockedHttpClient([
         $this->mockedResponse(parent::HTTP_BAD_REQUEST,
            ['ERROR', $this->mailMessages['invalidTokenMessage']]),
         $this->mockedResponse(parent::HTTP_OK,
            [$this->mailMessages['successMessage']]),
      ]);
      $client = $this->newTestedInstance(GLPI_URL, $httpClient);

      // check for missing params request
      $this->exception(function () use ($client) {
         $client->resetPassword('lorem@ipsum.test', 'lorem', '');
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGUMENTS'));

      $this->exception(function () use ($client) {
         $client->resetPassword('lorem@ipsum.test', '', 'lorem');
      })->hasMessage(ErrorHandler::getMessage('ERROR_APILIB_ARGUMENTS'));

      // check for "invalid" request for reset password
      $response = $client->resetPassword('lorem@ipsum.test', 'invalidToken', 'newFakePassword');
      $this->assertJsonResponse($response, parent::HTTP_BAD_REQUEST);
      $this->string(json_decode($response['body'])[1])->isEqualTo($this->mailMessages['invalidTokenMessage']);

      // check for "valid" request for reset password
      $response = $client->resetPassword('lorem@ipsum.test', 'm0ck3dT0k3n', 'newFakePassword');
      $this->assertJsonResponse($response);
      $this->string(json_decode($response['body'])[0])->isEqualTo($this->mailMessages['successMessage']);
   }

   /**
    * @tags testConnectionIssues
    */
   public function testConnectionIssues() {
      $errors = [
         'ERROR_API_DISABLED' => ['ERROR', 'API disabled'],
         'ERROR_NOT_ALLOWED_IP' => [
            'ERROR_NOT_ALLOWED_IP',
            "There isn't an active api client matching your ip adress in the configuration (::1)",
         ],
         'ERROR_HTML' => "<h1>Object not found!</h1>",
      ];
      $httpClient = $this->mockedHttpClient([
         $this->mockedResponse(parent::HTTP_BAD_REQUEST,
            $errors['ERROR_NOT_ALLOWED_IP']),
         $this->mockedResponse(parent::HTTP_NOT_FOUND,
            $errors['ERROR_HTML'], ['Content-Type' => 'text/html; charset=utf-8'], false),
         $this->mockedResponse(parent::HTTP_INTERNAL_SERVER_ERROR,
            $errors['ERROR_API_DISABLED']),
      ]);
      $this->newTestedInstance(GLPI_URL, $httpClient);

      // check for invalid IP access
      $response = $this->testedInstance->request('get', '/someEndPoint/');
      $this->given($response)
         ->integer($response->getStatusCode())->isEqualTo(parent::HTTP_BAD_REQUEST)
         ->json($contents = $response->getBody()->getContents())
         ->string(json_decode($contents)[1])->isEqualTo($errors['ERROR_NOT_ALLOWED_IP'][1]);

      // check for invalid URL access
      $response = $this->testedInstance->request('get', 'http://bad.url/someEndPoint/');$this->given($response)
         ->integer($response->getStatusCode())->isEqualTo(parent::HTTP_NOT_FOUND)
         ->string($response->getHeaderLine('Content-Type'))->isEqualTo('text/html; charset=utf-8')
         ->string($response->getBody()->getContents())->isEqualTo($errors['ERROR_HTML']);

      // check for default value, api disabled
      $response = $this->testedInstance->request('get', '/someEndPoint/');
      $this->given($response)
         ->integer($response->getStatusCode())->isEqualTo(parent::HTTP_INTERNAL_SERVER_ERROR)
         ->json($contents = $response->getBody()->getContents())
         ->string(json_decode($contents)[1])->isEqualTo($errors['ERROR_API_DISABLED'][1]);
   }

}