# Cronic

## About

Cronic is a PHP7 framework built by Erik August Johnson (<erik@erikaugust.com>). 
It was originally assembled to help power the Cronster API (https://www.cronster.com).

![Cronic](https://github.com/ErikAugust/cronic/blob/master/cronic.jpg)


## Requirements

1. Node
2. npm
3. PHP 7
4. Composer
5. MySQL
6. Memcached*
7. Redis*

## Installation

1. ```npm install -g cronic``` in a sub-root directory. This will create the "cronic" command line tool.
 
2. ```cronic start <name>``` to start a new project with a specified name.

### Web Server Setup

#### NGINX

#### Apache


## Commands

```cronic test [name]```
Runs all PHPUnit tests; If test name is specified, runs single test

```cronic generate <type> <name>```
