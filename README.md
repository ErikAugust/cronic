# Cronic

## About

Cronic is a PHP 7 framework built by Erik August Johnson (<erik@erikaugust.com>). 
It was originally assembled to help power the Cronster API.

Cronic is a PHP framework to rule them all. Or, in other words, it's yet another PHP framework ;).

But really, the aim here is combine the best components across the ecosystem and combine them with a flexible and customizable CLI tool. 

![Cronic](https://github.com/ErikAugust/cronic/blob/master/cronic.jpg)

## Current Version 0.0.5

"The first draft of anything is shit." - David Heinemeier Hansson

**Warning**: This project is too early in development to use in production. 
Please use at your own risk.


## Requirements

1. Node
2. npm
3. PHP 7
4. Composer
5. Database - MySQL, Postgres, SQL Server, SQLite*
6. Memcached* - optional
7. Redis* - optional

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

## Installation

1. ```npm install -g cronic``` in a sub-root directory. This will create the "cronic" command line tool.
 
2. ```cronic start <name>``` to start a new project with a specified name.

3. ```cp help/app_example.ini php/config/app.ini``` to add your application configuration

4. ```cp help/database_example.ini php/config/database.ini``` to add your database configuration

5. ```cp help/redis_example.ini php/config/redis.ini``` to add Redis config, if using*

6. ```cp help/memcache_example.ini php/config/memcache.ini``` to add Memcache config, if using*

7. ```cd php && composer install``` to install vendor packages


## Commands

```cronic start [name]```
Starts a new project with specified name - name used as directory name

```cronic test [name]```
Runs all PHPUnit tests; if test name is specified, runs single test

```cronic migrate```
Runs Phinx database migration command

```cronic about```
About the Cronic Framework

# Coming Soon

- Generator Commands w/ Yeoman - classes, controllers, tests, routes, migrations, and more
- Quickstart Wizard - the command-line will take care of everything
- Bootstrap Template Collection - Create slick responsive web applications in no time
- More In-Depth Documentation and Examples
