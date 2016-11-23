# Cronic

## About

Cronic is a PHP 7 framework built by Erik August Johnson (<erik@erikaugust.com>). 
It was originally assembled to help power the Cronster API.

![Cronic](https://github.com/ErikAugust/cronic/blob/master/cronic.jpg)

## Current Version 0.5

"The first draft of anything is shit." - David Heinemeier Hansson

**Warning**: This project is too early in development to use in production. 
Please use at your own risk.


## Requirements

1. Node
2. npm
3. PHP 7
4. Composer
5. Database - MySQL, Postgres, SQL Server, SQLite*
6. Memcached*
7. Redis*

## Components Used

The `cronic` command line tool is Node-based npm package. 
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


## Commands

```cronic test [name]```
Runs all PHPUnit tests; If test name is specified, runs single test

```cronic generate <type> <name>```
