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


/**
 * Class EndPointHandler
 * @package Glpi\Api\Rest
 */
class EndPointHandler {

   /**
    * @var Client
    */
   protected $client;

   /**
    * EndPointHandler constructor.
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
    * Return all the profiles associated to logged user.
    * @return array
    */
   public function getMyProfiles() {
      $response = $this->client->request('get', 'getMyProfiles');
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Return the current active profile.
    * @return array
    */
   public function getActiveProfile() {
      $response = $this->client->request('get', 'getActiveProfile');
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Change active profile to the profiles_id one.
    * @see getMyProfiles endpoint for possible profiles.
    *
    * @param integer $profiles_id
    * @return array
    */
   public function changeActiveProfile($profiles_id) {
      $options['body'] = json_encode(['profiles_id' => $profiles_id]);
      $response = $this->client->request('post', 'changeActiveProfile', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Return all the possible entities of the current logged user (and for current active profile).
    * @param array $queryString
    * @return array
    */
   public function getMyEntities(array $queryString = []) {
      $options['query'] = $queryString;
      $response = $this->client->request('get', 'getMyEntities', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Return active entities of current logged user.
    * @return array
    */
   public function getActiveEntities() {
      $response = $this->client->request('get', 'getActiveEntities');
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

   /**
    * Change active entity to the entities_id one.
    * @see getMyEntities endpoint for possible entities.
    *
    * @param array $parameters
    * @return array
    */
   public function changeActiveEntities(array $parameters = []) {
      $options = [];
      if ($parameters) {
         $options['body'] = json_encode($parameters);
      }
      $response = $this->client->request('post', 'changeActiveEntities', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }

}