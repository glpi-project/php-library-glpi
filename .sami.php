<?php


use Sami\Version\GitVersionCollection;

$dir = 'src';
/*$versions = GitVersionCollection::create($dir)
   //->addFromTags('v1.*')
   //->add('master', 'master branch')
   //->add('develop', 'develop branch')
   ->add('fetaure/client_updates', 'fetaure/client_updates branch')
;*/
return new Sami\Sami($dir, [
   'theme' => 'default',
   'title' => 'GLPI API Client Library for PHP',
   'build_dir' => __DIR__ . '/build/twig/%version%',
   'cache_dir' => __DIR__ . '/cache/twig/%version%',
   'simulate_namespaces' => true,
   'default_opened_level' => 1,
//   'versions' => $versions,
]);