<?php

use Sami\Version\GitVersionCollection;

$dir = 'src';
return new Sami\Sami($dir, [
   'theme' => 'default',
   'title' => 'GLPI API Client Library for PHP',
   'build_dir' => __DIR__ . '/../build/docs/%version%',
   'cache_dir' => __DIR__ . '/../build/cache/%version%',
   'simulate_namespaces' => true,
   'default_opened_level' => 1,
//   'versions' => $versions,
]);