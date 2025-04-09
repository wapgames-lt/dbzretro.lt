<?php

namespace LegacyDbz\Characters\Traits;

use LegacyDbz\Characters\Constants\CharacterName;

trait CharacterTrait
{
    public function isVadose()
    {
        return $this->character === CharacterName::VADOSE;
    }

    public function isCus()
    {
        return $this->character === CharacterName::CUS;
    }

    public function isKefla()
    {
        return $this->character === CharacterName::KEFLA;
    }

    public function isGohanasUltraInstinct()
    {
        return $this->character === CharacterName::GOHANAS_ULTRA_INSTINCT;
    }

    public function isGokasMasteredUltraInstinct()
    {
        return $this->character === CharacterName::GOKAS_MASTERED_ULTRA_INSTICT;
    }

    public function isGokasKaioken20x()
    {
        return $this->character === CharacterName::GOKAS_SSJGB_KAIOKEN_20_X;
    }
}