<?php

namespace LegacyDbz\Parties\Repositories;

use LegacyDbz\Core\Collection;
use LegacyDbz\Core\Db;
use LegacyDbz\Parties\DTO\Party;

class PartiesRepository
{
    /**
     * @return Collection|Party[]
     */
    public function findAllOrderedByPlayersCount()
    {
        $stmt = Db::prepare("
            SELECT parties.*, COUNT(party_members.id) AS member_count 
            FROM parties
            LEFT JOIN party_members ON parties.id = party_members.party_id 
            GROUP BY parties.id 
            ORDER BY member_count DESC 
            LIMIT 30
        ");
        $stmt->execute();

        $collection = new Collection();
        foreach (Db::fetchAll($stmt) as $partyArray) {
            $collection->add(Party::fromArray($partyArray));
        }

        return $collection;
    }

    public function findById($id)
    {
        $stmt = Db::prepare("SELECT * FROM `parties` WHERE id = :id");
        $stmt->execute(['id' => $id]);
        $result = Db::fetch($stmt);

        return $result ? Party::fromArray($result) : null;
    }

    public function findByName($name)
    {
        $stmt = Db::prepare("SELECT * FROM `parties` WHERE name = :name");
        $stmt->execute(['name' => $name]);
        $result = Db::fetch($stmt);

        return $result ? Party::fromArray($result) : null;
    }

    public function findByLeaderId($leaderId)
    {
        $stmt = Db::prepare("SELECT * FROM `parties` WHERE leader_id = :leader_id");
        $stmt->execute(['leader_id' => $leaderId]);
        $result = Db::fetch($stmt);

        return $result ? Party::fromArray($result) : null;
    }

    public function findByPlayerId($playerId)
    {
        $stmt = Db::prepare("
            SELECT parties.* 
            FROM `parties` 
            JOIN party_members ON party_members.party_id = parties.id 
            WHERE party_members.player_id = :player_id
        ");
        $stmt->execute(['player_id' => $playerId]);
        $result = Db::fetch($stmt);

        return $result ? Party::fromArray($result) : null;
    }

    public function delete($id)
    {
        $stmt = Db::prepare("DELETE FROM parties WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }
}