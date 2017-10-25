# Warning

This library is WIP, created to develop Flyve MDM. 

# How to install

```shell
composer require glpi-project/rest-api-client
```

# How to use

```php
// Instanciate the API client
$client = new Glpi\Api\Rest\Client('http://localhost/glpi/apirest.php/');

// Authenticate
try {
   $client->initSessionByCredentials('glpi', 'glpi');
} catch (Exception $e) {
   echo $e->getMessage();
   die();
}

// The client handles the session token for you (app token not yet supported)

// do something
$itemHandler = new \Glpi\Api\Rest\ItemHandler($client);
$response = $itemHandler->getAnItem('User', 2);
$user = json_decode($response['body']);
echo "User name: " . $user->name . "\n";
```
