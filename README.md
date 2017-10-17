# GLPI API Client Library for PHP

![GLPI banner](https://user-images.githubusercontent.com/29282308/31666160-8ad74b1a-b34b-11e7-839b-043255af4f58.png)

[![License](https://img.shields.io/github/license/flyve-mdm/flyve-mdm-android-inventory-agent.svg?&label=License)](https://github.com/flyve-mdm/composer-package-glpi/blob/develop/LICENSE.md)
[![Follow twitter](https://img.shields.io/twitter/follow/FlyveMDM.svg?style=social&label=Twitter&style=flat-square)](https://twitter.com/FlyveMDM)
[![Telegram Group](https://img.shields.io/badge/Telegram-Group-blue.svg)](https://t.me/flyvemdm)
[![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-yellow.svg)](https://conventionalcommits.org)

Flyve MDM is a mobile device management software that enables you to secure and manage all the mobile devices of your business via a unique web-based console (MDM).

To get started, check out [Flyve MDM website](https://flyve-mdm.com/)!

## Table of Contents

* [Synopsis](#synopsis)
* [Build Status](#build-status)
* [Installation](#installation)
* [Code examples](#code-examples)
* [Documentation](#documentation)
* [Versioning](#versioning)
* [Contact](#contact)
* [Contribute](#contribute)
* [Copying](#copying)

## Synopsis

This library specifically designed for PHP, features several functionalities common to all GLPI APIs, for example:

- HTTP transport to APIs
- Error handling 
- Authentication
- JSON parsing
- Batching

You will be able to call to all the methods that belong to the [GLPI REST API](https://dev.flyve.org/glpi/apirest.php), for more information visit the [projects website](http://flyve.org/composer-package-glpi/).

This project is a **work in progress**. The information here provided could change at any given time.

## Build Status

|**Release channel**|Beta Channel|
|:---:|:---:|
|||

## Installation

```shell
composer require glpi-project/rest-api-client
```

## Code examples

It's easy to implement, as you see in the following example:

```php
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
```

## Documentation

We maintain a detailed documentation of the project in the [project's website](http://flyve.org/composer-package-glpi/).

## Versioning

In order to provide transparency on our release cycle and to maintain backward compatibility, Flyve MDM is maintained under [the Semantic Versioning guidelines](http://semver.org/). We are committed to following and complying with the rules, the best we can.

See [the tags section of our GitHub project](https://github.com/flyve-mdm/composer-package-glpi/tags) for changelogs for each release version of Flyve MDM. Release announcement posts on [the official Teclib' blog](http://www.teclib-edition.com/en/communities/blog-posts/) contain summaries of the most noteworthy changes made in each release.

## Contact

For notices about major changes and general discussion of Flyve MDM development, subscribe to the [/r/FlyveMDM](http://www.reddit.com/r/FlyveMDM) subreddit.
You can also chat with us via IRC in [#flyve-mdm on freenode](http://webchat.freenode.net/?channels=flyve-mdm]) or [@flyvemdmdev on Telegram](https://t.me/flyvemdmdev).

## Contribute

Want to file a bug, contribute some code, or improve documentation? Excellent! Read up on our
guidelines for [contributing](./CONTRIBUTING.md) and then check out one of our issues in the [Issues Dashboard](https://github.com/flyve-mdm/composer-package-glpi/issues).

## Copying

* **Name**: [Flyve MDM](https://flyve-mdm.com/) is a registered trademark of [Teclib'](http://www.teclib-edition.com/en/).
* **Code**: you can redistribute it and/or modify
    it under the terms of the GNU General Public License ([GPLv3](https://www.gnu.org/licenses/gpl-3.0.en.html)).
* **Documentation**: released under Attribution 4.0 International ([CC BY 4.0](https://creativecommons.org/licenses/by/4.0/)).
