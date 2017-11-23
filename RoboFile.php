<?php
/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */

class RoboFile extends \Robo\Tasks {

   /**
    * Task to create the changelog of the project
    * @param $version
    * @param $repository
    * @return \Robo\Result
    */
   public function makeChangelog($version, $repository) {
      $changelog = $this->taskChangelog();
      $command = 'git log --pretty=" * %s ([%h](https://github.com/' . $repository . '/commit/%h))" master..develop --grep="fix(" --grep="feat(" --grep=="perf("';
      $result = $this->_exec($command)->getMessage();
      if ($result) {
         $changelog->filename('CHANGELOG.md')
            ->version("[$version](https://github.com/$repository/tree/$version) (" . date('Y-m-d') . ")")
            ->setBody($result)
            ->run();
      }
   }

   /**
    * Task to publish a release similar to git-flow
    * @param $version
    * @param $repository
    */
   public function publishRelease($version, $repository) {
      $releaseBranch = 'release/' . $version;
      $this->stopOnFail(true);

      // git-flow start
      $this->taskGitStack()->checkout('-b ' . $releaseBranch)->run();

      // changelog generation
      $this->makeChangelog($version, $repository);

      // Continue the git flow
      $filename = 'CHANGELOG.md';
      $commitMessage = 'docs(changelog): updated changelog for new release.';
      $this->taskGitStack()->add($filename)
         ->commit($commitMessage, '--no-gpg-sign')
         ->checkout('master')
         ->merge($releaseBranch)->tag($version)
         ->checkout('develop')->merge($releaseBranch)
         ->run();

      // finish git-flow with delete release branch
      $this->taskGitStack()->exec('branch -D ' . $releaseBranch)->run();

      // make changelog for gh-pages
      $this->taskGitStack()->checkout('-b gh-pages')->checkout('develop ' . $filename)->run();
      $this->_exec('sed -i "1s/^/---\\nlayout: modal\\ntitle: changelog\\n---\\n/" ' . $filename)->run();
      $this->taskGitStack()->add($filename)->commit($commitMessage, '--no-gpg-sign')->run();

      // publish the changes
      /*$this->taskGitStack()
         ->push('origin', 'gh-pages')
         ->push('origin', 'develop')
         ->push('origin', 'master')
         ->run();*/

   }

}