# Warning

This library is WIP, created to develop Flyve MDM. 

# How to install

```shell
composer require glpi-project/rest-api-client
```

# How to use

```php
use Glpi\Api\Rest\Client;

// Instanciate the API client
$client = new Client('http://localhost/glpi/apirest.php/');

// Authenticate
if (!$client->initSessionByCredentials('glpi', 'glpi')) {
   die('failed to authenticate');
}

// The client handles the session token for you (app token not yet supported)

// do something
try {
   $response = $client->computer('post', ['name' => 'computer 0001']);
} catch (\Exception $e) {
   // Handle here HTTP >= 400
}
```
