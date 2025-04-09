<?php

namespace LegacyDbz\Players\Services;

use LegacyDbz\Players\DTO\Player;

class CurrentPlayer
{
    private static $player;

    public static function set($player)
    {
        self::$player = $player;
    }

    /**
     * @return Player
     */
    public static function get()
    {
        return self::$player;
    }
}