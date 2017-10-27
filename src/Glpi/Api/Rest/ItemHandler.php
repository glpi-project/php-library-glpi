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


use Glpi\Api\Rest\Exception\BadEndpointException;
use Glpi\Api\Rest\Exception\InsufficientArgumentsException;
use Psr\Log\InvalidArgumentException;


/**
 * This methods are dynamically handled by the __call() function to help developers' IDE.
 * ItemTypes declared here are from the GLPI core, to add new auto-complete helper extend this
 * class and add your ItemTypes
 *
 * $action valid values are 'create', 'read', 'update' and 'delete'
 * $input could be and array or a integer depending on the action.
 * $params are used for add query string parameters
 *
 * @method Alert($action, $input = [], array $params = [])
 * @method AuthLDAP($action, $input = [], array $params = [])
 * @method AuthLdapReplicate($action, $input = [], array $params = [])
 * @method AuthMail($action, $input = [], array $params = [])
 * @method AutoUpdateSystem($action, $input = [], array $params = [])
 * @method Blacklist($action, $input = [], array $params = [])
 * @method BlacklistedMailContent($action, $input = [], array $params = [])
 * @method Bookmark($action, $input = [], array $params = [])
 * @method Bookmark_User($action, $input = [], array $params = [])
 * @method Budget($action, $input = [], array $params = [])
 * @method Calendar($action, $input = [], array $params = [])
 * @method Calendar_Holiday($action, $input = [], array $params = [])
 * @method CalendarSegment($action, $input = [], array $params = [])
 * @method Cartridge($action, $input = [], array $params = [])
 * @method CartridgeItem($action, $input = [], array $params = [])
 * @method CartridgeItem_PrinterModel($action, $input = [], array $params = [])
 * @method CartridgeItemType($action, $input = [], array $params = [])
 * @method Change($action, $input = [], array $params = [])
 * @method Change_Group($action, $input = [], array $params = [])
 * @method Change_Item($action, $input = [], array $params = [])
 * @method Change_Problem($action, $input = [], array $params = [])
 * @method Change_Project($action, $input = [], array $params = [])
 * @method Change_Supplier($action, $input = [], array $params = [])
 * @method Change_Ticket($action, $input = [], array $params = [])
 * @method Change_User($action, $input = [], array $params = [])
 * @method ChangeCost($action, $input = [], array $params = [])
 * @method ChangeTask($action, $input = [], array $params = [])
 * @method ChangeValidation($action, $input = [], array $params = [])
 * @method CommonDBChild($action, $input = [], array $params = [])
 * @method CommonDBConnexity($action, $input = [], array $params = [])
 * @method CommonDBRelation($action, $input = [], array $params = [])
 * @method CommonDevice($action, $input = [], array $params = [])
 * @method CommonDropdown($action, $input = [], array $params = [])
 * @method CommonImplicitTreeDropdown($action, $input = [], array $params = [])
 * @method CommonITILActor($action, $input = [], array $params = [])
 * @method CommonITILCost($action, $input = [], array $params = [])
 * @method CommonITILObject($action, $input = [], array $params = [])
 * @method CommonITILTask($action, $input = [], array $params = [])
 * @method CommonITILValidation($action, $input = [], array $params = [])
 * @method CommonTreeDropdown($action, $input = [], array $params = [])
 * @method Computer($action, $input = [], array $params = [])
 * @method Computer_Item($action, $input = [], array $params = [])
 * @method Computer_SoftwareLicense($action, $input = [], array $params = [])
 * @method Computer_SoftwareVersion($action, $input = [], array $params = [])
 * @method ComputerDisk($action, $input = [], array $params = [])
 * @method ComputerModel($action, $input = [], array $params = [])
 * @method ComputerType($action, $input = [], array $params = [])
 * @method ComputerVirtualMachine($action, $input = [], array $params = [])
 * @method Config($action, $input = [], array $params = [])
 * @method Consumable($action, $input = [], array $params = [])
 * @method ConsumableItem($action, $input = [], array $params = [])
 * @method ConsumableItemType($action, $input = [], array $params = [])
 * @method Contact($action, $input = [], array $params = [])
 * @method Contact_Supplier($action, $input = [], array $params = [])
 * @method ContactType($action, $input = [], array $params = [])
 * @method Contract($action, $input = [], array $params = [])
 * @method Contract_Item($action, $input = [], array $params = [])
 * @method Contract_Supplier($action, $input = [], array $params = [])
 * @method ContractCost($action, $input = [], array $params = [])
 * @method ContractType($action, $input = [], array $params = [])
 * @method CronTask($action, $input = [], array $params = [])
 * @method CronTaskLog($action, $input = [], array $params = [])
 * @method DBConnection($action, $input = [], array $params = [])
 * @method DeviceCase($action, $input = [], array $params = [])
 * @method DeviceCaseType($action, $input = [], array $params = [])
 * @method DeviceControl($action, $input = [], array $params = [])
 * @method DeviceDrive($action, $input = [], array $params = [])
 * @method DeviceGraphicCard($action, $input = [], array $params = [])
 * @method DeviceHardDrive($action, $input = [], array $params = [])
 * @method DeviceMemory($action, $input = [], array $params = [])
 * @method DeviceMemoryType($action, $input = [], array $params = [])
 * @method DeviceMotherboard($action, $input = [], array $params = [])
 * @method DeviceNetworkCard($action, $input = [], array $params = [])
 * @method DevicePci($action, $input = [], array $params = [])
 * @method DevicePowerSupply($action, $input = [], array $params = [])
 * @method DeviceProcessor($action, $input = [], array $params = [])
 * @method DeviceSoundCard($action, $input = [], array $params = [])
 * @method DisplayPreference($action, $input = [], array $params = [])
 * @method Document($action, $input = [], array $params = [])
 * @method Document_Item($action, $input = [], array $params = [])
 * @method DocumentCategory($action, $input = [], array $params = [])
 * @method DocumentType($action, $input = [], array $params = [])
 * @method Domain($action, $input = [], array $params = [])
 * @method DropdownTranslation($action, $input = [], array $params = [])
 * @method Entity($action, $input = [], array $params = [])
 * @method Entity_KnowbaseItem($action, $input = [], array $params = [])
 * @method Entity_Reminder($action, $input = [], array $params = [])
 * @method Entity_RSSFeed($action, $input = [], array $params = [])
 * @method Event($action, $input = [], array $params = [])
 * @method Fieldblacklist($action, $input = [], array $params = [])
 * @method FieldUnicity($action, $input = [], array $params = [])
 * @method Filesystem($action, $input = [], array $params = [])
 * @method FQDN($action, $input = [], array $params = [])
 * @method FQDNLabel($action, $input = [], array $params = [])
 * @method Group($action, $input = [], array $params = [])
 * @method Group_KnowbaseItem($action, $input = [], array $params = [])
 * @method Group_Problem($action, $input = [], array $params = [])
 * @method Group_Reminder($action, $input = [], array $params = [])
 * @method Group_RSSFeed($action, $input = [], array $params = [])
 * @method Group_Ticket($action, $input = [], array $params = [])
 * @method Group_User($action, $input = [], array $params = [])
 * @method Holiday($action, $input = [], array $params = [])
 * @method Infocom($action, $input = [], array $params = [])
 * @method InterfaceType($action, $input = [], array $params = [])
 * @method IPAddress($action, $input = [], array $params = [])
 * @method IPAddress_IPNetwork($action, $input = [], array $params = [])
 * @method IPNetmask($action, $input = [], array $params = [])
 * @method IPNetwork($action, $input = [], array $params = [])
 * @method IPNetwork_Vlan($action, $input = [], array $params = [])
 * @method Item_DeviceCase($action, $input = [], array $params = [])
 * @method Item_DeviceControl($action, $input = [], array $params = [])
 * @method Item_DeviceDrive($action, $input = [], array $params = [])
 * @method Item_DeviceGraphicCard($action, $input = [], array $params = [])
 * @method Item_DeviceHardDrive($action, $input = [], array $params = [])
 * @method Item_DeviceMemory($action, $input = [], array $params = [])
 * @method Item_DeviceMotherboard($action, $input = [], array $params = [])
 * @method Item_DeviceNetworkCard($action, $input = [], array $params = [])
 * @method Item_DevicePci($action, $input = [], array $params = [])
 * @method Item_DevicePowerSupply($action, $input = [], array $params = [])
 * @method Item_DeviceProcessor($action, $input = [], array $params = [])
 * @method Item_Devices($action, $input = [], array $params = [])
 * @method Item_DeviceSoundCard($action, $input = [], array $params = [])
 * @method Item_Problem($action, $input = [], array $params = [])
 * @method Item_Project($action, $input = [], array $params = [])
 * @method Item_Ticket($action, $input = [], array $params = [])
 * @method ITILCategory($action, $input = [], array $params = [])
 * @method KnowbaseItem($action, $input = [], array $params = [])
 * @method KnowbaseItem_Profile($action, $input = [], array $params = [])
 * @method KnowbaseItem_User($action, $input = [], array $params = [])
 * @method KnowbaseItemCategory($action, $input = [], array $params = [])
 * @method KnowbaseItemTranslation($action, $input = [], array $params = [])
 * @method Link($action, $input = [], array $params = [])
 * @method Link_Itemtype($action, $input = [], array $params = [])
 * @method Location($action, $input = [], array $params = [])
 * @method Log($action, $input = [], array $params = [])
 * @method MailCollector($action, $input = [], array $params = [])
 * @method Manufacturer($action, $input = [], array $params = [])
 * @method Monitor($action, $input = [], array $params = [])
 * @method MonitorModel($action, $input = [], array $params = [])
 * @method MonitorType($action, $input = [], array $params = [])
 * @method Netpoint($action, $input = [], array $params = [])
 * @method Network($action, $input = [], array $params = [])
 * @method NetworkAlias($action, $input = [], array $params = [])
 * @method NetworkEquipment($action, $input = [], array $params = [])
 * @method NetworkEquipmentFirmware($action, $input = [], array $params = [])
 * @method NetworkEquipmentModel($action, $input = [], array $params = [])
 * @method NetworkEquipmentType($action, $input = [], array $params = [])
 * @method NetworkInterface($action, $input = [], array $params = [])
 * @method NetworkName($action, $input = [], array $params = [])
 * @method NetworkPort($action, $input = [], array $params = [])
 * @method NetworkPort_NetworkPort($action, $input = [], array $params = [])
 * @method NetworkPort_Vlan($action, $input = [], array $params = [])
 * @method NetworkPortAggregate($action, $input = [], array $params = [])
 * @method NetworkPortAlias($action, $input = [], array $params = [])
 * @method NetworkPortDialup($action, $input = [], array $params = [])
 * @method NetworkPortEthernet($action, $input = [], array $params = [])
 * @method NetworkPortInstantiation($action, $input = [], array $params = [])
 * @method NetworkPortLocal($action, $input = [], array $params = [])
 * @method NetworkPortMigration($action, $input = [], array $params = [])
 * @method NetworkPortWifi($action, $input = [], array $params = [])
 * @method Notepad($action, $input = [], array $params = [])
 * @method Notification($action, $input = [], array $params = [])
 * @method NotificationEvent($action, $input = [], array $params = [])
 * @method NotificationMailSetting($action, $input = [], array $params = [])
 * @method NotificationTarget($action, $input = [], array $params = [])
 * @method NotificationTargetCartridgeItem($action, $input = [], array $params = [])
 * @method NotificationTargetChange($action, $input = [], array $params = [])
 * @method NotificationTargetCommonITILObject($action, $input = [], array $params = [])
 * @method NotificationTargetConsumableItem($action, $input = [], array $params = [])
 * @method NotificationTargetContract($action, $input = [], array $params = [])
 * @method NotificationTargetCrontask($action, $input = [], array $params = [])
 * @method NotificationTargetDBConnection($action, $input = [], array $params = [])
 * @method NotificationTargetFieldUnicity($action, $input = [], array $params = [])
 * @method NotificationTargetInfocom($action, $input = [], array $params = [])
 * @method NotificationTargetMailCollector($action, $input = [], array $params = [])
 * @method NotificationTargetPlanningRecall($action, $input = [], array $params = [])
 * @method NotificationTargetProblem($action, $input = [], array $params = [])
 * @method NotificationTargetProject($action, $input = [], array $params = [])
 * @method NotificationTargetProjectTask($action, $input = [], array $params = [])
 * @method NotificationTargetReservation($action, $input = [], array $params = [])
 * @method NotificationTargetSoftwareLicense($action, $input = [], array $params = [])
 * @method NotificationTargetTicket($action, $input = [], array $params = [])
 * @method NotificationTargetUser($action, $input = [], array $params = [])
 * @method NotificationTemplate($action, $input = [], array $params = [])
 * @method NotificationTemplateTranslation($action, $input = [], array $params = [])
 * @method NotImportedEmail($action, $input = [], array $params = [])
 * @method OperatingSystem($action, $input = [], array $params = [])
 * @method OperatingSystemServicePack($action, $input = [], array $params = [])
 * @method OperatingSystemVersion($action, $input = [], array $params = [])
 * @method Peripheral($action, $input = [], array $params = [])
 * @method PeripheralModel($action, $input = [], array $params = [])
 * @method PeripheralType($action, $input = [], array $params = [])
 * @method Phone($action, $input = [], array $params = [])
 * @method PhoneModel($action, $input = [], array $params = [])
 * @method PhonePowerSupply($action, $input = [], array $params = [])
 * @method PhoneType($action, $input = [], array $params = [])
 * @method PlanningRecall($action, $input = [], array $params = [])
 * @method Plugin($action, $input = [], array $params = [])
 * @method Printer($action, $input = [], array $params = [])
 * @method PrinterModel($action, $input = [], array $params = [])
 * @method PrinterType($action, $input = [], array $params = [])
 * @method Problem($action, $input = [], array $params = [])
 * @method Problem_Supplier($action, $input = [], array $params = [])
 * @method Problem_Ticket($action, $input = [], array $params = [])
 * @method Problem_User($action, $input = [], array $params = [])
 * @method ProblemCost($action, $input = [], array $params = [])
 * @method ProblemTask($action, $input = [], array $params = [])
 * @method Profile($action, $input = [], array $params = [])
 * @method Profile_Reminder($action, $input = [], array $params = [])
 * @method Profile_RSSFeed($action, $input = [], array $params = [])
 * @method Profile_User($action, $input = [], array $params = [])
 * @method ProfileRight($action, $input = [], array $params = [])
 * @method Project($action, $input = [], array $params = [])
 * @method ProjectCost($action, $input = [], array $params = [])
 * @method ProjectState($action, $input = [], array $params = [])
 * @method ProjectTask($action, $input = [], array $params = [])
 * @method ProjectTask_Ticket($action, $input = [], array $params = [])
 * @method ProjectTaskTeam($action, $input = [], array $params = [])
 * @method ProjectTaskType($action, $input = [], array $params = [])
 * @method ProjectTeam($action, $input = [], array $params = [])
 * @method ProjectType($action, $input = [], array $params = [])
 * @method QueuedMail($action, $input = [], array $params = [])
 * @method RegisteredID($action, $input = [], array $params = [])
 * @method Reminder($action, $input = [], array $params = [])
 * @method Reminder_User($action, $input = [], array $params = [])
 * @method RequestType($action, $input = [], array $params = [])
 * @method Reservation($action, $input = [], array $params = [])
 * @method ReservationItem($action, $input = [], array $params = [])
 * @method RSSFeed($action, $input = [], array $params = [])
 * @method RSSFeed_User($action, $input = [], array $params = [])
 * @method Rule($action, $input = [], array $params = [])
 * @method RuleAction($action, $input = [], array $params = [])
 * @method RuleCollection($action, $input = [], array $params = [])
 * @method RuleCriteria($action, $input = [], array $params = [])
 * @method RuleDictionnaryComputerModel($action, $input = [], array $params = [])
 * @method RuleDictionnaryComputerModelCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryComputerType($action, $input = [], array $params = [])
 * @method RuleDictionnaryComputerTypeCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryDropdown($action, $input = [], array $params = [])
 * @method RuleDictionnaryDropdownCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryManufacturer($action, $input = [], array $params = [])
 * @method RuleDictionnaryManufacturerCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryMonitorModel($action, $input = [], array $params = [])
 * @method RuleDictionnaryMonitorModelCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryMonitorType($action, $input = [], array $params = [])
 * @method RuleDictionnaryMonitorTypeCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryNetworkEquipmentModel($action, $input = [], array $params = [])
 * @method RuleDictionnaryNetworkEquipmentModelCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryNetworkEquipmentType($action, $input = [], array $params = [])
 * @method RuleDictionnaryNetworkEquipmentTypeCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryOperatingSystem($action, $input = [], array $params = [])
 * @method RuleDictionnaryOperatingSystemCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryOperatingSystemServicePack($action, $input = [], array $params = [])
 * @method RuleDictionnaryOperatingSystemServicePackCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryOperatingSystemVersion($action, $input = [], array $params = [])
 * @method RuleDictionnaryOperatingSystemVersionCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryPeripheralModel($action, $input = [], array $params = [])
 * @method RuleDictionnaryPeripheralModelCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryPeripheralType($action, $input = [], array $params = [])
 * @method RuleDictionnaryPeripheralTypeCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryPhoneModel($action, $input = [], array $params = [])
 * @method RuleDictionnaryPhoneModelCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryPhoneType($action, $input = [], array $params = [])
 * @method RuleDictionnaryPhoneTypeCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryPrinter($action, $input = [], array $params = [])
 * @method RuleDictionnaryPrinterCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryPrinterModel($action, $input = [], array $params = [])
 * @method RuleDictionnaryPrinterModelCollection($action, $input = [], array $params = [])
 * @method RuleDictionnaryPrinterType($action, $input = [], array $params = [])
 * @method RuleDictionnaryPrinterTypeCollection($action, $input = [], array $params = [])
 * @method RuleDictionnarySoftware($action, $input = [], array $params = [])
 * @method RuleDictionnarySoftwareCollection($action, $input = [], array $params = [])
 * @method RuleImportComputer($action, $input = [], array $params = [])
 * @method RuleImportComputerCollection($action, $input = [], array $params = [])
 * @method RuleImportEntity($action, $input = [], array $params = [])
 * @method RuleImportEntityCollection($action, $input = [], array $params = [])
 * @method RuleMailCollector($action, $input = [], array $params = [])
 * @method RuleMailCollectorCollection($action, $input = [], array $params = [])
 * @method RuleRight($action, $input = [], array $params = [])
 * @method RuleRightCollection($action, $input = [], array $params = [])
 * @method RuleRightParameter($action, $input = [], array $params = [])
 * @method RuleSoftwareCategory($action, $input = [], array $params = [])
 * @method RuleSoftwareCategoryCollection($action, $input = [], array $params = [])
 * @method RuleTicket($action, $input = [], array $params = [])
 * @method RuleTicketCollection($action, $input = [], array $params = [])
 * @method SLA($action, $input = [], array $params = [])
 * @method SlaLevel($action, $input = [], array $params = [])
 * @method SlaLevel_Ticket($action, $input = [], array $params = [])
 * @method SlaLevelAction($action, $input = [], array $params = [])
 * @method SlaLevelCriteria($action, $input = [], array $params = [])
 * @method Software($action, $input = [], array $params = [])
 * @method SoftwareCategory($action, $input = [], array $params = [])
 * @method SoftwareLicense($action, $input = [], array $params = [])
 * @method SoftwareLicenseType($action, $input = [], array $params = [])
 * @method SoftwareVersion($action, $input = [], array $params = [])
 * @method SolutionTemplate($action, $input = [], array $params = [])
 * @method SolutionType($action, $input = [], array $params = [])
 * @method SsoVariable($action, $input = [], array $params = [])
 * @method State($action, $input = [], array $params = [])
 * @method Supplier($action, $input = [], array $params = [])
 * @method Supplier_Ticket($action, $input = [], array $params = [])
 * @method SupplierType($action, $input = [], array $params = [])
 * @method TaskCategory($action, $input = [], array $params = [])
 * @method Ticket($action, $input = [], array $params = [])
 * @method Ticket_Ticket($action, $input = [], array $params = [])
 * @method Ticket_User($action, $input = [], array $params = [])
 * @method TicketCost($action, $input = [], array $params = [])
 * @method TicketFollowup($action, $input = [], array $params = [])
 * @method TicketRecurrent($action, $input = [], array $params = [])
 * @method TicketSatisfaction($action, $input = [], array $params = [])
 * @method TicketTask($action, $input = [], array $params = [])
 * @method TicketTemplate($action, $input = [], array $params = [])
 * @method TicketTemplateHiddenField($action, $input = [], array $params = [])
 * @method TicketTemplateMandatoryField($action, $input = [], array $params = [])
 * @method TicketTemplatePredefinedField($action, $input = [], array $params = [])
 * @method TicketValidation($action, $input = [], array $params = [])
 * @method Transfer($action, $input = [], array $params = [])
 * @method User($action, $input = [], array $params = [])
 * @method UserCategory($action, $input = [], array $params = [])
 * @method UserEmail($action, $input = [], array $params = [])
 * @method UserTitle($action, $input = [], array $params = [])
 * @method VirtualMachineState($action, $input = [], array $params = [])
 * @method VirtualMachineSystem($action, $input = [], array $params = [])
 * @method VirtualMachineType($action, $input = [], array $params = [])
 * @method Vlan($action, $input = [], array $params = [])
 * @method WifiNetwork($action, $input = [], array $params = [])
 *
 */
