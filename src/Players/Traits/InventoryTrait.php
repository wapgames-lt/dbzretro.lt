<?php

namespace LegacyDbz\Players\Traits;

use LegacyDbz\Core\Db;

trait InventoryTrait
{
    public function hasMoreCadmiumThan($amount)
    {
        return $this->cadmiumOre() > $amount;
    }


    public function removeTinOre($amount)
    {
        if ($this->tinOre - $amount < 0) {
            throw new \InvalidArgumentException('Not enough Tin Ore to remove.');
        }
        $this->tinOre -= $amount;
    }

    public function removeCadmiumOre($amount)
    {
        if ($this->cadmiumOre - $amount < 0) {
            throw new \InvalidArgumentException('Not enough Cadmium Ore to remove.');
        }
        $this->cadmiumOre -= $amount;
    }

    public function removeTitanOre($amount)
    {
        if ($this->titanOre - $amount < 0) {
            throw new \InvalidArgumentException('Not enough Titan Ore to remove.');
        }
        $this->titanOre -= $amount;
    }

    public function removeSayiantail($amount)
    {
        if ($this->sayiantail - $amount < 0) {
            throw new \InvalidArgumentException('Not enough Sayiantail to remove.');
        }
        $this->sayiantail -= $amount;
    }

    public function removeStone($amount)
    {
        if ($this->stone - $amount < 0) {
            throw new \InvalidArgumentException('Not enough Stone to remove.');
        }
        $this->stone -= $amount;
    }

    public function addTinOre($amount)
    {
        $this->tinOre += $amount;
    }

    public function addCadmiumOre($amount)
    {
        $this->cadmiumOre += $amount;
    }

    public function addTitanOre($amount)
    {
        $this->titanOre += $amount;
    }

    public function addSayiantail($amount)
    {
        $this->sayiantail += $amount;
    }

    public function addStone($amount)
    {
        $this->stone += $amount;
    }

    /**
     * @return bool
     */
    public function update()
    {
        $changes = $this->getChanges();

        if (empty($changes)) {
            return false;
        }

        $setParts = [];
        $params = ['id' => $this->id()];

        foreach ($changes as $column => $value) {
            $setParts[] = "$column = :$column";
            $params[$column] = $value;
        }

        $sql = "UPDATE inv SET " . implode(', ', $setParts) . " WHERE id = :id";

        $stmt = Db::prepare($sql);
        $result = $stmt->execute($params);

        if ($result) {
            $this->syncOriginal();
        }

        return $result;
    }
}