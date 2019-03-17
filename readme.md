# Figured Blog Exercise

## Setup

This project requires the following to be installed and running on your local machine: 

- MySQL server
- MongoDB server
- PHP 7.2 with MongoDB extension enabled
- Composer
- Npm package manager

To get started, run the following in the root of the project:

```
> npm install
> composer install
```

Save a copy of the .env.example file as .env and update the MySQL and MongoDB connection settings.

Create the following databases on your MySQL server:
- figured-blog
- figured-blog-test

Then run:

```
> php artisan migrate
> php artisan db:seed
> php artisan serve
```

The site should now be available at http://localhost:8000
 
## Admin

The admin section of the site can be found at http://localhost:8000/admin

Username: admin@example.com<br>
Password: password

## Testing

To run back end unit tests in Windows:

```
> "vendor/bin/phpunit"
```

To run back end unit tests in Unix:

```
> ./vendor/bin/phpunit
```

To run front end tests:

```
> npm test
```