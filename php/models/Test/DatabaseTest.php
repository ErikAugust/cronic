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
     * @name testCapsuleConnection
     * @description Tests Capsule connection
     */
    public function testCapsuleConnection() {
        $settings = parse_ini_file(APP_SETTINGS_DIR, TRUE);

        if ($settings['capsule']) {
            $this->assertObjectHasAttribute('capsule', new Database);
        }
    }

    /**
     * @name testPDOConnection
     * @description Tests PDO connection
     */
    public function testPDOConnection() {
        $settings = parse_ini_file(APP_SETTINGS_DIR, TRUE);

        if ($settings['pdo']) {
            $this->assertObjectHasAttribute('pdo', new Database);
        }
    }


}
