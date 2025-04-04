<?php

namespace LegacyDbz\Core;

use PDO;

class Db
{
    public static $pdo;

    public static function connect($host, $db, $user, $pass)
    {
        self::$pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
        self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public static function query($sql)
    {
        return self::$pdo->query($sql);
    }

    public static function fetch($stmt)
    {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function prepare($sql) {
        return self::$pdo->prepare($sql);
    }

    public static function fetchAll($stmt) {
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function lastInsertId() {
        return self::$pdo->lastInsertId();
    }

    public static function beginTransaction() {
        return self::$pdo->beginTransaction();
    }

    public static function commit() {
        return self::$pdo->commit();
    }

    public static function rollBack() {
        return self::$pdo->rollBack();
    }

    public static function close() {
        self::$pdo = null;
    }
}
