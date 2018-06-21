# TestPortal
go to the directory you would like to place your project.
 
open git bash in that directory 

run this comand 
git clone git clone https://github.com/muhammadali2012/Tes

cd into your project

git checkout master

Install Composer Dependencies using this command 
composer install

 Install NPM Dependencies
 npm install

Create a copy of your .env file
cp .env.example .env

Generate an app encryption key
php artisan key:generate

Create an empty database for our application
In the .env file, add database information to allow Laravel to connect to the database

php artisan migrate

Seed the database(optional)

Enjoy.






