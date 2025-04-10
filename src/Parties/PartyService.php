<?php

namespace LegacyDbz\Parties;

use LegacyDbz\Core\Db;
use LegacyDbz\Parties\DTO\Party;
use LegacyDbz\Parties\Repositories\PartiesRepository;
use LegacyDbz\Players\DTO\Player;

class PartyService
{
    /** @var PartiesRepository */
    private $partiesRepository;

    public function __construct(PartiesRepository $partiesRepository)
    {
        $this->partiesRepository = $partiesRepository;
    }

    public function create($name, $cadmiumAmount, Player $player)
    {
        Db::beginTransaction();

        try {
            $party = new Party(null, $player->id(), $name, null);
            $this->partiesRepository->save($party);

            $inventory = $player->inventory();
            $inventory->removeCadmiumOre($cadmiumAmount);
            $inventory->update();

            Db::commit();

            return $party;

        } catch (\Exception $e) {
            Db::rollBack();

            throw $e;
        }
    }
}