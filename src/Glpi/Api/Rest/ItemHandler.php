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


use Glpi\Api\Rest\Exception\InsufficientArgumentsException;

class ItemHandler {
   /**
    * @var Client
    */
   protected $client;

   public function __construct(Client $client) {
      $this->client = $client;
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
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
         'contentRange' => $response->getHeader('Content-Range')[0],
         'acceptRange' => $response->getHeader('Accept-Range')[0],
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
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
         'contentRange' => $response->getHeader('Content-Range')[0],
         'acceptRange' => $response->getHeader('Accept-Range')[0],
      ];
   }

   /**
    * Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.
    * @param array $items
    * @param array $queryString
    * @return array
    */
   public function getMultipleItems(array $items, array $queryString = []){
      foreach($items as $item){
         if (!key_exists('itemtype', $item) || !key_exists('items_id', $item)) {
            throw new InsufficientArgumentsException("'itemtype' and 'items_id' are mandatory");
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
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
         'location' => $response->getHeader('location')[0],
         'link' => $response->getHeader('Link')[0],
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
         if(!$queryString){
            throw new InsufficientArgumentsException("a key named 'id' to identify the item is mandatory");
         }
         foreach ($queryString as $item) {
            if (is_array($item) && !array_key_exists('id', $item)) {
               throw new InsufficientArgumentsException("a key named 'id' to identify the item is mandatory");
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
         if(!$inputValues){
            throw new InsufficientArgumentsException("a key named 'id' to identify the item is mandatory");
         }
         foreach ($inputValues as $item) {
            if (is_array($item) && !array_key_exists('id', $item)) {
               throw new InsufficientArgumentsException("a key named 'id' to identify the item is mandatory");
            }
         }
         $options['body'] = json_encode(['input' => $inputValues]);
      }
      if($queryString){
         $options['query'] = $queryString;
      }
      $response = $this->client->request('delete', $itemType . '/' . $id, $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

}