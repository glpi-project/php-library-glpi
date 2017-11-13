<?php

use Sami\Version\GitVersionCollection;

$dir = __DIR__ . '/../src';

$options = [
   'template_dirs' => [__DIR__ . '/docsTheme/'],
   'theme' => 'teclib',
   'title' => 'GLPI API Client Library for PHP',
   'build_dir' => __DIR__ . '/../build/docs/%version%',
   'cache_dir' => __DIR__ . '/../build/cache/%version%',
   'simulate_namespaces' => true,
   'default_opened_level' => 1,
//   'versions' => $versions,
];

$sami = new Sami\Sami($dir, $options);

return $sami;