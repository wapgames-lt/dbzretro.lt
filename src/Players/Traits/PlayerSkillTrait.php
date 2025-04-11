<?php

declare(strict_types=1);

namespace LegacyDbz\Players\Traits;

use LegacyDbz\Core\Collection;
use LegacyDbz\Players\DTO\PlayerSkill;
use LegacyDbz\Skills\DTO\Skill;

trait PlayerSkillTrait
{
    /**
     * @param string $name
     *
     * @return PlayerSkill|null
     */
    public function getFirstActiveFightZoneBuff($name)
    {
        return $this->getFirstActiveBuffByNameAndList($name, Skill::FIGHT_ZONE_BUFFS);
    }

    /**
     * @return Collection
     */
    public function getActiveFightZoneBuffs()
    {
        return $this->getActiveBuffsByList(Skill::FIGHT_ZONE_BUFFS);
    }

    /**
     * @param string $name
     *
     * @return PlayerSkill|null
     */
    public function getFirstActiveJungleKingBosBuff($name)
    {
        return $this->getFirstActiveBuffByNameAndList($name, Skill::JUNGLE_KING_BOSSES_BUFFS);
    }

    /**
     * @return Collection
     */
    public function getActiveJungleKingBosBuffs()
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