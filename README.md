#Technical test

## Getting Started

To launch the application, first clone the repository inside our server.

### Installing
Before starting, we will look for the .env file and modify it with our local development values, for example, modifying the connection values for the Database


Create the database "devtest" in your mariadb o mysql provider.

```
create database devtest;

```

In the terminal, inside the root folder of the project, we will execute the migrations to create the necessary tables in the database.

```
php artisan migrate
```

Finally, we will update and install all the dependencies necessary for the project with Composer.
```
composer install
```

Compile the resource files css, js ... with npm.
```
nmp run dev
```
Now it only remains to enter and check
