<?php

declare(strict_types=1);

namespace LegacyDbz\Players\Traits;

use LegacyDbz\Core\Collection;
use LegacyDbz\Players\DTO\PlayerSkill;
use LegacyDbz\Skills\DTO\Skill;

trait PlayerSkillTrait
{
    public function getFirstActiveFightZoneBuff(string $name): ?PlayerSkill
    {
        return $this->getFirstActiveBuffByNameAndList($name, Skill::FIGHT_ZONE_BUFFS);
    }

    public function getActiveFightZoneBuffs(): Collection
    {
        return $this->getActiveBuffsByList(Skill::FIGHT_ZONE_BUFFS);
    }

    public function getFirstActiveJungleKingBosBuff(string $name): ?PlayerSkill
    {
        return $this->getFirstActiveBuffByNameAndList($name, Skill::JUNGLE_KING_BOSSES_BUFFS);
    }

    public function getActiveJungleKingBosBuffs(): Collection
    {
        return $this->getActiveBuffsByList(Skill::JUNGLE_KING_BOSSES_BUFFS);
    }

    public function getFirstActiveBuffByNameAndList(string $name, array $allowedBuffs): ?PlayerSkill
    {
        return $this->getActiveBuffsByList($allowedBuffs)->first(fn (PlayerSkill $playerSkill) => $playerSkill->skill()->name() === $name);
    }

    public function getActiveBuffsByList(array $allowedBuffs): Collection
    {
        return $this->activeSkills()->filter(function (PlayerSkill $playerSkill) use ($allowedBuffs) {
            $skill = $playerSkill->skill();
            return $skill->category() === Skill::CATEGORY_BUFF
                && in_array($skill->name(), $allowedBuffs, true);
        });
    }
}