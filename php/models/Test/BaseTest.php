<?php

namespace models;

/**
 * Class BaseTest
 * @package models
 */

class BaseTest extends \PHPUnit_Framework_TestCase {

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
     * @name testDatabaseConnection
     * @description Tests database connection
     */
	public function testDatabaseConnection() {
        $this->assertObjectHasAttribute('database', new Base);
    }

    /**
     * @name testCacheConnection
     * @description Tests cache connections (Memcache, Redis)
     */
    public function testCacheConnection() {
        $this->assertObjectHasAttribute('cache', new Base);
    }

}
