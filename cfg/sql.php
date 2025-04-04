<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ERROR);

require_once __DIR__ . '/../vendor/autoload.php';

use LegacyDbz\Core\Db;

date_default_timezone_set("Europe/Vilnius");

$hostname = "mysql";
$username = "kindred";
$password = "kindred";
$database = "kindred";

Db::connect($hostname, $database, $username, $password);


$conn = mysql_connect($hostname, $username, $password);

if (!$conn) {
    die("Connection failed: " . mysql_error());
}

$db_selected = mysql_select_db($database, $conn);

if (!$db_selected) {
    die("Cannot use $database: " . mysql_error());
}

mysql_query("SET NAMES utf8");
include_once 'config.php';

mysql_set_charset('utf8mb4');
