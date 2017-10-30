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

namespace Glpi\Api\Rest;

use GuzzleHttp\Client as HttpClient;
use Exception;
use Glpi\Api\Rest\Exception\InsufficientArgumentsException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

/**
 * Class Client
 * @package Glpi\Api\Rest
 */
class Client {

   /** @var HttpClient instance of the HTTP client */
   private $httpClient = null;

   /** @var string URL to the GLPI API rest */
   private $url;

   /** @var $appToken string an application token to use for requests */
   private $appToken = null;

   /** @var string Session token obtained after initSession() */
   private $sessionToken = null;

   /**
    * Client constructor.
    * @param string $url
    * @param HttpClient $httpClient
    */
   public function __construct($url, HttpClient $httpClient) {
      $this->httpClient = $httpClient;
      $this->url = trim($url, '/') . '/';
   }

   /**
    * Set an application token to be used for each request
    *
    * @param string $appToken
    */
   public function setAppToken($appToken = null) {
      $this->appToken = $appToken;
   }

   /**
    * Initialize a session with user credentials
    * @param string $user
    * @param string $password
    * @throws Exception
    * @return boolean
    */
   public function initSessionByCredentials($user, $password) {
      $response = $this->request('get', 'initSession', ['auth' => [$user, $password]]);
      if ($response->getStatusCode() != 200
         || !$this->sessionToken = json_decode($response->getBody()->getContents(), true)['session_token']) {
         $body = json_decode($response->getBody()->getContents());
         throw new Exception(ErrorHandler::getMessage($body[0]));
      }
      return true;
   }

   /**
    * initialize a session with a user token
    *
    * @param string $userToken
    *
    * @throws Exception
    *
    * @return boolean True if success
    */
   public function initSessionByUserToken($userToken) {
      $response = $this->request('get', 'initSession', ['Authorization' => "user_token $userToken"]);
      if ($response->getStatusCode() != 200
         || !$this->sessionToken = json_decode($response->getBody()->getContents(), true)['session_token']) {
         $body = json_decode($response->getBody()->getContents());
         throw new Exception(ErrorHandler::getMessage($body[0]));
      }
      return true;
   }

   /**
    * Kill client session.
    * @return bool
    * @throws Exception
    */
   public function killSession() {
      $response = $this->request('get', 'killSession');
      if ($response->getStatusCode() != 200) {
         $body = json_decode($response->getBody()->getContents());
         throw new Exception(ErrorHandler::getMessage($body[0]));
      }
      return true;
   }

   /**
    * Prepare and send a request to the GLPI Api.
    *
    * @param $method
    * @param $uri
    * @param array $options
    * @return mixed|null|\Psr\Http\Message\ResponseInterface
    * @throws Exception
    */
   public function request($method, $uri, array $options = []) {
      $apiToken = $this->addTokens();
      try {
         $options['headers']['Content-Type'] = "application/json";
         if ($apiToken) {
            $sessionHeaders = ['Session-Token' => $apiToken['Session-Token']];
            if (key_exists('App-Token', $apiToken)) {
               $sessionHeaders['App-Token'] = $apiToken['App-Token'];
            }
            $options = array_merge_recursive($options, ['headers' => $sessionHeaders]);
         }
         $response = $this->httpClient->request($method, $this->url . $uri, $options);
         return $response;
      } catch (ClientException $e) {
         $response = $e->getResponse();
         /*$body = $response->getBody()->getContents();
         $reasonPhrase = $response->getReasonPhrase() . (($body) ? ' ' . $body : '');*/
         return $response;
      } catch (RequestException $e) {
         $hasResponse = $e->hasResponse();
         $statusCode = ($hasResponse) ? $e->getResponse()->getStatusCode() : '500';
         $contents = ($hasResponse) ? $e->getResponse()->getReasonPhrase() : 'Request Error';
         throw new Exception($contents, $statusCode);
      }
   }

   /**
    * Return the current php $_SESSION.
    * @return array
    */
   public function getFullSession() {
      $response = $this->request('get', 'getFullSession');
      return ['statusCode' => $response->getStatusCode(), 'body' => $response->getBody()->getContents()];
   }

   /**
    * Return the current $CFG_GLPI.
    * @return array
    */
   public function getGlpiConfig() {
      $response = $this->request('get', 'getGlpiConfig');
      return ['statusCode' => $response->getStatusCode(), 'body' => $response->getBody()->getContents()];
   }

   /**
    * generate headers containing session and app tokens for Http client object
    *
    * @return string[]
    */
   private function addTokens() {
      $headers = [];
      if ($this->appToken !== null) {
         $headers['App-Token'] = $this->appToken;
      }
      if ($this->sessionToken !== null) {
         $headers['Session-Token'] = $this->sessionToken;
      }

      return $headers;
   }

   /**
    * Allows to request password recovery.
    * This endpoint works under the following conditions:
    *  - GLPI has notifications enabled
    *  - The email address of the user belongs to a user account.
    *
    * @param string $email
    * @return array
    */
   public function recoveryPassword($email) {
      $options['body'] = json_encode($params['email'] = $email);
      $response = $this->request('put', 'lostPassword', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Allows to request a password reset.
    * This endpoint works under the following conditions:
    *  - GLPI has notifications enabled
    *  - The email address of the user belongs to a user account.
    *
    * @param $email
    * @param string $recoveryToken
    * @param string $newPassword
    * @return array
    */
   public function resetPassword($email, $recoveryToken, $newPassword) {
      if (($recoveryToken && !$newPassword) || (!$recoveryToken && $newPassword)) {
         throw new InsufficientArgumentsException(ErrorHandler::getMessage('ERROR_APILIB_ARGUMENTS'));
      }
      $options['body'] = json_encode([
         'email' => $email,
         'password_forget_token' => $recoveryToken,
         'password' => $newPassword,
      ]);
      $response = $this->request('put', 'lostPassword', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }
}
