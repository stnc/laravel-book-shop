laravel book seller ecommerce tutorials
Vue 2.5 + Laravel 5.5 + Axios CRUD example app

Installation

Clone repo

Change to directory

laravel-crud-book seller ecommerce 

# Install dependencies

composer install

Copy .env file

cp .env.example .env

Modify DB_* value in .env with your database config.


#Migrate

php artisan migrate

php artisan migrate:refresh

#Dummy Data

php artisan db:seed


#PROBLEMS
laravel The only supported ciphers are AES-128-CBC and AES-256-CBC with the correct key lengths.

In my case, I have run these two commands and it works fine. 

1- php artisan key:generate

2- php artisan config:cache

Roadmap repositery pattern facades
