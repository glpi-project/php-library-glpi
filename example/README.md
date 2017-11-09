This library specifically designed for PHP, features several functionalities common to all GLPI APIs

## Examples

This directory has simple examples of use for this library printing the results directly to the output.
You can see the results of the examples adjusting the url of your glpi installation in the example files and run it through the console with

```bash
    $ php -f example.php
    $ php -f magicCallExample.php
```

# example.php file

This file explains how to use the available end points from GLPI with the EndPointHandler class and how to work with Item Types with ItemHandler class.

# magicCallExample

This example can show you how to work with core Item Types (computers, users, tickets, etc.) from GLPI. There is a special function in ItemHandler and its allows you to call directly the Item Type by its name and work with [CRUD](https://www.wikipedia.org/wiki/CRUD) functions