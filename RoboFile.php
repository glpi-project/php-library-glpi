<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */

class RoboFile extends \Robo\Tasks {

   /**
    * @var string
    */
   var $version = '0.0.0';
   var $newVersion;
   var $releaseType = 'patch';


   var $options = [];

   /**
    * Task to create the changelog of the project
    * @param string $repository name
    * @return \Robo\Result
    */
   public function makeChangelog($repository) {
      $changelog = $this->taskChangelog();
      $command = 'git log --pretty=" * %s ([%h](https://github.com/' . $repository . '/commit/%h))" master..develop --grep="^fix" --grep="^feat" --grep=="^perf"';
      $result = $this->_exec($command)->getMessage();
      if ($result) {
         $this->newVersion = $this->version;
         if (preg_match('/(BREAKING CHANGE:)|(^ \* feat)/', $result, $regs)) {
            var_dump($regs);
            switch ($regs[0]) {
               case 'BREAKING CHANGE:':
                  $this->releaseType = 'major';
                  break;
               case ' * feat':
                  $this->releaseType = 'minor';
                  break;
               // by default is patch
            }
         }
         $this->composerGetVersion('composer.json');
         $this->newVersion = $this->generateNextVersion($this->version);
         $changelog->filename('CHANGELOG.md')
            ->version("[" . $this->newVersion . "](https://github.com/$repository/tree/" . $this->newVersion . ") (" . date('Y-m-d') . ")")
            ->setBody($result)
            ->run();
      }
   }

   /**
    * Task to publish a release similar to git-flow
    * @param $repository
    * @param string $label
    */
   public function publishRelease($repository, $label = 'none') {
      $this->stopOnFail(true);
      $this->options['label'] = $label;

      // changelog generation
      $this->makeChangelog($repository);

      $releaseBranch = 'release/' . $this->newVersion;

      // git-flow start
      $this->taskGitStack()->checkout('-b ' . $releaseBranch)->run();

      // Continue the git flow
      $filename = 'CHANGELOG.md';
      $commitMessage = 'docs: updated project files for new release.';
      $composerFile = 'composer.json';
      $this->composerUpdate($composerFile);
      $this->taskGitStack()->add($filename)->add($composerFile)
         ->commit($commitMessage, '--no-gpg-sign')
         ->checkout('master')
         ->merge($releaseBranch)->tag($this->newVersion)
         ->checkout('develop')->merge($releaseBranch)
         ->run();

      // finish git-flow with delete release branch
      $this->taskGitStack()->exec('branch -D ' . $releaseBranch)->run();

      // make changelog for gh-pages
      $this->taskGitStack()->checkout('-b gh-pages')->checkout('develop ' . $filename)->run();
      $this->_exec('sed -i "1s/^/---\\nlayout: modal\\ntitle: changelog\\n---\\n/" ' . $filename)
         ->run();
      $this->taskGitStack()->add($filename)->commit($commitMessage, '--no-gpg-sign')->run();

      // publish the changes
      /*$this->taskGitStack()
         ->push('origin', 'gh-pages')
         ->push('origin', 'develop')
         ->push('origin', 'master')
         ->run();*/

   }

   private function composerUpdate($composerFile) {
      $fileContent = $this->composerGetContent($composerFile);
      $fileContent = preg_replace('/("version":[^,]*,)/', '"version": "' . $this->newVersion . '",',
         $fileContent);
      file_put_contents($composerFile, $fileContent);
   }

   /**
    * Generate the next semantic version
    * @param $currentVersion
    * @return string
    * @throws Exception
    */
   private function generateNextVersion($currentVersion) {
      $type = $this->releaseType;

      $label = isset($this->options['label']) ? $this->options['label'] : 'none';

      // Type validation
      $validTypes = ['patch', 'minor', 'major'];
      if (!in_array($type, $validTypes)) {
         throw new \InvalidArgumentException(
            'The option [type] must be one of: {' . implode($validTypes,
               ', ') . "}, \"$type\" given"
         );
      }

      $versionRegex = '(?:(\d+\.\d+\.\d+)(?:(-)([a-zA-Z]+)(\d+)?)?)';
      if (!preg_match('#^' . $versionRegex . '$#', $currentVersion)) {
         throw new \Exception('Current version format is invalid (' . $currentVersion . '). It should be major.minor.patch');
      }

      $matches = null;
      preg_match('$' . $versionRegex . '$', $currentVersion, $matches);
      // if last version is with label
      if (count($matches) > 3) {
         list($major, $minor, $patch) = explode('.', $currentVersion);
         $patch = substr($patch, 0, strpos($patch, '-'));

         if ($label != 'none') {
            // increment label
            $labelVersion = '';
            if (array_key_exists(3, $matches)) {
               $oldLabel = $matches[3];
               $labelVersion = 2;

               // if label is new clear version
               if ($label !== $oldLabel) {
                  $labelVersion = false;
               } else if (array_key_exists(4, $matches)) {
                  // if version exists increment it
                  $labelVersion = intval($matches[4]) + 1;
               }
            }

            return implode([$major, $minor, $patch], '.') . '-' . $label . $labelVersion;
         }

         return implode([$major, $minor, $patch], '.');
      }

      list($major, $minor, $patch) = explode('.', $currentVersion);
      // Increment
      switch ($type) {
         case 'major':
            $major += 1;
            $patch = $minor = 0;
            break;
         case 'minor':
            $minor += 1;
            $patch = 0;
            break;
         default:
            $patch += 1;
            break;
      }

      // new label
      if ($label != 'none') {
         return implode([$major, $minor, $patch], '.') . '-' . $label;
      }

      return implode([$major, $minor, $patch], '.');
   }

   /**
    * @param $composerFile
    * @return bool|string
    */
   private function composerGetVersion($composerFile) {
      $fileContent = $this->composerGetContent($composerFile);
      if (preg_match('/"version": "([^,]*)",/', $fileContent, $regs)) {
         $this->version = $regs[1];
      }
      return $fileContent;
   }

   /**
    * @param $composerFile
    * @return bool|string
    */
   private function composerGetContent($composerFile) {
      if (!file_exists($composerFile)) {
         throw new \RuntimeException("Impossible to find the composer file ($composerFile)");
      }
      $fileContent = file_get_contents($composerFile);
      return $fileContent;
   }
}