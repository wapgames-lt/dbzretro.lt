<?php

require_once __DIR__ . '/../vendor/autoload.php';
include_once 'config.php';

use Dotenv\Dotenv;
use LegacyDbz\Core\Db;

$dotenv = Dotenv::createUnsafeImmutable(dirname(__DIR__));
$dotenv->load();

if (filter_var(getenv('APP_DEBUG'), FILTER_VALIDATE_BOOLEAN)) {
    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ERROR);
}

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
