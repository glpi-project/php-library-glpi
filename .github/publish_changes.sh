#!/bin/bash
# please set the $GH_TOKEN in your travis dashboard

if [ "$TRAVIS_BRANCH" = "develop" ] && [ "$TRAVIS_PULL_REQUEST" = false ]; then
    # setup_git only for the main repo and not forks
    echo "Configuring git user"
    git config --global user.email "deploy@travis-ci.org"
    git config --global user.name "Deployment Bot"
    echo "adding and fetch a new remote"
    git remote add upstream https://"$GH_TOKEN"@github.com/"$TRAVIS_REPO_SLUG".git > /dev/null 2>&1
    git fetch upstream

    if [ "$TRAVIS_BRANCH" = "develop" ] && [[ "$TRAVIS_COMMIT_MESSAGE" == *"trigger release"* ]]; then
        echo "generating the release"
        git stash save -u
        vendor/bin/robo publish:release "$TRAVIS_REPO_SLUG" none upstream
        git checkout "$TRAVIS_BRANCH"
        git stash pop
    fi

    # check if gh-pages exist in remote
    if [ "git branch -r --list upstream/gh-pages" ]; then
        echo "generating the docs"
        # clean the repo and generate the docs
        git checkout composer.lock
        wget http://get.sensiolabs.org/sami.phar -O "$HOME/bin/sami.phar"
        php "$HOME"/bin/sami.phar update "$TRAVIS_BUILD_DIR"/.github/samiConfig.php --force
        find build/docs/ -type f -name "*.html" -exec sed -i "1s/^/---\\nlayout: jazzy\\n---\\n/" "{}" \;
        find build/docs/ -type f -name "*.html" -exec sed -i "/css\/bootstrap/d" "{}" \;
        find build/docs/ -type f -name "*.html" -exec sed -i "/bootstrap.min.js/d" "{}" \;
        find build/docs/ -type f -name "*.html" -exec sed -i "/sami.css/d" "{}" \;
        find build/tests/ -type f -name "*.html" -exec sed -i "1s/^/---\\nlayout: coverage\\n---\\n/" "{}" \;
        find build/tests/coverage/ -type f -name "*.html" -exec sed -i "/bootstrap.min.css/d" "{}" \;
        find build/tests/coverage/ -type f -name "*.html" -exec sed -i "/report.css/d" "{}" \;

        # commit_website_files
        echo "adding the reports"
        git add build/tests/coverage/*
        git add build/docs/*
        echo "creating a branch for the new documents"
        git checkout -b localCi
        git commit -m "changes to be merged"
        git checkout -b gh-pages upstream/gh-pages
        git rm -r build/
        git checkout localCi build/

        # upload_files
        echo "pushing the up to date documents"
        git commit --message "docs: update tests reports"
        git rebase upstream/gh-pages
        git push --quiet --set-upstream upstream gh-pages --force
    fi
fi
