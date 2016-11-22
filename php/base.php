<?php
date_default_timezone_set('UTC');

require_once __DIR__.'/vendor/autoload.php';

// CONSTANTS

// TODO: Refactor to an array constant (PHP 7)
define('APP_SETTINGS_DIR', __DIR__.'/config/app.ini');
define('DB_SETTINGS_DIR', __DIR__.'/config/database.ini');
define('MEMCACHE_SETTINGS_DIR', __DIR__.'/config/memcache.ini');
define('REDIS_SETTINGS_DIR', __DIR__.'/config/redis.ini');