<?php
namespace models;

// PDO:
use PDO;

// Capsule:
use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Class Database
 * @package models
 * @author Erik August Johnson <erik@erikaugust.com>
 */

class Database {

    protected $pdo;
    protected $capsule;

    /**
     * Database constructor
     * @param string $database
     */
    public function __construct(string $database = 'default') {

        $this->capsule = self::capsuleSetup($database);
        return $this;
    }

    public static function capsuleSetup(string $connection = 'default'): Capsule {
        $capsule = new Capsule();

        /**
         * Load database settings from INI file:
         */
        if (!$settings = parse_ini_file(DB_SETTINGS_DIR, TRUE)) {
            throw new \Exception('Unable to open ' . DB_SETTINGS_DIR . '.');
        }

        /**
         * Load app settings from INI file:
         */

        if (!$app_settings = parse_ini_file(APP_SETTINGS_DIR, TRUE)) {
            throw new \Exception('Unable to open ' . APP_SETTINGS_DIR . '.');
        }

        /**
         * Add connection:
         */
        $capsule->addConnection([
            'driver'    => $settings[$connection]['driver'],
            'host'      => $settings[$connection]['host'],
            'database'  => $settings[$connection]['name'],
            'username'  => $settings[$connection]['username'],
            'password'  => $settings[$connection]['password'],
            'charset'   => $settings[$connection]['charset'],
            'collation' => $settings[$connection]['collation'],
            'prefix'    => $settings[$connection]['prefix'],
        ]);

        if ($app_settings['eloquent']) {
            $capsule->bootEloquent();
        }

        return $capsule;
    }

    /**
     * @name pdoSetup
     * @description Sets up a PDO connection instance for a given database (from INI)
     * @param string $connection
     * @return PDO
     * @throws \Exception
     */
    public static function pdoSetup(string $connection = 'default'): PDO {

        /**
         * Load settings from INI file:
         */
        if (!$settings = parse_ini_file(DB_SETTINGS_DIR, TRUE)) {
            throw new \Exception('Unable to open ' . DB_SETTINGS_DIR . '.');
        }


        /**
         * Create Database Instance:
         */

        $driver = $settings[$connection]['driver'];
        $host = $settings[$connection]['host'];
        $port = !empty($settings[$connection]['port']) ? ';port=' . $settings[$connection]['port'] : '';
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
