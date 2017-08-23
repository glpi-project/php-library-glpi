<?php
namespace GlpiProject\API\Rest;
use GuzzleHttp\Client as HttpClient;
use Exception;
use GlpiProject\API\Rest\Exception\BadEndpointException;
use GlpiProject\API\Rest\Exception\InsufficientArgumentsException;

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

   public function __construct(HttpClient $httpClient, $url) {
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
      $response = $this->doHttpRequest('get', 'initSession', ['auth' => [$user, $password]]);
      if ($response->getStatusCode() != 200
          || !$this->sessionToken = json_decode( (string) $response->getBody(), true)['session_token']) {
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
      $response = $this->doHttpRequest('get', 'initSession', ['Authorization' => "user_token $userToken"]);
      if ($response->getStatusCode() != 200
          || !$this->sessionToken = json_decode( (string) $response->getBody(), true)['session_token']) {
         throw new Exception("Cannot connect to api");
      }
      return true;
   }

   public function getSimpleEndpoints() {
      return $this->simpleEndpoints;
   }

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
    * Execute a HTTP request to the rest API
    *
    * @param string $verb
    * @param string $relative_uri
    * @param array $params
    *
    * @throws Exception
    *
    * @return \Psr\Http\Message\ResponseInterface the response sent by the server
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
}
