---
layout: home
---
# Warning

This library is WIP, created to develop Flyve MDM. 

## How to install

{% highlight shell %}

composer require glpi-project/rest-api-client

{% endhighlight %}

## How to use

{% highlight php %}

use GlpiProject\API\Rest\Client;
use GuzzleHttp\Client as HttpClient;

// Instanciate the API client
$client = new Client(new HttpClient(), 'http://localhost/glpi/apirest.php/');

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

{% endhighlight %}
