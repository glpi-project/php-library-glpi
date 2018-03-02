<?php

use Sami\Version\GitVersionCollection;

$dir = __DIR__ . '/../src';

$options = [
   'template_dirs' => [__DIR__ . '/docsTheme/'],
   'theme' => 'teclib',
   'title' => 'GLPI API Client Library for PHP',
   'build_dir' => __DIR__ . '/../build/docs/develop',
   'cache_dir' => __DIR__ . '/../build/cache/develop',
   'simulate_namespaces' => true,
   'default_opened_level' => 1,
];

$sami = new Sami\Sami($dir, $options);

return $sami;