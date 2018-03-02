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
 * These methods are dynamically handled by the __call() function to help developers' IDE.
 * ItemTypes declared here are from the GLPI core, to add new auto-complete helper extend this
 * class and add your ItemTypes
 *
 * $action valid values are 'create', 'read', 'update' and 'delete'
 * $input could be and array or a integer depending on the action.
 * $params are used for add query string parameters
 *
 * @method array Alert(string $action, array $input = [], array $params = [])
 * @method array AuthLDAP(string $action, array $input = [], array $params = [])
 * @method array AuthLdapReplicate(string $action, array $input = [], array $params = [])
 * @method array AuthMail(string $action, array $input = [], array $params = [])
 * @method array AutoUpdateSystem(string $action, array $input = [], array $params = [])
 * @method array Blacklist(string $action, array $input = [], array $params = [])
 * @method array BlacklistedMailContent(string $action, array $input = [], array $params = [])
 * @method array Bookmark(string $action, array $input = [], array $params = [])
 * @method array Bookmark_User(string $action, array $input = [], array $params = [])
 * @method array Budget(string $action, array $input = [], array $params = [])
 * @method array Calendar(string $action, array $input = [], array $params = [])
 * @method array Calendar_Holiday(string $action, array $input = [], array $params = [])
 * @method array CalendarSegment(string $action, array $input = [], array $params = [])
 * @method array Cartridge(string $action, array $input = [], array $params = [])
 * @method array CartridgeItem(string $action, array $input = [], array $params = [])
 * @method array CartridgeItem_PrinterModel(string $action, array $input = [], array $params = [])
 * @method array CartridgeItemType(string $action, array $input = [], array $params = [])
 * @method array Change(string $action, array $input = [], array $params = [])
 * @method array Change_Group(string $action, array $input = [], array $params = [])
 * @method array Change_Item(string $action, array $input = [], array $params = [])
 * @method array Change_Problem(string $action, array $input = [], array $params = [])
 * @method array Change_Project(string $action, array $input = [], array $params = [])
 * @method array Change_Supplier(string $action, array $input = [], array $params = [])
 * @method array Change_Ticket(string $action, array $input = [], array $params = [])
 * @method array Change_User(string $action, array $input = [], array $params = [])
 * @method array ChangeCost(string $action, array $input = [], array $params = [])
 * @method array ChangeTask(string $action, array $input = [], array $params = [])
 * @method array ChangeValidation(string $action, array $input = [], array $params = [])
 * @method array CommonDBChild(string $action, array $input = [], array $params = [])
 * @method array CommonDBConnexity(string $action, array $input = [], array $params = [])
 * @method array CommonDBRelation(string $action, array $input = [], array $params = [])
 * @method array CommonDevice(string $action, array $input = [], array $params = [])
 * @method array CommonDropdown(string $action, array $input = [], array $params = [])
 * @method array CommonImplicitTreeDropdown(string $action, array $input = [], array $params = [])
 * @method array CommonITILActor(string $action, array $input = [], array $params = [])
 * @method array CommonITILCost(string $action, array $input = [], array $params = [])
 * @method array CommonITILObject(string $action, array $input = [], array $params = [])
 * @method array CommonITILTask(string $action, array $input = [], array $params = [])
 * @method array CommonITILValidation(string $action, array $input = [], array $params = [])
 * @method array CommonTreeDropdown(string $action, array $input = [], array $params = [])
 * @method array Computer(string $action, array $input = [], array $params = [])
 * @method array Computer_Item(string $action, array $input = [], array $params = [])
 * @method array Computer_SoftwareLicense(string $action, array $input = [], array $params = [])
 * @method array Computer_SoftwareVersion(string $action, array $input = [], array $params = [])
 * @method array ComputerDisk(string $action, array $input = [], array $params = [])
 * @method array ComputerModel(string $action, array $input = [], array $params = [])
 * @method array ComputerType(string $action, array $input = [], array $params = [])
 * @method array ComputerVirtualMachine(string $action, array $input = [], array $params = [])
 * @method array Config(string $action, array $input = [], array $params = [])
 * @method array Consumable(string $action, array $input = [], array $params = [])
 * @method array ConsumableItem(string $action, array $input = [], array $params = [])
 * @method array ConsumableItemType(string $action, array $input = [], array $params = [])
 * @method array Contact(string $action, array $input = [], array $params = [])
 * @method array Contact_Supplier(string $action, array $input = [], array $params = [])
 * @method array ContactType(string $action, array $input = [], array $params = [])
 * @method array Contract(string $action, array $input = [], array $params = [])
 * @method array Contract_Item(string $action, array $input = [], array $params = [])
 * @method array Contract_Supplier(string $action, array $input = [], array $params = [])
 * @method array ContractCost(string $action, array $input = [], array $params = [])
 * @method array ContractType(string $action, array $input = [], array $params = [])
 * @method array CronTask(string $action, array $input = [], array $params = [])
 * @method array CronTaskLog(string $action, array $input = [], array $params = [])
 * @method array DBConnection(string $action, array $input = [], array $params = [])
 * @method array DeviceCase(string $action, array $input = [], array $params = [])
 * @method array DeviceCaseType(string $action, array $input = [], array $params = [])
 * @method array DeviceControl(string $action, array $input = [], array $params = [])
 * @method array DeviceDrive(string $action, array $input = [], array $params = [])
 * @method array DeviceGraphicCard(string $action, array $input = [], array $params = [])
 * @method array DeviceHardDrive(string $action, array $input = [], array $params = [])
 * @method array DeviceMemory(string $action, array $input = [], array $params = [])
 * @method array DeviceMemoryType(string $action, array $input = [], array $params = [])
 * @method array DeviceMotherboard(string $action, array $input = [], array $params = [])
 * @method array DeviceNetworkCard(string $action, array $input = [], array $params = [])
 * @method array DevicePci(string $action, array $input = [], array $params = [])
 * @method array DevicePowerSupply(string $action, array $input = [], array $params = [])
 * @method array DeviceProcessor(string $action, array $input = [], array $params = [])
 * @method array DeviceSoundCard(string $action, array $input = [], array $params = [])
 * @method array DisplayPreference(string $action, array $input = [], array $params = [])
 * @method array Document(string $action, array $input = [], array $params = [])
 * @method array Document_Item(string $action, array $input = [], array $params = [])
 * @method array DocumentCategory(string $action, array $input = [], array $params = [])
 * @method array DocumentType(string $action, array $input = [], array $params = [])
 * @method array Domain(string $action, array $input = [], array $params = [])
 * @method array DropdownTranslation(string $action, array $input = [], array $params = [])
 * @method array Entity(string $action, array $input = [], array $params = [])
 * @method array Entity_KnowbaseItem(string $action, array $input = [], array $params = [])
 * @method array Entity_Reminder(string $action, array $input = [], array $params = [])
 * @method array Entity_RSSFeed(string $action, array $input = [], array $params = [])
 * @method array Event(string $action, array $input = [], array $params = [])
 * @method array Fieldblacklist(string $action, array $input = [], array $params = [])
 * @method array FieldUnicity(string $action, array $input = [], array $params = [])
 * @method array Filesystem(string $action, array $input = [], array $params = [])
 * @method array FQDN(string $action, array $input = [], array $params = [])
 * @method array FQDNLabel(string $action, array $input = [], array $params = [])
 * @method array Group(string $action, array $input = [], array $params = [])
 * @method array Group_KnowbaseItem(string $action, array $input = [], array $params = [])
 * @method array Group_Problem(string $action, array $input = [], array $params = [])
 * @method array Group_Reminder(string $action, array $input = [], array $params = [])
 * @method array Group_RSSFeed(string $action, array $input = [], array $params = [])
 * @method array Group_Ticket(string $action, array $input = [], array $params = [])
 * @method array Group_User(string $action, array $input = [], array $params = [])
 * @method array Holiday(string $action, array $input = [], array $params = [])
 * @method array Infocom(string $action, array $input = [], array $params = [])
 * @method array InterfaceType(string $action, array $input = [], array $params = [])
 * @method array IPAddress(string $action, array $input = [], array $params = [])
 * @method array IPAddress_IPNetwork(string $action, array $input = [], array $params = [])
 * @method array IPNetmask(string $action, array $input = [], array $params = [])
 * @method array IPNetwork(string $action, array $input = [], array $params = [])
 * @method array IPNetwork_Vlan(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceCase(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceControl(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceDrive(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceGraphicCard(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceHardDrive(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceMemory(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceMotherboard(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceNetworkCard(string $action, array $input = [], array $params = [])
 * @method array Item_DevicePci(string $action, array $input = [], array $params = [])
 * @method array Item_DevicePowerSupply(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceProcessor(string $action, array $input = [], array $params = [])
 * @method array Item_Devices(string $action, array $input = [], array $params = [])
 * @method array Item_DeviceSoundCard(string $action, array $input = [], array $params = [])
 * @method array Item_Problem(string $action, array $input = [], array $params = [])
 * @method array Item_Project(string $action, array $input = [], array $params = [])
 * @method array Item_Ticket(string $action, array $input = [], array $params = [])
 * @method array ITILCategory(string $action, array $input = [], array $params = [])
 * @method array KnowbaseItem(string $action, array $input = [], array $params = [])
 * @method array KnowbaseItem_Profile(string $action, array $input = [], array $params = [])
 * @method array KnowbaseItem_User(string $action, array $input = [], array $params = [])
 * @method array KnowbaseItemCategory(string $action, array $input = [], array $params = [])
 * @method array KnowbaseItemTranslation(string $action, array $input = [], array $params = [])
 * @method array Link(string $action, array $input = [], array $params = [])
 * @method array Link_Itemtype(string $action, array $input = [], array $params = [])
 * @method array Location(string $action, array $input = [], array $params = [])
 * @method array Log(string $action, array $input = [], array $params = [])
 * @method array MailCollector(string $action, array $input = [], array $params = [])
 * @method array Manufacturer(string $action, array $input = [], array $params = [])
 * @method array Monitor(string $action, array $input = [], array $params = [])
 * @method array MonitorModel(string $action, array $input = [], array $params = [])
 * @method array MonitorType(string $action, array $input = [], array $params = [])
 * @method array Netpoint(string $action, array $input = [], array $params = [])
 * @method array Network(string $action, array $input = [], array $params = [])
 * @method array NetworkAlias(string $action, array $input = [], array $params = [])
 * @method array NetworkEquipment(string $action, array $input = [], array $params = [])
 * @method array NetworkEquipmentFirmware(string $action, array $input = [], array $params = [])
 * @method array NetworkEquipmentModel(string $action, array $input = [], array $params = [])
 * @method array NetworkEquipmentType(string $action, array $input = [], array $params = [])
 * @method array NetworkInterface(string $action, array $input = [], array $params = [])
 * @method array NetworkName(string $action, array $input = [], array $params = [])
 * @method array NetworkPort(string $action, array $input = [], array $params = [])
 * @method array NetworkPort_NetworkPort(string $action, array $input = [], array $params = [])
 * @method array NetworkPort_Vlan(string $action, array $input = [], array $params = [])
 * @method array NetworkPortAggregate(string $action, array $input = [], array $params = [])
 * @method array NetworkPortAlias(string $action, array $input = [], array $params = [])
 * @method array NetworkPortDialup(string $action, array $input = [], array $params = [])
 * @method array NetworkPortEthernet(string $action, array $input = [], array $params = [])
 * @method array NetworkPortInstantiation(string $action, array $input = [], array $params = [])
 * @method array NetworkPortLocal(string $action, array $input = [], array $params = [])
 * @method array NetworkPortMigration(string $action, array $input = [], array $params = [])
 * @method array NetworkPortWifi(string $action, array $input = [], array $params = [])
 * @method array Notepad(string $action, array $input = [], array $params = [])
 * @method array Notification(string $action, array $input = [], array $params = [])
 * @method array NotificationEvent(string $action, array $input = [], array $params = [])
 * @method array NotificationMailSetting(string $action, array $input = [], array $params = [])
 * @method array NotificationTarget(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetCartridgeItem(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetChange(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetCommonITILObject(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetConsumableItem(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetContract(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetCrontask(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetDBConnection(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetFieldUnicity(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetInfocom(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetMailCollector(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetPlanningRecall(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetProblem(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetProject(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetProjectTask(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetReservation(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetSoftwareLicense(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetTicket(string $action, array $input = [], array $params = [])
 * @method array NotificationTargetUser(string $action, array $input = [], array $params = [])
 * @method array NotificationTemplate(string $action, array $input = [], array $params = [])
 * @method array NotificationTemplateTranslation(string $action, array $input = [], array $params = [])
 * @method array NotImportedEmail(string $action, array $input = [], array $params = [])
 * @method array OperatingSystem(string $action, array $input = [], array $params = [])
 * @method array OperatingSystemServicePack(string $action, array $input = [], array $params = [])
 * @method array OperatingSystemVersion(string $action, array $input = [], array $params = [])
 * @method array Peripheral(string $action, array $input = [], array $params = [])
 * @method array PeripheralModel(string $action, array $input = [], array $params = [])
 * @method array PeripheralType(string $action, array $input = [], array $params = [])
 * @method array Phone(string $action, array $input = [], array $params = [])
 * @method array PhoneModel(string $action, array $input = [], array $params = [])
 * @method array PhonePowerSupply(string $action, array $input = [], array $params = [])
 * @method array PhoneType(string $action, array $input = [], array $params = [])
 * @method array PlanningRecall(string $action, array $input = [], array $params = [])
 * @method array Plugin(string $action, array $input = [], array $params = [])
 * @method array Printer(string $action, array $input = [], array $params = [])
 * @method array PrinterModel(string $action, array $input = [], array $params = [])
 * @method array PrinterType(string $action, array $input = [], array $params = [])
 * @method array Problem(string $action, array $input = [], array $params = [])
 * @method array Problem_Supplier(string $action, array $input = [], array $params = [])
 * @method array Problem_Ticket(string $action, array $input = [], array $params = [])
 * @method array Problem_User(string $action, array $input = [], array $params = [])
 * @method array ProblemCost(string $action, array $input = [], array $params = [])
 * @method array ProblemTask(string $action, array $input = [], array $params = [])
 * @method array Profile(string $action, array $input = [], array $params = [])
 * @method array Profile_Reminder(string $action, array $input = [], array $params = [])
 * @method array Profile_RSSFeed(string $action, array $input = [], array $params = [])
 * @method array Profile_User(string $action, array $input = [], array $params = [])
 * @method array ProfileRight(string $action, array $input = [], array $params = [])
 * @method array Project(string $action, array $input = [], array $params = [])
 * @method array ProjectCost(string $action, array $input = [], array $params = [])
 * @method array ProjectState(string $action, array $input = [], array $params = [])
 * @method array ProjectTask(string $action, array $input = [], array $params = [])
 * @method array ProjectTask_Ticket(string $action, array $input = [], array $params = [])
 * @method array ProjectTaskTeam(string $action, array $input = [], array $params = [])
 * @method array ProjectTaskType(string $action, array $input = [], array $params = [])
 * @method array ProjectTeam(string $action, array $input = [], array $params = [])
 * @method array ProjectType(string $action, array $input = [], array $params = [])
 * @method array QueuedMail(string $action, array $input = [], array $params = [])
 * @method array RegisteredID(string $action, array $input = [], array $params = [])
 * @method array Reminder(string $action, array $input = [], array $params = [])
 * @method array Reminder_User(string $action, array $input = [], array $params = [])
 * @method array RequestType(string $action, array $input = [], array $params = [])
 * @method array Reservation(string $action, array $input = [], array $params = [])
 * @method array ReservationItem(string $action, array $input = [], array $params = [])
 * @method array RSSFeed(string $action, array $input = [], array $params = [])
 * @method array RSSFeed_User(string $action, array $input = [], array $params = [])
 * @method array Rule(string $action, array $input = [], array $params = [])
 * @method array RuleAction(string $action, array $input = [], array $params = [])
 * @method array RuleCollection(string $action, array $input = [], array $params = [])
 * @method array RuleCriteria(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryComputerModel(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryComputerModelCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryComputerType(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryComputerTypeCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryDropdown(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryDropdownCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryManufacturer(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryManufacturerCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryMonitorModel(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryMonitorModelCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryMonitorType(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryMonitorTypeCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryNetworkEquipmentModel(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryNetworkEquipmentModelCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryNetworkEquipmentType(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryNetworkEquipmentTypeCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryOperatingSystem(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryOperatingSystemCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryOperatingSystemServicePack(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryOperatingSystemServicePackCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryOperatingSystemVersion(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryOperatingSystemVersionCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPeripheralModel(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPeripheralModelCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPeripheralType(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPeripheralTypeCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPhoneModel(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPhoneModelCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPhoneType(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPhoneTypeCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPrinter(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPrinterCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPrinterModel(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPrinterModelCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPrinterType(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnaryPrinterTypeCollection(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnarySoftware(string $action, array $input = [], array $params = [])
 * @method array RuleDictionnarySoftwareCollection(string $action, array $input = [], array $params = [])
 * @method array RuleImportComputer(string $action, array $input = [], array $params = [])
 * @method array RuleImportComputerCollection(string $action, array $input = [], array $params = [])
 * @method array RuleImportEntity(string $action, array $input = [], array $params = [])
 * @method array RuleImportEntityCollection(string $action, array $input = [], array $params = [])
 * @method array RuleMailCollector(string $action, array $input = [], array $params = [])
 * @method array RuleMailCollectorCollection(string $action, array $input = [], array $params = [])
 * @method array RuleRight(string $action, array $input = [], array $params = [])
 * @method array RuleRightCollection(string $action, array $input = [], array $params = [])
 * @method array RuleRightParameter(string $action, array $input = [], array $params = [])
 * @method array RuleSoftwareCategory(string $action, array $input = [], array $params = [])
 * @method array RuleSoftwareCategoryCollection(string $action, array $input = [], array $params = [])
 * @method array RuleTicket(string $action, array $input = [], array $params = [])
 * @method array RuleTicketCollection(string $action, array $input = [], array $params = [])
 * @method array SLA(string $action, array $input = [], array $params = [])
 * @method array SlaLevel(string $action, array $input = [], array $params = [])
 * @method array SlaLevel_Ticket(string $action, array $input = [], array $params = [])
 * @method array SlaLevelAction(string $action, array $input = [], array $params = [])
 * @method array SlaLevelCriteria(string $action, array $input = [], array $params = [])
 * @method array Software(string $action, array $input = [], array $params = [])
 * @method array SoftwareCategory(string $action, array $input = [], array $params = [])
 * @method array SoftwareLicense(string $action, array $input = [], array $params = [])
 * @method array SoftwareLicenseType(string $action, array $input = [], array $params = [])
 * @method array SoftwareVersion(string $action, array $input = [], array $params = [])
 * @method array SolutionTemplate(string $action, array $input = [], array $params = [])
 * @method array SolutionType(string $action, array $input = [], array $params = [])
 * @method array SsoVariable(string $action, array $input = [], array $params = [])
 * @method array State(string $action, array $input = [], array $params = [])
 * @method array Supplier(string $action, array $input = [], array $params = [])
 * @method array Supplier_Ticket(string $action, array $input = [], array $params = [])
 * @method array SupplierType(string $action, array $input = [], array $params = [])
 * @method array TaskCategory(string $action, array $input = [], array $params = [])
 * @method array Ticket(string $action, array $input = [], array $params = [])
 * @method array Ticket_Ticket(string $action, array $input = [], array $params = [])
 * @method array Ticket_User(string $action, array $input = [], array $params = [])
 * @method array TicketCost(string $action, array $input = [], array $params = [])
 * @method array TicketFollowup(string $action, array $input = [], array $params = [])
 * @method array TicketRecurrent(string $action, array $input = [], array $params = [])
 * @method array TicketSatisfaction(string $action, array $input = [], array $params = [])
 * @method array TicketTask(string $action, array $input = [], array $params = [])
 * @method array TicketTemplate(string $action, array $input = [], array $params = [])
 * @method array TicketTemplateHiddenField(string $action, array $input = [], array $params = [])
 * @method array TicketTemplateMandatoryField(string $action, array $input = [], array $params = [])
 * @method array TicketTemplatePredefinedField(string $action, array $input = [], array $params = [])
 * @method array TicketValidation(string $action, array $input = [], array $params = [])
 * @method array Transfer(string $action, array $input = [], array $params = [])
 * @method array User(string $action, array $input = [], array $params = [])
 * @method array UserCategory(string $action, array $input = [], array $params = [])
 * @method array UserEmail(string $action, array $input = [], array $params = [])
 * @method array UserTitle(string $action, array $input = [], array $params = [])
 * @method array VirtualMachineState(string $action, array $input = [], array $params = [])
 * @method array VirtualMachineSystem(string $action, array $input = [], array $params = [])
 * @method array VirtualMachineType(string $action, array $input = [], array $params = [])
 * @method array Vlan(string $action, array $input = [], array $params = [])
 * @method array WifiNetwork(string $action, array $input = [], array $params = [])
 *
 */
class ItemHandler {
   /**
    * @var Client
    */
   protected $client;

   /**
    * ItemHandler constructor.
    * @param Client $client
    */
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
   public function getItem($itemType, $id, array $queryString = []) {
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
   public function addItems($itemType, array $queryString) {
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
   public function updateItems($itemType, $id, array $queryString) {
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
    * Delete an object
    * @param string $itemType
    * @param integer $id
    * @param array $inputValues
    * @param array $queryString
    * @return array
    */
   public function deleteItems($itemType, $id, array $inputValues = [], array $queryString = []) {
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
            $result = $this->addItems($name, $input);
            break;
         case 'read':
            $result = $this->getItem($name, (int)$input, $params);
            break;
         case 'update':
            $result = $this->updateItems($name, '', $input);
            break;
         case 'delete':
            $result = $this->deleteItems($name, '', $input, $params);
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