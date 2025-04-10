<?php

declare(strict_types=1);

namespace LegacyDbz\Core;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\RotatingFileHandler;
use Monolog\Level;
use Monolog\Logger as MonologLogger;

class Logger
{
    private static ?MonologLogger $logger = null;

    public static function getLogger(): MonologLogger
    {
        if (self::$logger === null) {
            self::$logger = new MonologLogger('app_logger');

            $dateFormat = 'Y-m-d H:i:s.v';
            $output = "[%datetime%] %channel%.%level_name%: %message% %context% %extra%\n";
            $formatter = new LineFormatter($output, $dateFormat);
            $logFile = dirname(__DIR__, 2) . '/storage/logs/app.log';
            $rotatingHandler = new RotatingFileHandler($logFile, 0, Level::Debug);
            $rotatingHandler->setFormatter($formatter);
            self::$logger->pushHandler($rotatingHandler);
        }

        return self::$logger;
    }

    public static function logWarning(string $message): void
    {
        self::getLogger()->warning($message);
    }

    public static function logError(string $message): void
    {
        self::getLogger()->error($message);
    }

    public static function logInfo(string $message): void
    {
        self::getLogger()->info($message);
    }

    public static function logDebug(string $message): void
    {
        self::getLogger()->debug($message);
    }

    public static function logCritical(string $message): void
    {
        self::getLogger()->critical($message);
    }
}