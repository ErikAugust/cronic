<?php
namespace models;

/**
 * Class Cache
 * @package models
 * @author Erik August Johnson <erik@erikaugust.com>
 */

class Cache {

    /**
     * Cache constructor.
     * @param string $redis
     * @param string $memcache
     * @throws \Exception
     */
    public function __construct(string $redis = 'default', string $memcache = 'default') {

        /**
         * Load app settings from INI file:
         */
        if (!$this->settings = parse_ini_file(APP_SETTINGS_DIR, TRUE)) {
            throw new \Exception('Unable to open ' . APP_SETTINGS_DIR . '.');
        }

        if ($this->settings['redis']) {
            $this->redis = self::redisSetup($redis);
        }

        if ($this->settings['memcache']) {
            $this->memcache = self::memcacheSetup($memcache);
        }

        return $this;
    }

    /**
     * @name redisSetup
     * @return \Redis
     * @throws \Exception
     */
    public static function redisSetup(string $connection = 'default'): \Redis {
        /**
         * Load from INI file:
         */
        if (!$settings = parse_ini_file(REDIS_SETTINGS_DIR, TRUE)) {
            throw new \Exception('Unable to open ' . REDIS_SETTINGS_DIR . '.');
        }

        $redis = new \Redis;
        $redis->connect($settings[$connection]['host']);
        return $redis;

    }

    /**
     * @name memcacheSetup
     * @description Load server data from INI, and connect using either memcache, or memcached
     * @param string $connection
     * @return \Memcache|\Memcached
     * @throws \Exception
     */
    public static function memcacheSetup(string $connection = 'default') {
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
            if (!$memcache->addServer($settings[$connection]['host'], $settings[$connection]['port'])) {
                throw new \Exception('Unable to connect to Memcache');
            }
        }

        return $memcache;
    }
}
