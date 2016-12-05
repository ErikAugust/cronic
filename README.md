# Cronic

## About

Cronic is a PHP 7 framework built by Erik August Johnson (<erik@erikaugust.com>). 
It was originally assembled to help power the Cronster API.

Cronic is a PHP framework to rule them all. Or, in other words, it's yet another PHP framework ;).

But really, the aim here is combine the best components across the ecosystem and combine them with a flexible and customizable CLI tool. 

![Cronic](https://raw.githubusercontent.com/ErikAugust/cronic/master/cronic.jpg)

## Latest Version 0.1.1

"The first draft of anything is shit." - David Heinemeier Hansson

**Warning**: This project is too early in development to use in production. 
Please use at your own risk.


## Requirements

1. Node
2. npm
3. Yeoman
4. PHP 7
5. Composer
6. Database - MySQL, Postgres, SQL Server, SQLite*
7. Memcached* - optional
8. Redis* - optional

## Components Used

The `cronic` command line tool is a Node-based npm package. 
The source file is also included in every project for customization.

Cronic picks and chooses from across the PHP ecosystem, including:

- Front Controller: Silex
- Miscellaneous Components: Symfony2
- Database: Capsule (Laravel)
- ORM: Eloquent (Laravel)
- Database Migrations: Phinx
- Email: Swiftmailer
- Unit Testing: PHPUnit
- Documentation: PHPDoc

## Installation - Simple Six Steps

1. ```npm install -g yo generator-cronic``` to install Yeoman (if necessary), and the Cronic file generator.

2. ```npm install -g cronic``` in a sub-root directory. This will create the 'cronic' command line tool.
 
3. ```cronic start <name>``` to start a new project with a specified name.

4. ```cd <name> && cronic setup``` in your newly created project directory.

5. ```cd php && composer install``` to install vendor PHP packages.

6. ```mkdir session``` to create a 'session' folder for PHP sessions.


## Commands

```cronic about```
About the Cronic Framework

```cronic migrate```
Runs Phinx database migration command

```cronic run <name> [arguments...]```
Runs any script located in the ```php/scripts``` directory

```cronic setup```
Quickstart Setup - sets app config and default database connection

```cronic start <name>```
Starts a new project with specified name - name used as directory name

```cronic test [name]```
Runs all PHPUnit tests; if test name is specified, runs single test

### Generator - Commands

```cronic generate controller```
Generates controller in ```php/controllers```

```cronic generate script```
Generates script in ```php/scripts```

## Coming Soon

- Generator Commands w/ Yeoman - classes, controllers [x], tests, scripts [x], routes, migrations, and more
- COMPLETED: Quickstart Wizard - the command-line will take care of everything
- Bootstrap Template Collection - Create slick responsive web applications in no time
- More In-Depth Documentation and Examples
