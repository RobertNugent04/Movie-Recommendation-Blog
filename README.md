## Laravel 8 Complete Movie Review and Recommendation System

This repository is for a movie review and recommendation system built with Laravel 8. This application allows users to review movies they've watched, rate them, and view recommendations based on the ratings of other users. The application fetches movie data from The Movie Database API.

![Screenshot 2023-05-14 153630](https://github.com/RobertNugent04/ServerSideCA3/assets/114187312/a5a96efb-a367-4280-97d9-e21db7da8a49)

## Authors
•	Patrick Orjieh <br>
•	Robert Nugent <br>

## Requirements
•	PHP 7.3 or higher <br>
•	Node 12.13.0 or higher <br>
•	Composer <br>
•	MySql <br>

## Usage <br>
Setting up your development environment on your local machine: <br>
```
git clone https://github.com/RobertNugent04/ServerSideCA3.git
cd ServerSideCA3
cp .env.example .env
composer install
php artisan key:generate
php artisan cache:clear && php artisan config:clear
php artisan serve
```
![Screenshot 2023-05-14 153656](https://github.com/RobertNugent04/ServerSideCA3/assets/114187312/fc6520cc-fc06-4ef8-bd0c-7078ae56f25f)

## Before starting <br>
Create a database <br>
```
mysql
create database laravelblog;
exit;
```

Setup your database credentials in the .env file <br>
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravelblog
DB_USERNAME={USERNAME}
DB_PASSWORD={PASSWORD}
```

Migrate the tables
```
php artisan migrate
```

## Contributing
Contributions are welcome! Feel free to report bugs, suggest features, or even contribute to the code. To contribute, you can create a pull request, and we will review your changes before merging them into the project.

![Screenshot 2023-05-14 153753](https://github.com/RobertNugent04/ServerSideCA3/assets/114187312/aa8d06e4-875c-417d-a97c-82bb116825b4)

## Acknowledgment
We would like to thank The Movie Database API for providing us with the movie data used in this application.
