<?php

declare(strict_types=1);

namespace LegacyDbz\Players\DTO;

use LegacyDbz\Core\Collection;
use LegacyDbz\Players\Repositories\InventoryRepository;
use LegacyDbz\Players\Repositories\PlayerSkillsRepository;
use LegacyDbz\Players\Traits\CharacterTrait;
use LegacyDbz\Players\Traits\PlayerSkillTrait;

final class Player
{
    use CharacterTrait, PlayerSkillTrait;

    public function __construct(
        private int $id,
        private string $nick,
        private int $level,
        private string $ip,
        private string $character,
        private Inventory $inventory,
        private Collection $activeSkills,
    ){}

    public function id(): int
    {
        return $this->id;
    }

    public function nick(): string
    {
        return $this->nick;
    }

    public function level(): int
    {
        return $this->level;
    }

    public function character(): string
    {
        return $this->character;
    }

    public function ip(): string
    {
        return $this->ip;
    }

    public function inventory(): Inventory
    {
        return $this->inventory;
    }

    public function activeSkills(): Collection
    {
        return $this->activeSkills;
    }

    public static function fromArray(array $data): self
    {
        $inventoryRepository = new InventoryRepository();
        $inventory = $inventoryRepository->findByNick($data['nick']);
        $playerSkillsRepository = new PlayerSkillsRepository();
        /** @var PlayerSkill[]|Collection $skills */
        $activeSkills = $playerSkillsRepository->getActive($data['id']);

        return new self(
            (int) $data['id'],
            $data['nick'],
            (int) $data['lygis'],
            $data['ip'],
            $data['veikejas'],
            $inventory,
            $activeSkills
        );
    }
}