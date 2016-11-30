<?php
include_once(__DIR__.'/../../base.php');
use models\Database;

/**
 * Script - show_tables.php
 * @name show_tables
 * @description Shows tables for a selected database
 * @usage php show_tables [database_name]
 */

$name = isset($argv[1]) ? $argv[1] : 'default';

$database = new Database($name);
$query = "SHOW TABLES";
$capsule = $database->capsule;

$results = $capsule::select($query);

echo "Database " . $name . " has " . count($results) . " tables:\r\n\r\n";

foreach ($results as $result) {
    foreach($result as $key => $value) {
        echo $value . "\r\n";
    }
}