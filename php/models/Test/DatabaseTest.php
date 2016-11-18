<?php

namespace models;

/**
 * Class DatabaseTest
 * @package models
 */

class DatabaseTest extends \PHPUnit_Framework_TestCase {

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
     * @name testPDOConnection
     * @description Tests Memcache connection (Memcache, or Memcached)
     */
    public function testPDOConnection() {
        $this->assertObjectHasAttribute('PDO', new Database);
    }

}
