## Summary

The MoneyMedia application is built to demonstrate competency within the backend 
development ecosystem. It is written in PHP and utilizes docker.

## Installation

1. Install docker
2. docker-compose up -d

## usage

docker exec -it media-app php /app/index.php

## tests

Unit and integration tests have been written using PHPUnit. Use the following:

./vendor/phpunit/phpunit/phpunit ./tests/unit/CardTest.php --coverage-html=./tests/coverage

Coverage files present at /app/tests/coverage

## Code quality

Code quality assessment is present through sonarqube and will need to be scanned to be visible
