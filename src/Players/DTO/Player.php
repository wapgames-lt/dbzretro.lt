<?php

namespace LegacyDbz\Players\DTO;

use LegacyDbz\Core\Collection;
use LegacyDbz\Players\Repositories\InventoryRepository;
use LegacyDbz\Players\Repositories\PlayerSkillsRepository;
use LegacyDbz\Players\Traits\CharacterTrait;
use LegacyDbz\Players\Traits\InventoryTrait;
use LegacyDbz\Players\Traits\PlayerSkillTrait;

class Player
{
    use CharacterTrait, PlayerSkillTrait;

    /**
     * @param $id
     * @param $nick
     * @param $ip
     * @param $character
     * @param Inventory $inventory
     * @param Collection|PlayerSkill[] $activeSkills
     */
    public function __construct(private $id, private $nick, private $ip, private $character, private Inventory $inventory, private $activeSkills)
    {
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function nick()
    {
        return $this->nick;
    }

    public function character()
    {
        return $this->character;
    }

    /**
     * @return mixed
     */
    public function ip()
    {
        return $this->ip;
    }

    /**
     * @return Inventory
     */
    public function inventory()
    {
        return $this->inventory;
    }

    /**
     * @return Collection|PlayerSkill[]
     */
    public function activeSkills()
    {
        return $this->activeSkills;
    }

    public static function fromArray(array $data)
    {
        $inventoryRepository = new InventoryRepository();
        $inventory = $inventoryRepository->findByNick($data['nick']);
        $playerSkillsRepository = new PlayerSkillsRepository();
        /** @var PlayerSkill[]|Collection $skills */
        $activeSkills = $playerSkillsRepository->getActive($data['id']);

        return new self(
            $data['id'],
            $data['nick'],
            $data['ip'],
            $data['veikejas'],
            $inventory,
            $activeSkills
        );
    }
}