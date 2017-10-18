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

namespace GlpiProject\API\Rest;


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
    * @param $itemType
    * @param $id
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
    * @param $itemType
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
    * @param $itemType
    * @param $id
    * @param $subItem
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
    * @param array $queryString
    * @return array
    */
   public function getMultipleItems(array $queryString){
      $options['query'] = $queryString;
      $response = $this->client->request('get', 'getMultipleItems', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents()
      ];
   }

   /**
    * Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.
    * @param $itemType
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
    * @param $itemType
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
    * @param $itemType
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
    * @param $itemType
    * @param $id
    * @param array $queryString
    * @return array
    */
   public function updateItem($itemType, $id, array $queryString) {
      $options['body'] = json_encode(['input' => $queryString]);
      $response = $this->client->request('put', $itemType . '/' . $id, $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * @param $itemType
    * @param $id
    * @param array $queryString
    * @return array
    */
   public function deleteItem($itemType, $id, array $queryString = []) {
      $options = [];
      if($queryString){
         $options['body'] = json_encode(['input' => $queryString]);
      }
      $response = $this->client->request('delete', $itemType . '/' . $id, $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

}