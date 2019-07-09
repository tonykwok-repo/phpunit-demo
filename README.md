# Starting PHPUnit Test
## Local and TravisCI Environmnts

### Requires the following installed before starting setup steps:
* git
* wget
* svn
* mysql
* (May need for PHPUnit) Ruby >= 2.3.x

### The steps perform the following actions:
* Pulls latest WordPress from repository
* Sets up a new MySQL schema using existing MySQL credentials
* Modifies wp-config.php in WordPress instance to use fresh MySQL schema
* Install WordPress using wp-config.php
* Install PHPUnit 7.13.x to run unit test in local instance


#### Grab this repository including PHPUnit tests, configuration files, WordPress installation script
`git clone --depth=50 --branch=master https://github.com/tonykwok-repo/phpunit-demo.git tonykwok-repo/phpunit-demo`
`cd tonykwok-repo/phpunit-demo`

#### Install PHPUnit 7 latest
`wget -O phpunit https://phar.phpunit.de/phpunit-7.phar`
`chmod +x phpunit`

#### Installs fresh WordPress installation and configures wp-config.php to use local MySQL, create schema for testing
`./bin/install-wp-tests.sh <db-name> <db-user> <db-pass> [db-host] latest`

#### Runs all tests in /test folder
`./phpunit`
