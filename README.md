[![Build Status](https://travis-ci.com/pixelant/wp-starter.svg?token=wzqK7t2fnYqKnxYxwzyk&branch=master)](https://travis-ci.com/pixelant/wp-starter)

# WP Starter
This WordPress starter is meant to enable better structure for WordPress projects considering development, deployment as well as maintainability.
The composer based WordPress structure is based on the [Bedrock](https://roots.io/bedrock/) project with some alterations to work better out of the box with the docker-compose also included.

## Get up and running ”out of the box”
1. Clone repository: `git clone git@github.com:pixelant/wp-starter.git`
2. Go to folder where you cloned repo to.
3. Copy **.env.example** to **.env**: `cp .env.example .env`.
4. Run composer install: `composer install`.
5. Start docker-compose for project: `docker-compose up`
6. Go to *http://localhost:8888*

## Adjust for specific project
1. Clone repository: `git clone git@github.com:pixelant/wp-starter.git`
2. Go to folder where you cloned repo to.
3. Replace docker-compose container names with your project specific name: `sed -i -e 's/wp_starter_/my_project_name_/g' docker-compose.yml`
4. Copy **.env.example** to **.env**: `cp .env.example .env`
5. Replace **DB_HOST** with the name of your docker db container in **.env** file. Example `DB_HOST=my_project_name_db`
6. Run composer install: `composer install`
7. Start docker-compose for project: `docker-compose up`
8. Go to **http://localhost:8888**. You should now see the WordPress installer.
10. Replace git origin url with new repo url: `git remote set-url origin [new-url]`
11. Push master to new origin: `git push -u origin master`

## Composer scripts
Useful scripts added to composer.json. Example of executing a composer script: `composer test-wp-standards`.
* `test-wp-standards` Runs PHP Codesniffer for checking compliance with specified coding standards.
* `fix-wp-standards` Runs PHP Code Beautifier and Fixer for fixing inconsistencies with specified coding standards.
* `fetch-db-from-prod` Fetches and imports production db into docker db. **You will need to update contents of `composer_scripts/fetch-db-from-prod.sh` for this to work!**
* `fetch-assets-from-prod` Downloads WordPress uploads from production into your local site. **You will need to update contents of `composer_scripts/fetch-assets-from-prod.sh` for this to work!**
* `add-local-user` Adds, if not already exists, a new admin/superadmin user with username `local` and password `local` in your WordPress installation. This user is added to all sites if is a multisite.
* `check-vulnerabilities` Checks installed WordPress plugins´ and WordPress Core´s versions against the [WPScan Vulnerability Database](https://wpvulndb.com/) API and prints suggested version updates if vulnerabilities are present in installed packages.

## Running wp cli
Example `docker exec {container_name} wp post list`

## Codestyle
Instructions to be added…

## CI/Deployment
Instructions to be added…

## Recommended workflow
Instructions to be added…

## Known issues
* Attempting to send mails from WordPress will fail due to WordPress using a wrapper function for php mail() and sendmail currently not being installed in web container.