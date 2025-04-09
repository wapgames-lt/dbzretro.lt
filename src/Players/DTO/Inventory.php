<?php

namespace LegacyDbz\Players\DTO;


class Inventory
{
    private $id;

    private $tinOre;

    private $cadmiumOre;

    private $titanOre;

    private $sayiantail;

    private $stone;

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
        return new self(
            $data['id'],
            $data['alavas'],
            $data['kadmis'],
            $data['titanas'],
            $data['Sayiantail'],
            $data['Stone']
        );
    }
}