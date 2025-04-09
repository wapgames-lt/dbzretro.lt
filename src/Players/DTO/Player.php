<?php

namespace LegacyDbz\Players\DTO;

use LegacyDbz\Players\Repositories\InventoryRepository;
use LegacyDbz\Players\Traits\CharacterTrait;
use LegacyDbz\Players\Traits\InventoryTrait;

class Player
{
    use CharacterTrait;
    use InventoryTrait;

    private $id;

    private $nick;

    private $ip;

    private $character;

    /**
     * @var Inventory
     */
    private $inventory;

    /**
     * @param $id
     * @param $username
     * @param $ip
     * @param $character
     * @param Inventory $inventory
     */
    public function __construct($id, $username, $ip, $character, $inventory)
    {
        $this->id = $id;
        $this->nick = $username;
        $this->ip = $ip;
        $this->character = $character;
        $this->inventory = $inventory;
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

    public static function fromArray(array $data)
    {
        $inventoryRepository = new InventoryRepository();
        $inventory = $inventoryRepository->findByNick($data['nick']);

        return new self(
            $data['id'],
            $data['nick'],
            $data['ip'],
            $data['veikejas'],
            $inventory
        );
    }
}