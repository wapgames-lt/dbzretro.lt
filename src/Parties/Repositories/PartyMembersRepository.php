<?php

namespace LegacyDbz\Parties\Repositories;

use LegacyDbz\Core\Collection;
use LegacyDbz\Core\Db;
use LegacyDbz\Parties\DTO\PartyMember;

class PartyMembersRepository
{
    public function findByPartyId($partyId)
    {
        $stmt = Db::prepare("SELECT * FROM party_members WHERE party_id = :party_id");
        $stmt->execute(['party_id' => $partyId]);

        $collection = new Collection();
        foreach (Db::fetchAll($stmt) as $partyMember) {
            $collection->add(PartyMember::fromArray($partyMember));
        }

        return $collection;
    }

    public function findByPlayerId($playerId)
    {
        $stmt = Db::prepare("SELECT * FROM party_members WHERE player_id = :player_id");
        $stmt->execute(['player_id' => $playerId]);

        $collection = new Collection();
        foreach (Db::fetchAll($stmt) as $partyMember) {
            $collection->add(PartyMember::fromArray($partyMember));
        }

        return $collection;
    }

    public function findByPartyLeaderId($leaderId)
    {
        $stmt = Db::prepare("
            SELECT party_members.* 
            FROM party_members 
            JOIN parties ON party_members.party_id = parties.id 
            WHERE parties.leader_id = :leader_id 
              AND party_members.player_id != :leader_id
        ");
        $stmt->execute(['leader_id' => $leaderId]);

        $collection = new Collection();
        foreach (Db::fetchAll($stmt) as $partyMember) {
            $collection->add(PartyMember::fromArray($partyMember));
        }

        return $collection;
    }

    public function countByPartyId($partyId)
    {
        $stmt = Db::prepare("SELECT COUNT(*) as count FROM party_members WHERE party_id = :party_id");
        $stmt->execute(['party_id' => $partyId]);
        $result = Db::fetch($stmt);

        return $result ? (int)$result['count'] : 0;
    }

    public function isPlayerInParty($partyId, $playerId)
    {
        $stmt = Db::prepare("SELECT COUNT(*) as count FROM party_members WHERE party_id = :party_id AND player_id = :player_id");
        $stmt->execute([
            'party_id' => $partyId,
            'player_id' => $playerId,
        ]);
        $result = Db::fetch($stmt);

        return $result && $result['count'] > 0;
    }

    public function addPlayerToParty($playerId, $partyId)
    {
        $stmt = Db::prepare("INSERT INTO party_members (party_id, player_id) VALUES (:party_id, :player_id)");
        $stmt->execute([
            'party_id' => $partyId,
            'player_id' => $playerId,
        ]);
    }

    public function remove($playerId)
    {
        $stmt = Db::prepare("DELETE FROM party_members WHERE player_id = :player_id");
        $stmt->execute(['player_id' => $playerId]);
    }
}