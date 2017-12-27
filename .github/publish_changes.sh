#!/bin/sh
# please set the $GH_TOKEN in your travis dashboard

if [ "$TRAVIS_BRANCH" = "master" ] || [ "$TRAVIS_BRANCH" = "develop" ] && [ "$TRAVIS_REPO_SLUG" = "glpi-project/php-library-glpi" ]; then
    wget http://get.sensiolabs.org/sami.phar -O "$HOME/bin/sami.phar"
    # setup_git only for the main repo and not forks
    git config --global user.email "deploy@travis-ci.org"
    git config --global user.name "Deployment Bot"
    git remote add upstream https://"$GH_TOKEN"@github.com/"$TRAVIS_REPO_SLUG".git > /dev/null 2>&1
    git fetch upstream

    if [ "$TRAVIS_BRANCH" = "develop" ]; then
        git stash save -u
        vendor/bin/robo publish:release "$TRAVIS_REPO_SLUG" none upstream
        git checkout "$TRAVIS_BRANCH"
        git stash pop
    fi

    # check if gh-pages exist in remote
    if [ "git branch -r --list upstream/gh-pages" ]; then
        # clean the repo and generate the docs
        git checkout composer.lock
        php $HOME/bin/sami.phar update "$TRAVIS_BUILD_DIR"/.github/samiConfig.php --force
        find build/ -type f -name "*.html" -exec sed -i "1s/^/---\\nlayout: container\\n---\\n/" "{}" \;

        # commit_website_files
        git add build/tests/coverage/*
        git add build/docs/*
        git checkout -b localCi
        git commit -m "changes to be merged"
        git checkout -b gh-pages upstream/gh-pages
        git checkout localCi build/

        # upload_files
        git commit --message "docs(*): update code coverage and test result"
        git rebase upstream/gh-pages
        git push --quiet --set-upstream upstream gh-pages --force
    fi
fi
