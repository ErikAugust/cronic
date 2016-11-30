<?php
include_once(__DIR__.'/../base.php');
use models\Base;

/**
 * @name example.php
 * @description An example of the script structure
 * @usage php example.php [arguments]
 * @usage cronic run example [arguments]
 */

$database = isset($argv[1]) ? $argv[1] : 'default';
$base = new Base($database);

echo "\r\nThis is an example!!!\r\n\r\n";

