
This laravel project assumes composer, node and npm installed

To assure that external libraries (jquery, bootstrap) are installed use command

npm install
composer update
composer install


To create a database with the necessary tables, use

php artisan migrate

To undo migration

php artisan migrate:rollback

To seed tables jaarbasis and data in the database use 

php artisan db:seed AgoSeeder

To run app

php artisan serve

