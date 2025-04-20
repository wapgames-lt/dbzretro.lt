<?php

namespace LegacyDbz\Parties;

use LegacyDbz\Core\Db;
use LegacyDbz\Parties\Models\Party;
use LegacyDbz\Parties\Models\PartyLog;
use LegacyDbz\Players\DTO\Player;

class PartyService
{
    public function create($name, $cadmiumAmount, Player $player)
    {
        Db::beginTransaction();

        try {
            $party = new Party();
            $party->leader_id = $player->id();
            $party->name = $name;
            $party->save();
            $partyId = $party->id;

            $stmt = Db::prepare("INSERT INTO party_members (party_id, player_id) VALUES (:party_id, :player_id)");
            $stmt->execute([
                'party_id' => $partyId,
                'player_id' => $party->leader_id,
            ]);

            $partyLog = new PartyLog();
            $partyLog->party_id = $partyId;
            $partyLog->description = "Žaidėjas {$player->nick()} sukūrė party.";
            $partyLog->save();

            $inventory = $player->inventory();
            $inventory->removeCadmiumOre($cadmiumAmount);
            $inventory->update();

            Db::commit();

            return $party;

        } catch (\Exception $e) {
            Db::rollBack();
            logError('Party creation error: ' . $e->getMessage());

            throw $e;
        }
    }
}