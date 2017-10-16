<?php

namespace GlpiProject\API\Rest;


class ItemHandler
{
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
      $response = $this->client->request('get', $itemType . '/' . $id, $queryString);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    *  Return a collection of rows of the itemtype.
    * @param $itemType
    * @param array $queryString
    * @return array
    */
   public function getAllItems($itemType, array $queryString = []) {
      $response = $this->client->request('get', $itemType . '/', $queryString);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    *  Return a collection of rows of the itemtype.
    * @param $itemType
    * @param $id
    * @param $subItem
    * @param array $queryString
    * @return array
    */
   public function getSubItems($itemType, $id, $subItem, array $queryString = []) {
      $response = $this->client->request('get', $itemType . '/' . $id . '/' . $subItem,
         $queryString);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Virtually call Get an item for each line in input. So, you can have a ticket, an user in the same query.
    * @param array $queryString
    * @return array
    */
   public function getMultipleItems(array $queryString = []) {
      $response = $this->client->request('get', 'getMultipleItems', $queryString);
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
   public function listSearchOptions($itemType, array $queryString = []) {
      $response = $this->client->request('get', 'listSearchOptions/' . $itemType, $queryString);
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
      $response = $this->client->request('get', 'search/' . $itemType, $queryString);
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
   public function addItem($itemType, array $queryString = []) {
      $queryString['input'] = $queryString;
      $response = $this->client->request('post', $itemType . '/', $queryString);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Update an object (or multiple objects) existing in GLPI.
    * @param $itemType
    * @param $id
    * @param array $queryString
    * @return array
    */
   public function updateItem($itemType, $id, array $queryString = []) {
      $queryString['input'] = $queryString;
      $response = $this->client->request('put', $itemType . '/' . $id, $queryString);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   public function deleteItem($itemType, $id, array $queryString = []) {
      $queryString['input'] = $queryString;
      $response = $this->client->request('delete', $itemType . '/' . $id, $queryString);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

}