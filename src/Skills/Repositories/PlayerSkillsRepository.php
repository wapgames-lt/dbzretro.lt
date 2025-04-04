<?php

namespace LegacyDbz\Skills\Repositories;

use LegacyDbz\Core\Collection;
use LegacyDbz\Skills\DTO\PlayerSkill;

class PlayerSkillsRepository
{
    public function getActiveBuffs($playerId, $skillNames)
    {
        $skillNamesString = implode("','", array_map('mysql_real_escape_string', $skillNames));
        $playerBuffsQuery = mysql_query("SELECT skill_id, player_id, icon, name, description, category, power, ends_at, cooldown FROM player_skills JOIN skills ON player_skills.skill_id = skills.id WHERE player_id = '$playerId'
                                                        AND ends_at > NOW() AND skills.category = 'buff'
                                                        AND skills.name IN ('$skillNamesString')
                                                        ORDER BY ends_at");
        $buffsArray = [];
        while ($playerBuff = mysql_fetch_assoc($playerBuffsQuery)) {
            $playerSkill = PlayerSkill::fromArray($playerBuff);
            $buffsArray[] = $playerSkill;
        }

        return new Collection($buffsArray);
    }
}