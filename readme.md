# ViPost

Install the app

    composer install


Create APP_KEY

	php artisan key:generate


Create the database for the app

    create database vipost;


Create posts table, this command line creates a php script file for creating a basic mysql table
	
	php artisan make:migration create_posts_table --create=posts


Run the php migration scripts in database/migrations/*.php

php artisan migrate


Create Task Model

    php artisan make:model Task


Create login and register service

	php artisan make:auth


Start server

	php artisan serve --port=8001



npm install --global gulp
npm install



favicon.ico
http://www.flaticon.com/free-icon/conversation-bubble_15525

