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