<?php

namespace LegacyDbz\Players\Repositories;

use LegacyDbz\Core\Db;
use LegacyDbz\Players\DTO\Player;

class PlayersRepository
{
    /**
     * @param int|string $id
     * @return Player|null
     */
    public function findById($id)
    {
        $stmt = Db::prepare("SELECT * FROM `zaidejai` WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = Db::fetch($stmt);

        return $result ? Player::fromArray($result) : null;
    }

    /**
     * @param string $nick
     * @return Player|null
     */
    public function findByNick($nick)
    {
        $stmt = Db::prepare("SELECT * FROM `zaidejai` WHERE nick = :nick");
        $stmt->execute(['nick' => $nick]);
        $result = Db::fetch($stmt);

        return $result ? Player::fromArray($result) : null;
    }
}