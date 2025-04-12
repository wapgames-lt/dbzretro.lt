<?php

namespace LegacyDbz\Players\Services;

use LegacyDbz\Players\DTO\Player;

class CurrentPlayer
{
    private static Player $player;

    public static function set(Player $player): void
    {
        self::$player = $player;
    }

    public static function get(): Player
    {
        return self::$player;
    }
}