<?php

namespace models;

/**
 * Class CacheTest
 * @package models
 */

class CacheTest extends \PHPUnit_Framework_TestCase {

    /**
     * PHPUnit Tests
     *
     * Assertions: https://phpunit.de/manual/current/en/appendixes.assertions.html
     *
     * Running a single test:
     * phpunit --filter {TestMethodName}
     * OR
     * php/vendor/bin/phpunit --filter {TestMethodName}
     *
     */

    /**
     * @name testMemcacheConnection
     * @description Tests Memcache connection (Memcache, or Memcached)
     */
    public function testMemcacheConnection() {
        $this->assertObjectHasAttribute('memcache', new Cache);
    }

    /**
     * @name testRedisConnection
     * @description Tests Redis connection
     */
    public function testRedisConnection() {
        $this->assertObjectHasAttribute('redis', new Cache);
    }

}
