<?php

use mageekguy\atoum\reports\coverage;
use mageekguy\atoum\writers\std;

$branch = getenv('TRAVIS_BRANCH');
if ($branch && in_array($branch, ['develop'])) {
   $script->addDefaultReport();

   $coverage = new coverage\html();
   $coverage->addWriter(new std\out());
   $coverage->setOutPutDirectory('build/tests/coverage');

   $runner->addReport($coverage);
}
