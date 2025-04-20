<?php

use Carbon\Carbon;
use Carbon\CarbonImmutable;
use Carbon\CarbonInterface;
use LegacyDbz\Players\DTO\Player;
use LegacyDbz\Players\Services\CurrentPlayer;

include_once __DIR__ . '/sql.php';

function sendDiscordMessage(string $message): void
{
    new \LegacyDbz\Core\Http\DiscordHttpClient()->sendMessage($message);
}

if (!function_exists('now')) {
    function now(): CarbonImmutable
    {
        return CarbonImmutable::now();
    }
}

function currentPlayer(): Player
{
    return CurrentPlayer::get();
}

function getPlayerByNick(string $nick): Player
{
    $playerRepository = new \LegacyDbz\Players\Repositories\PlayersRepository();
    $player = $playerRepository->findByNick($nick);
    if (!$player) {
        throw new \RuntimeException("Player not found by nick {$nick}");
    }

    return $player;
}

function logError(string $message, array $context = []): void
{
    \LegacyDbz\Core\Logger::logError($message, $context);
}

function logInfo(string $message, array $context = []): void
{
    \LegacyDbz\Core\Logger::logInfo($message, $context);
}

function logWarning(string $message, array $context = []): void
{
    \LegacyDbz\Core\Logger::logWarning($message, $context);
}

function setCurrentPlayer(string $nick): void
{
    CurrentPlayer::set(getPlayerByNick($nick));
}

function createFromTimestamp(string $timestamp): CarbonInterface
{
    return Carbon::createFromTimestamp($timestamp);
}