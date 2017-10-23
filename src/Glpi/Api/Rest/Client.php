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
use Glpi\Api\Rest\Exception\BadEndpointException;
use Glpi\Api\Rest\Exception\InsufficientArgumentsException;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\RequestException;

/**
 * @method Alert(string $method, array $input, array $params = [])
 * @method APIClient(string $method, array $input, array $params = [])
 * @method AuthLDAP(string $method, array $input, array $params = [])
 * @method AuthLdapReplicate(string $method, array $input, array $params = [])
 * @method AuthMail(string $method, array $input, array $params = [])
 * @method AutoUpdateSystem(string $method, array $input, array $params = [])
 * @method Blacklist(string $method, array $input, array $params = [])
 * @method BlacklistedMailContent(string $method, array $input, array $params = [])
 * @method Budget(string $method, array $input, array $params = [])
 * @method BudgetType(string $method, array $input, array $params = [])
 * @method BusinessCriticity(string $method, array $input, array $params = [])
 * @method Calendar_Holiday(string $method, array $input, array $params = [])
 * @method Calendar(string $method, array $input, array $params = [])
 * @method CalendarSegment(string $method, array $input, array $params = [])
 * @method Cartridge(string $method, array $input, array $params = [])
 * @method CartridgeItem_PrinterModel(string $method, array $input, array $params = [])
 * @method CartridgeItem(string $method, array $input, array $params = [])
 * @method CartridgeItemType(string $method, array $input, array $params = [])
 * @method Certificate_Item(string $method, array $input, array $params = [])
 * @method Certificate(string $method, array $input, array $params = [])
 * @method CertificateType(string $method, array $input, array $params = [])
 * @method Change_Group(string $method, array $input, array $params = [])
 * @method Change_Item(string $method, array $input, array $params = [])
 * @method Change_Problem(string $method, array $input, array $params = [])
 * @method Change_Project(string $method, array $input, array $params = [])
 * @method Change_Supplier(string $method, array $input, array $params = [])
 * @method Change_Ticket(string $method, array $input, array $params = [])
 * @method Change_User(string $method, array $input, array $params = [])
 * @method Change(string $method, array $input, array $params = [])
 * @method ChangeCost(string $method, array $input, array $params = [])
 * @method ChangeTask(string $method, array $input, array $params = [])
 * @method ChangeValidation(string $method, array $input, array $params = [])
 * @method Computer_Item(string $method, array $input, array $params = [])
 * @method Computer_SoftwareLicense(string $method, array $input, array $params = [])
 * @method Computer_SoftwareVersion(string $method, array $input, array $params = [])
 * @method Computer(string $method, array $input, array $params = [])
 * @method ComputerAntivirus(string $method, array $input, array $params = [])
 * @method ComputerDisk(string $method, array $input, array $params = [])
 * @method ComputerModel(string $method, array $input, array $params = [])
 * @method ComputerType(string $method, array $input, array $params = [])
 * @method ComputerVirtualMachine(string $method, array $input, array $params = [])
 * @method Config(string $method, array $input, array $params = [])
 * @method Consumable(string $method, array $input, array $params = [])
 * @method ConsumableItem(string $method, array $input, array $params = [])
 * @method ConsumableItemType(string $method, array $input, array $params = [])
 * @method Contact_Supplier(string $method, array $input, array $params = [])
 * @method Contact(string $method, array $input, array $params = [])
 * @method ContactType(string $method, array $input, array $params = [])
 * @method Contract_Item(string $method, array $input, array $params = [])
 * @method Contract_Supplier(string $method, array $input, array $params = [])
 * @method Contract(string $method, array $input, array $params = [])
 * @method ContractCost(string $method, array $input, array $params = [])
 * @method ContractType(string $method, array $input, array $params = [])
 * @method Control(string $method, array $input, array $params = [])
 * @method CronTask(string $method, array $input, array $params = [])
 * @method CronTaskLog(string $method, array $input, array $params = [])
 * @method DeviceBattery(string $method, array $input, array $params = [])
 * @method DeviceBatteryModel(string $method, array $input, array $params = [])
 * @method DeviceBatteryType(string $method, array $input, array $params = [])
 * @method DeviceCase(string $method, array $input, array $params = [])
 * @method DeviceCaseModel(string $method, array $input, array $params = [])
 * @method DeviceCaseType(string $method, array $input, array $params = [])
 * @method DeviceControl(string $method, array $input, array $params = [])
 * @method DeviceControlModel(string $method, array $input, array $params = [])
 * @method DeviceDrive(string $method, array $input, array $params = [])
 * @method DeviceDriveModel(string $method, array $input, array $params = [])
 * @method DeviceFirmware(string $method, array $input, array $params = [])
 * @method DeviceFirmwareModel(string $method, array $input, array $params = [])
 * @method DeviceFirmwareType(string $method, array $input, array $params = [])
 * @method DeviceGeneric(string $method, array $input, array $params = [])
 * @method DeviceGenericModel(string $method, array $input, array $params = [])
 * @method DeviceGenericType(string $method, array $input, array $params = [])
 * @method DeviceGraphicCard(string $method, array $input, array $params = [])
 * @method DeviceGraphicCardModel(string $method, array $input, array $params = [])
 * @method DeviceHardDrive(string $method, array $input, array $params = [])
 * @method DeviceHardDriveModel(string $method, array $input, array $params = [])
 * @method DeviceMemory(string $method, array $input, array $params = [])
 * @method DeviceMemoryModel(string $method, array $input, array $params = [])
 * @method DeviceMemoryType(string $method, array $input, array $params = [])
 * @method DeviceMotherboard(string $method, array $input, array $params = [])
 * @method DeviceMotherBoardModel(string $method, array $input, array $params = [])
 * @method DeviceNetworkCard(string $method, array $input, array $params = [])
 * @method DeviceNetworkCardModel(string $method, array $input, array $params = [])
 * @method DevicePci(string $method, array $input, array $params = [])
 * @method DevicePciModel(string $method, array $input, array $params = [])
 * @method DevicePowerSupply(string $method, array $input, array $params = [])
 * @method DevicePowerSupplyModel(string $method, array $input, array $params = [])
 * @method DeviceProcessor(string $method, array $input, array $params = [])
 * @method DeviceProcessorModel(string $method, array $input, array $params = [])
 * @method DeviceSensor(string $method, array $input, array $params = [])
 * @method DeviceSensorModel(string $method, array $input, array $params = [])
 * @method DeviceSensorType(string $method, array $input, array $params = [])
 * @method DeviceSimcard(string $method, array $input, array $params = [])
 * @method DeviceSimcardType(string $method, array $input, array $params = [])
 * @method DeviceSoundCard(string $method, array $input, array $params = [])
 * @method DeviceSoundCardModel(string $method, array $input, array $params = [])
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
    * @deprecated this could be moved to ItemHandler
    */
   private $simpleEndpoints = [
      'Alert',
      'APIClient',
      'AuthLDAP',
      'AuthLdapReplicate',
      'AuthMail',
      'AutoUpdateSystem',
      'Blacklist',
      'BlacklistedMailContent',
      'Budget',
      'BudgetType',
      'BusinessCriticity',
      'Calendar_Holiday',
      'Calendar',
      'CalendarSegment',
      'Cartridge',
      'CartridgeItem_PrinterModel',
      'CartridgeItem',
      'CartridgeItemType',
      'Certificate_Item',
      'Certificate',
      'CertificateType',
      'Change_Group',
      'Change_Item',
      'Change_Problem',
      'Change_Project',
      'Change_Supplier',
      'Change_Ticket',
      'Change_User',
      'Change',
      'ChangeCost',
      'ChangeTask',
      'ChangeValidation',
      'Computer_Item',
      'Computer_SoftwareLicense',
      'Computer_SoftwareVersion',
      'Computer',
      'ComputerAntivirus',
      'ComputerDisk',
      'ComputerModel',
      'ComputerType',
      'ComputerVirtualMachine',
      'Config',
      'Consumable',
      'ConsumableItem',
      'ConsumableItemType',
      'Contact_Supplier',
      'Contact',
      'ContactType',
      'Contract_Item',
      'Contract_Supplier',
      'Contract',
      'ContractCost',
      'ContractType',
      'Control',
      'CronTask',
      'CronTaskLog',
      'DeviceBattery',
      'DeviceBatteryModel',
      'DeviceBatteryType',
      'DeviceCase',
      'DeviceCaseModel',
      'DeviceCaseType',
      'DeviceControl',
      'DeviceControlModel',
      'DeviceDrive',
      'DeviceDriveModel',
      'DeviceFirmware',
      'DeviceFirmwareModel',
      'DeviceFirmwareType',
      'DeviceGeneric',
      'DeviceGenericModel',
      'DeviceGenericType',
      'DeviceGraphicCard',
      'DeviceGraphicCardModel',
      'DeviceHardDrive',
      'DeviceHardDriveModel',
      'DeviceMemory',
      'DeviceMemoryModel',
      'DeviceMemoryType',
      'DeviceMotherboard',
      'DeviceMotherBoardModel',
      'DeviceNetworkCard',
      'DeviceNetworkCardModel',
      'DevicePci',
      'DevicePciModel',
      'DevicePowerSupply',
      'DevicePowerSupplyModel',
      'DeviceProcessor',
      'DeviceProcessorModel',
      'DeviceSensor',
      'DeviceSensorModel',
      'DeviceSensorType',
      'DeviceSimcard',
      'DeviceSimcardType',
      'DeviceSoundCard',
      'DeviceSoundCardModel',
   ];

   public function __construct($url) {
      $this->httpClient = new HttpClient();
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
         throw new Exception("Cannot connect to api");
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
         throw new Exception("Cannot connect to api");
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
         throw new Exception('session_token seems invalid');
      }
      return true;
   }

   /**
    * @deprecated this could be moved to ItemHandler
    */
   public function getSimpleEndpoints() {
      return $this->simpleEndpoints;
   }

   /**
    * @param $name
    * @param $arguments
    * @return \Psr\Http\Message\ResponseInterface
    * @deprecated this will be removed, use the @method request() instead
    */
   public function __call($name, $arguments) {
      $name = ucfirst($name);
      if (!in_array($name, $this->simpleEndpoints)) {
         throw new BadEndpointException();
      }

      if (func_num_args() < 2) {
         throw new InsufficientArgumentsException();
      }

      $method = $arguments[0];
      $input = $arguments[1];
      $params = isset($arguments[2]) ? $arguments[2] : [];
      $params['body'] = json_encode(['input' => $input]);
      $params['headers'] = $this->addTokens();
      return $this->doHttpRequest($method, $name, $params);
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
    * Execute a HTTP request to the rest API
    *
    * @param string $verb
    * @param string $relative_uri
    * @param array $params
    *
    * @throws Exception
    *
    * @return \Psr\Http\Message\ResponseInterface the response sent by the server
    * @deprecated this will be removed, use the @method request() instead
    */
   protected function doHttpRequest($verb = "get", $relative_uri = "", $params = []) {
      if (!empty($relative_uri)) {
         $params['headers']['Content-Type'] = "application/json";
      }
      if (isset($params['multipart'])) {
         // Guzzle lib will automatically push the correct Content-type
         unset($params['headers']['Content-Type']);
      }

      $verb = strtolower($verb);
      if (in_array($verb, ['get', 'post', 'delete', 'put', 'options', 'patch'])) {
         try {
            return $this->httpClient->{$verb}($this->url . $relative_uri,
               $params);
         } catch (Exception $e) {
            throw $e;
         }
      }
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
    * Allows to request password recovery and password reset.
    * This endpoint works under the following conditions:
    *  - GLPI has notifications enabled
    *  - The email address of the user belongs to a user account.
    *
    * @param $email
    * @param string $recoveryToken
    * @param string $newPassword
    * @return array
    */
   public function lostPassword($email, $recoveryToken = '', $newPassword = '') {
      $params['email'] = $email;
      if(($recoveryToken && !$newPassword) || (!$recoveryToken && $newPassword)){
         throw new InsufficientArgumentsException('The recovery and new password are mandatory');
      }
      if($recoveryToken && $newPassword){
         $params['password_forget_token'] = $recoveryToken;
         $params['password'] = $newPassword;
      }
      $options['body'] = json_encode($params);
      $response = $this->request('put', 'lostPassword', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }
}
