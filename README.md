# Configure your database
Start mariadb 

`docker run --name mariadbtest -e MYSQL_ROOT_PASSWORD=mypass -p 3306:3306 -d docker.io/library/mariadb:10.3`

# Install dependencies throw composer
- run `composer install`

# Create Your database
- `./bin/console   doctrine:database:create`
- `./bin/console   doctrine:database:migrate`

# Start webserver
- Download symfony cli (https://symfony.com/download)
-  run `symfony serve`
