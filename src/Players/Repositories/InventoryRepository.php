<?php

namespace LegacyDbz\Players\Repositories;

use LegacyDbz\Core\Db;
use LegacyDbz\Players\DTO\Inventory;

class InventoryRepository
{
    /**
     * @param string $nick
     * @return Inventory|null
     */
    public function findByNick($nick)
    {
        $stmt = Db::prepare("SELECT * FROM `inv` WHERE nick = :nick");
        $stmt->execute(['nick' => $nick]);
        $result = Db::fetch($stmt);

        return $result ? Inventory::fromArray($result) : null;
    }

    /**
     * @param string $nick
     * @param int $amount
     * @return bool
     */
    public function subtractCadmium($nick, $amount)
    {
        $stmt = Db::prepare("UPDATE inv SET kadmis = kadmis - :amount WHERE nick = :nick")
        ;
        return $stmt->execute([
            'amount' => $amount,
            'nick'   => $nick,
        ]);
    }
}