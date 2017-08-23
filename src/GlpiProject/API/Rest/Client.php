<?php
namespace GlpiProject\API\Rest;
use GuzzleHttp\Client as HttpClient;
use Exception;

class Client {

   /** @var HttpClient instance of the HTTP client */
   private $httpClient = null;

   /** @var string URL to the GLPI API rest */
   private $url;

   /** @var string Session token obtained after initSession() */
   private $sessionToken = '';

   public function __construct(HttpClient $httpClient, $url) {
      $this->httpClient = $httpClient;
      $this->url = $url;
   }

   public function initSessionByCredentials($user, $password) {
      $response = $this->httpClient->get($this->url . 'initSession', ['auth' => [$user, $password]]);
      if ($response->getStatusCode() != 200
          || !$this->sessionToken = json_decode( (string) $response->getBody(), true)['session_token']) {
         throw new Exception("Cannot connect to api");
      } else {
         return true;
      }
   }

   public function initSessionByUserToken($userToken) {
      $headers = $this->buildHeaders(['auth' => [$user, $password]]);
      $response = $this->httpClient->get($this->url . 'initSession', $headers);
      if ($response->getStatusCode() != 200
          || !$this->sessionToken = json_decode( (string) $response->getBody(), true)['session_token']) {
         throw new Exception("Cannot connect to api");
      }
   }

   /**
    * build a set of headers for the HTTP client by merging mandatory headers for rest API and provided ones
    *
    * @param array $headers
    *
    * @return array merged set of headers
    */
   private function buildHeaders(array $headers) {
      $headers['Content-Type'] = 'application/json';
      return $headers;
   }
}
