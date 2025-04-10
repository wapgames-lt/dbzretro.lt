<?php

namespace LegacyDbz\Players\DTO;

use LegacyDbz\Players\Traits\InventoryTrait;

class Inventory
{
    use InventoryTrait;

    private $id;

    private $tinOre;

    private $cadmiumOre;

    private $titanOre;

    private $sayiantail;

    private $stone;

    /**
     * @var array Stores original values for dirty checking
     */
    private $original = [];

    /**
     * @param $id
     * @param $tinOre
     * @param $cadmiumOre
     * @param $titanOre
     * @param $sayiantail
     * @param $stone
     */
    public function __construct($id, $tinOre, $cadmiumOre, $titanOre, $sayiantail, $stone)
    {
        $this->id = $id;
        $this->tinOre = $tinOre;
        $this->cadmiumOre = $cadmiumOre;
        $this->titanOre = $titanOre;
        $this->sayiantail = $sayiantail;
        $this->stone = $stone;
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
    public function tinOre()
    {
        return $this->tinOre;
    }

    /**
     * @return mixed
     */
    public function cadmiumOre()
    {
        return $this->cadmiumOre;
    }

    /**
     * @return mixed
     */
    public function titanOre()
    {
        return $this->titanOre;
    }

    /**
     * @return mixed
     */
    public function sayiantail()
    {
        return $this->sayiantail;
    }

    /**
     * @return mixed
     */
    public function stone()
    {
        return $this->stone;
    }

    public static function fromArray(array $data)
    {
        $instance = new self(
            $data['id'],
            $data['alavas'],
            $data['kadmis'],
            $data['titanas'],
            $data['Sayiantail'],
            $data['Stone']
        );

        $instance->original = $instance->toArray();

        return $instance;
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'alavas' => $this->tinOre,
            'kadmis' => $this->cadmiumOre,
            'titanas' => $this->titanOre,
            'Sayiantail' => $this->sayiantail,
            'Stone' => $this->stone,
        ];
    }

    public function syncOriginal()
    {
        $this->original = $this->toArray();
    }

    public function getChanges()
    {
        $current = $this->toArray();
        $changes = [];

        foreach ($current as $key => $value) {
            if (!array_key_exists($key, $this->original)) {
                continue;
            }

            if ($value !== $this->original[$key]) {
                $changes[$key] = $value;
            }
        }

        return $changes;
    }
}