class ItemHandler {
   /**
    * @var Client
    */
   protected $client;

   public function __construct(Client $client) {
      $this->client = $client;
   }

   /**
    * @return Client
    */
   public function getClient() {
      return $this->client;
   }

   /**
    * Return the instance fields of itemtype identified by id.
    * @param string $itemType
    * @param integer $id
    * @param array $queryString
    * @return array
    */
   public function getAnItem($itemType, $id, array $queryString = []) {
      $options = [];
      if ($queryString) {
         $options['query'] = $queryString;
      }
      $response = $this->client->request('get', $itemType . '/' . $id, $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Return a collection of rows of the itemtype.
    * @param string $itemType
    * @param array $queryString
    * @return array
    */
   public function getAllItems($itemType, array $queryString = []) {
      $options = [];
      if ($queryString) {
         $options['query'] = $queryString;
      }
      $response = $this->client->request('get', $itemType . '/', $options);
      $contentRange = $response->getHeader('Content-Range');
      $acceptRange = $response->getHeader('Accept-Range');
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
         'contentRange' => ($contentRange) ? $contentRange[0] : null,
         'acceptRange' => ($acceptRange) ? $acceptRange[0] : null,
      ];
   }

   /**
    * Return a collection of rows of the itemtype.
    * @param string $itemType
    * @param integer $id of main item type
    * @param string $subItem
    * @param array $queryString
    * @return array
    */
   public function getSubItems($itemType, $id, $subItem, array $queryString = []) {
      $options = [];
      if ($queryString) {
         $options['query'] = $queryString;
      }
      $response = $this->client->request('get', $itemType . '/' . $id . '/' . $subItem,
         $options);
      $contentRange = $response->getHeader('Content-Range');
      $acceptRange = $response->getHeader('Accept-Range');
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
         'contentRange' => ($contentRange) ? $contentRange[0] : null,
         'acceptRange' => ($acceptRange) ? $acceptRange[0] : null,
      ];
   }

