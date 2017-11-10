# GLPI API Client Library for PHP

![GLPI banner](https://user-images.githubusercontent.com/29282308/31666160-8ad74b1a-b34b-11e7-839b-043255af4f58.png)

[![License](https://img.shields.io/github/license/glpi-project/php-library-glpi.svg?&label=License)](https://github.com/glpi-project/php-library-glpi/blob/develop/LICENSE.md)
[![Follow twitter](https://img.shields.io/twitter/follow/GLPI_PROJECT.svg?style=social&label=Twitter&style=flat-square)](https://twitter.com/GLPI_PROJECT)
[![Project Status: WIP](http://www.repostatus.org/badges/latest/wip.svg)](http://www.repostatus.org/)
[![Telegram Group](https://img.shields.io/badge/Telegram-Group-blue.svg)](https://t.me/glpien)
[![Conventional Commits](https://img.shields.io/badge/Conventional%20Commits-1.0.0-yellow.svg)](https://conventionalcommits.org)

GLPI (_Gestionnaire Libre de Parc Informatique_) is a free IT Asset Management, issue tracking system and service desk solution. This open source software is written in PHP.

It helps companies to manage their information system, since it's able to build an inventory of all the organization's assets and to manage administrative and financial tasks.

## Table of Contents

* [Synopsis](#synopsis)
* [Build Status](#build-status)
* [Compatibility Matrix](#matrix)
* [Installation](#installation)
* [Code examples](#code-examples)
* [Documentation](#documentation)
* [Versioning](#versioning)
* [Contact](#contact)
* [Contribute](#contribute)
* [Copying](#copying)

## Synopsis

This library specifically designed for PHP, features several functionalities common to all GLPI APIs, for example:

* HTTP transport to APIs.
* Error handling
* Authentication
* JSON parsing
* Custom Item Types
* Media download/upload
* Batching.

You will be able to call to all the methods that belong to the [GLPI REST API](https://github.com/glpi-project/glpi/blob/master/apirest.md), for more information visit the [project's website](https://glpi-project.github.io/php-library-glpi/).

## Build Status

|**Release channel**|Beta Channel|
|:---:|:---:|
|[![Travis build](https://api.travis-ci.org/glpi-project/php-library-glpi.svg?branch=master)](https://travis-ci.org/glpi-project/php-library-glpi)|[![Travis build](https://api.travis-ci.org/glpi-project/php-library-glpi.svg?branch=develop)](https://travis-ci.org/glpi-project/php-library-glpi)|

## Matrix

|**GLPI Version**|9.1.1|9.1.2|9.1.3|9.1.5|9.1.6|9.2.0|
|:----|----|----|----|---|---|---|
|**GLPI API Client**|1.x|1.x|1.x|1.x|1.x|1.x|

## Installation

You will need the following minimum dependencies to use the library (composer will automatic check for the first two):

* PHP >= 5.6.0
* Guzzle >= 6.3
* GLPI >= 9.1.1

```shell
composer require glpi-project/php-library-glpi
```

## Code examples

It's easy to implement, as you see in the following example:

```php
// Instanciate the API client
$client = new Glpi\Api\Rest\Client('http://localhost/glpi/apirest.php/', new GuzzleHttp\Client());

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
$response = $itemHandler->getItem('User', 2);
$user = json_decode($response['body']);
echo "User name: " . $user->name . "\n";
```

## Documentation

We maintain a detailed documentation of the project on the [website](https://glpi-project.github.io/php-library-glpi/).

## Versioning

In order to provide transparency on our release cycle and to maintain backward compatibility, GLPI is maintained under [the Semantic Versioning guidelines](http://semver.org/). We are committed to following and complying with the rules, the best we can.

See [the tags section of our GitHub project](https://github.com/glpi-project/php-library-glpi/tags) for changelogs for each release version. Release announcement posts on [the official Teclib' blog](http://www.teclib-edition.com/en/communities/blog-posts/) contain summaries of the most noteworthy changes made in each release.

## Contact

For notices about major changes and general discussion of GLPI development, subscribe to the [/r/glpi](http://www.reddit.com/r/glpi) subreddit.
You can also chat with us via IRC in [#GLPI on freenode](http://webchat.freenode.net/?channels=GLPI]) or [@glpien on Telegram](https://t.me/glpien).

## Contribute

Want to file a bug, contribute some code, or improve documentation? Excellent! Read up on our
guidelines for [contributing](./CONTRIBUTING.md) and then check out one of our issues in the [Issues Dashboard](https://github.com/glpi-project/php-library-glpi/issues).

## Copying

* **Code**: you can redistribute it and/or modify
    it under the terms of the GNU General Public License ([GPLv3](https://www.gnu.org/licenses/gpl-3.0.en.html)).
* **Documentation**: released under Attribution 4.0 International ([CC BY 4.0](https://creativecommons.org/licenses/by/4.0/)).
