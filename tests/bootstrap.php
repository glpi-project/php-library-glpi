<?php
require __DIR__ . '/../vendor/autoload.php';

$glpiUrl = getenv('GLPI_URL');
if (empty($glpiUrl)) {
   die('environment variable GLPI_URL not set' . PHP_EOL);
}
$glpiUrl = trim($glpiUrl, '/') . '/';
define('GLPI_URL', $glpiUrl);