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
        if (!self::$logger instanceof MonologLogger) {
            self::$logger = new MonologLogger(getenv('APP_NAME'));

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

    public static function logWarning(string $message, array $context = []): void
    {
        self::getLogger()->warning($message, array_merge(self::getDefaultContext(), $context));
    }

    public static function logError(string $message, array $context = []): void
    {
        self::getLogger()->error($message, array_merge(self::getDefaultContext(), $context));
    }

    public static function logInfo(string $message, array $context = []): void
    {
        self::getLogger()->info($message, array_merge(self::getDefaultContext(), $context));
    }

    public static function logDebug(string $message, array $context = []): void
    {
        self::getLogger()->debug($message, array_merge(self::getDefaultContext(), $context));
    }

    public static function logCritical(string $message, array $context = []): void
    {
        self::getLogger()->critical($message, array_merge(self::getDefaultContext(), $context));
    }

    private static function getDefaultContext(): array
    {
        return [
            'ip' => $_SERVER['REMOTE_ADDR'] ?? 'unknown',
        ];
    }
}