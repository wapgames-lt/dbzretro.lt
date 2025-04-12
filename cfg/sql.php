<?php

include_once __DIR__ . '/config.php';

use LegacyDbz\Core\Db;

date_default_timezone_set("Europe/Vilnius");

$hostname = getenv('DB_HOST');
$username = getenv('DB_USERNAME');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

Db::connect($hostname, $database, $username, $password);

$conn = mysqli_connect($hostname, $username, $password, $database);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, 'utf8mb4');
