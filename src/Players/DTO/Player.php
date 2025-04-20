<?php

declare(strict_types=1);

namespace LegacyDbz\Players\DTO;

use LegacyDbz\Core\Collection;
use LegacyDbz\Players\Repositories\InventoryRepository;
use LegacyDbz\Players\Repositories\PlayerSkillsRepository;
use LegacyDbz\Players\Traits\CharacterTrait;
use LegacyDbz\Players\Traits\PlayerSkillTrait;

final readonly class Player
{
    use CharacterTrait, PlayerSkillTrait;

    public function __construct(
        private int $id,
        private string $nick,
        private int $level,
        private string $ip,
        private string $character,
        private float $euro,
        private float $vegitaCash,
        private int $vipTickets,
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

    public function euro(): float
    {
        return $this->euro;
    }

    public function vegitaCash(): float
    {
        return $this->vegitaCash;
    }

    public function vipTickets(): int
    {
        return $this->vipTickets;
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
        $activeSkills = $playerSkillsRepository->getActive($data['id']);

        return new self(
            (int) $data['id'],
            $data['nick'],
            (int) $data['lygis'],
            $data['ip'],
            $data['veikejas'],
            (float) $data['sms_litai'],
            (float) $data['botas'],
            (int) $data['vipticket'],
            $inventory,
            $activeSkills
        );
    }
}