<?php


namespace GlpiProject\API\Rest;


class EndPointHandler
{

   /**
    * @var Client
    */
   protected $client;

   public function __construct(Client $client) {
      $this->client = $client;
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
    * @param $profiles_id
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
    * @param array $options
    * @return array
    */
   public function getMyEntities(array $options = []) {
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
    * @param array $options
    * @return array
    */
   public function changeActiveEntities(array $options = []) {
      $response = $this->client->request('post', 'changeActiveEntities', $options);
      return [
         'statusCode' => $response->getStatusCode(),
         'body' => $response->getBody()->getContents(),
      ];
   }


}