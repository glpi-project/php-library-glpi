# 

# How to install

```shell
composer require glpi-project/rest-api-client
```

# How to use

```php
use GlpiProject\API\Rest\Client;
use GuzzleHttp\Client as HttpClient;

$client = new Client.php(new HttpClient(['base_uri' => "http://localhost/glpi/apirest.php/"]));