<?php
namespace models;
use PDO;

/**
 * Class Database
 * @package models
 * @author Erik August Johnson <erik@erikaugust.com>
 */

class Database {

    protected $PDO;

    /**
     * Database constructor
     * @param string $database
     */
    public function __construct($database = 'default') {
        $this->PDO = self::setup($database);
        return $this;
    }

    /**
     * @name setup
     * @description Sets up a PDO connection instance for a given database (from INI)
     * @param string $connection
     * @return PDO
     * @throws \Exception
     */
    public static function setup($connection = 'default') {

        /**
         * Load from INI file:
         */
        if (!$settings = parse_ini_file(DB_SETTINGS_DIR, TRUE)) {
            throw new \Exception('Unable to open ' . DB_SETTINGS_DIR . '.');
        }


        /**
         * Create Database Instance:
         */
        $driver = $settings[$connection]['driver'];
        $host = $settings[$connection]['host'];
        $port = ((!empty($settings[$connection]['port'])) ? (';port=' . $settings[$connection]['port']) : '');
        $name = $settings[$connection]['name'];

        $dns = $driver . ':host=' . $host . $port . ';name=' . $name;

        $username = $settings[$connection]['username'];
        $password = $settings[$connection]['password'];

        $timeout = $settings[$connection]['timeout'];

        $instance = new PDO($dns, $username, $password);

        $instance->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        $instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $instance->setAttribute(PDO::ATTR_TIMEOUT, $timeout);

        return $instance;
    }
}
