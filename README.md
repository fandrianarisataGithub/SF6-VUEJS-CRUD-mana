### requirement : 

OS : Ubuntu 23.04

    PHP 8.1.12-1ubuntu4.3
    Composer version 2.6.5
    mysql  Ver 14.14

    node version 19.7.0
    npm version 9.5.0
    yarn version 1.22.21

### Installation

composer install

yarn 

### Config .env

Copy .env-copy's content to your .env file

php bin/console doctrine:database:create # To create the mysql ddb

### Launch server

yarn watch / yarn dev

php -S localhost:8000 -t public