   /**
    * Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.
    * @param array $items
    * @param array $queryString
    * @return array
    */
   public function getMultipleItems(array $items, array $queryString = []) {
      foreach ($items as $item) {
         if (!key_exists('itemtype', $item) || !key_exists('items_id', $item)) {
            throw new InsufficientArgumentsException(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY', "'itemtype' and 'items_id'"));
         }
      }
      $options['query'] = array_merge($queryString, ['items' => $items]);
      $response = $this->client->request('get', 'getMultipleItems', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.
    * @param string $itemType
    * @param array $queryString
    * @return array
    */
   public function listSearchOptions($itemType, array $queryString = []) {
      $options = [];
      if ($queryString) {
         $options['query'] = $queryString;
      }
      $response = $this->client->request('get', 'listSearchOptions/' . $itemType, $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.
    * @param string $itemType
    * @param array $queryString
    * @return array
    */
   public function searchItems($itemType, array $queryString = []) {
      $options = [];
      if ($queryString) {
         $options['query'] = $queryString;
      }
      $response = $this->client->request('get', 'search/' . $itemType, $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Add an object (or multiple objects) into GLPI.
    *
    * Important: In case of 'multipart/data' content_type (aka file upload),
    * you should insert your parameters into a 'uploadManifest' parameter.
    * Theses serialized data should be a json string.
    *
    * @param string $itemType
    * @param array $queryString
    * @return array
    */
   public function addItem($itemType, array $queryString) {
      $options['body'] = json_encode(['input' => $queryString]);
      $response = $this->client->request('post', $itemType . '/', $options);
      $location = $response->getHeader('location');
      $link = $response->getHeader('Link');
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
         'location' => ($location) ? $location[0] : null,
         'link' => ($link) ? $link[0] : null,
      ];
   }

   /**
    * Update an object (or multiple objects) existing in GLPI.
    * @param string $itemType
    * @param integer $id
    * @param array $queryString
    * @return array
    */
   public function updateItem($itemType, $id, array $queryString) {
      if (!$id) {
         if (!$queryString) {
            throw new InsufficientArgumentsException(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY', "'id' to identify the item"));
         }
         foreach ($queryString as $item) {
            if (is_array($item) && !array_key_exists('id', $item)) {
               throw new InsufficientArgumentsException(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY', "'id' to identify the item"));
            }
         }
      }
      $options['body'] = json_encode(['input' => $queryString]);
      $response = $this->client->request('put', $itemType . '/' . $id, $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * @param string $itemType
    * @param integer $id
    * @param array $inputValues
    * @param array $queryString
    * @return array
    */
   public function deleteItem($itemType, $id, array $inputValues = [], array $queryString = []) {
      $options = [];
      if (!$id) {
         if (!$inputValues) {
            throw new InsufficientArgumentsException(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY', "'id' to identify the item"));
         }
         foreach ($inputValues as $item) {
            if (is_array($item) && !array_key_exists('id', $item)) {
               throw new InsufficientArgumentsException(ErrorHandler::getMessage('ERROR_APILIB_ARGS_MANDATORY', "'id' to identify the item"));
            }
         }
         $options['body'] = json_encode(['input' => $inputValues]);
      }
      if ($queryString) {
         $options['query'] = $queryString;
      }
      $response = $this->client->request('delete', $itemType . '/' . $id, $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Magic method to execute CRUD actions with a single ItemTypes dynamically.
    * Send your ItemType as a method and the arguments to be executed.
    * Each ItemType's name came from the table's name in the DB schema.
    * Examples:
    *    Alerts => glpi_alerts,
    *    Calendars_Holidays => glpi_calendars_holidays,
    *    Consumableitems => glpi_consumableitems,
    *
    * How to use this?. You can check the file 'example/magicCallExample.php' for reference.
    *
    * @param string $name of the itemtype
    * @param mixed $arguments first is method, second is the input, and third is the query string
    * @return array|null
    * @throws InsufficientArgumentsException|BadEndpointException|InvalidArgumentException
    */
   public function __call($name, $arguments) {
      $name = ucfirst($name);

      if (count($arguments) < 2) {
         throw new InsufficientArgumentsException(ErrorHandler::getMessage('ERROR_APILIB_ARGUMENTS'));
      }

      $method = strtolower($arguments[0]);
      $input = isset($arguments[1]) ? $arguments[1] : [];
      $params = isset($arguments[2]) ? $arguments[2] : [];
      $result = null;
      switch ($method) {
         case 'create':
            $result = $this->addItem($name, $input);
            break;
         case 'read':
            $result = $this->getAnItem($name, (int)$input, $params);
            break;
         case 'update':
            $result = $this->updateItem($name, '', $input);
            break;
         case 'delete':
            $result = $this->deleteItem($name, '', $input, $params);
            break;
         default:
            throw new InvalidArgumentException(ErrorHandler::getMessage('ERROR_APILIB_ARGUMENTS'));
            break;
      }
      $body = json_decode($result['body']);
      if ($result['statusCode'] == 400 && $body[0] == 'ERROR_RESOURCE_NOT_FOUND_NOR_COMMONDBTM') {
         throw new BadEndpointException("EndPoint '{$name}' is not valid. " . ErrorHandler::getMessage($body[0]));
      }
      return $result;
   }

}