<?php

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ERROR);

use LegacyDbz\Core\Db;

require_once __DIR__ . '/../vendor/autoload.php';
include_once 'config.php';

date_default_timezone_set("Europe/Vilnius");

$hostname = "mysql";
$username = "kindred";
$password = "kindred";
$database = "kindred";

Db::connect($hostname, $database, $username, $password);

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8mb4');
