<?php
namespace models;

/**
 * Class Cache
 * @package models
 * @author Erik August Johnson <erik@erikaugust.com>
 */

class Cache {

    public function __construct($redis = 'default', $memcache = 'default') {
        //$this->redis = self::redisSetup($redis);
        $this->memcache = self::memcacheSetup($memcache);

        return $this;
    }

    /**
     * @name redisSetup
     * @return \Redis
     */
    public static function redisSetup() {
        $redis = new \Redis() or die("Cannot load redis module.");
        $redis->connect('127.0.0.1');
        return $redis;
    }

    /**
     * @name memcacheSetup
     * @description Load server data from INI, and connect using either memcache, or memcached
     * @param string $connection
     * @return \Memcache|\Memcached
     * @throws \Exception
     */
    public static function memcacheSetup($connection = 'default') {
        /**
         * Load from INI file:
         */
        if (!$settings = parse_ini_file(MEMCACHE_SETTINGS_DIR, TRUE)) {
            throw new \Exception('Unable to open ' . MEMCACHE_SETTINGS_DIR . '.');
        }

        /**
         * Connect to memcache, or memcached:
         */
        if ($settings[$connection]['library'] == 'memcache') {
            $memcache = new \Memcache;
            if (!$memcache->connect($settings[$connection]['host'], $settings[$connection]['port'])) {
                throw new \Exception('Unable to connect to Memcache');
            }
        } else {
            $memcache = new \Memcached();
            $memcache->addServer($settings[$connection]['host'], $settings[$connection]['port']);
        }

        return $memcache;
    }
}
