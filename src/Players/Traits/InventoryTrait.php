<?php

namespace LegacyDbz\Players\Traits;

trait InventoryTrait
{
    public function hasMoreCadmiumThan($amount)
    {
        return $this->inventory->cadmiumOre() > $amount;
    }
}