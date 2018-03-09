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
    * regex pattern of the version in composer.json file
    * @return string
    */
   public static function getVersionPattern() {
      return '"version": "([^,]*)",';
   }

   /**
    * Task to create the changelog of the project
    * @param string $repository name
    * @return \Robo\Result|\Robo\ResultData
    * @throws Exception
    */
   public function makeChangelog($repository) {
      $repoPrefix = 'remotes/upstream/';
      $parentRevision = 'master';
      $currentRevision = 'develop';

      $changelog = $this->taskChangelog();
      $command = 'git describe --abbrev=0 --tags';
      $lastTag = $this->_exec($command)->getMessage();
      if ($lastTag) {
         // if tags exist check against the last one
         $parentRevision = 'tags/' . trim($lastTag);
      } else if (!$this->_exec("git ls-remote upstream $parentRevision")->getMessage()) {
         // master branch does not exist, let's go against first parent as first time ever revision check
         $message = $this->_exec("git rev-list --max-parents=0 HEAD")->getMessage();
         $parentRevision = trim($message);
         $currentRevision = 'HEAD';
      }

      // default revision range
      $fromRev = $repoPrefix . $parentRevision;
      $toRev = $repoPrefix . $currentRevision;
      if ($currentRevision == 'HEAD') {
         // first time ever revision check fix, prefix can't be used.
         $fromRev = $parentRevision;
         $toRev = $currentRevision;
      }

      $this->stopOnFail(true);
      $command = 'git log --pretty=" * %s ([%h](https://github.com/' . $repository . '/commit/%h))"  ' . $fromRev . '..' . $toRev . ' --grep="^fix" --grep="^feat" --grep=="^perf"';
      $result = $this->_exec($command)->getMessage();
      if (empty($result)) {
         return Robo\Result::cancelled('No new commits for release an update');
      }
      if (preg_match('/(BREAKING CHANGE:)|(^ \* feat)/m', $result, $regs)) {
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
      $this->setVersionFromComposer('composer.json');
      $newVersion = $this->newVersion = $this->generateNextVersion($this->version);
      $result = ($result) ? $result : ' * Minor changes, for more details see our [commit history](https://github.com/' . $repository . '/compare/master...' . $newVersion . '/bugfixes)';
      $changelog->filename('CHANGELOG.md')
         ->version("[" . $newVersion . "](https://github.com/$repository/tree/" . $newVersion . ") (" . date('Y-m-d') . ")")
         ->setBody($result)
         ->run();
   }

   /**
    * Task to publish a release similar to git-flow
    * @param $repository
    * @param string $label
    * @param string $origin
    * @throws Exception
    */
   public function publishRelease($repository, $label = 'none', $origin = '') {
      if (!in_array($label, ['rc', 'beta', 'alpha', 'none'])) {
         throw new \InvalidArgumentException('Release label, can be rc, beta, alpha or none');
      }
      $this->options['label'] = $label;

      // changelog generation
      $result = $this->makeChangelog($repository);
      if (null !== $result && $result->wasCancelled()) {
         $this->say($result->getMessage());
         return;
      }

      $newVersion = $this->newVersion;
      $releaseBranch = 'release/' . $newVersion;

      // git-flow start
      $this->taskGitStack()->checkout('-b ' . $releaseBranch)->run();

      // Continue the git flow
      $filename = 'CHANGELOG.md';
      $commitMessage = 'docs: updated project files for new release.';
      $composerFile = 'composer.json';
      $this->composerUpdate($composerFile);
      $this->taskGitStack()->add($filename)->add($composerFile)
         ->commit($commitMessage, '--no-gpg-sign')
         ->checkout('-b robo-master upstream/master')
         ->merge($releaseBranch)->tag($newVersion)
         ->checkout('-b robo-develop upstream/develop')->merge($releaseBranch)
         ->run();

      // finish git-flow with delete release branch
      $this->taskGitStack()->exec('branch -D ' . $releaseBranch)->run();

      // make changelog for gh-pages
      $this->taskGitStack()->checkout('-b robo-gh-pages upstream/gh-pages')->checkout('robo-develop ' . $filename)->run();
      $this->_exec('sed -i "1s/^/---\\nlayout: modal\\ntitle: changelog\\n---\\n/" ' . $filename);
      $this->taskGitStack()->add($filename)->commit($commitMessage, '--no-gpg-sign')->run();

      // publish the changes
      if ($origin) {
         $this->taskGitStack()
            ->push($origin, 'robo-gh-pages:gh-pages')
            ->push($origin, 'robo-develop:develop')
            ->push($origin, 'robo-master:master')
            ->push($origin, $newVersion)
            ->run();
      }
   }

   /**
    * @param string $composerFile
    */
   private function composerUpdate($composerFile) {
      $fileContent = $this->getComposerContent($composerFile);
      $pattern = self::getVersionPattern();
      if (!preg_match('/' . $pattern . '/', $fileContent)) {
         // composer.json doesn't have the version string, let's add it
         $fileDecoded = json_decode($fileContent, true);
         $fileDecoded = ['version' => $this->version] + $fileDecoded;
         $fileContent = json_encode($fileDecoded, JSON_PRETTY_PRINT);
      }
      $fileContent = preg_replace('/' . $pattern . '/', '"version": "' . $this->newVersion . '",',
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
    * @param string $composerFile
    */
   private function setVersionFromComposer($composerFile) {
      $fileContent = $this->getComposerContent($composerFile);
      if (preg_match('/' . self::getVersionPattern() . '/', $fileContent, $regs)) {
         $this->version = $regs[1];
      }
   }

   /**
    * @param string $composerFile
    * @return bool|string
    */
   private function getComposerContent($composerFile) {
      if (!file_exists($composerFile)) {
         throw new \RuntimeException("Impossible to find the composer file ($composerFile)");
      }
      $fileContent = file_get_contents($composerFile);
      return $fileContent;
   }
}