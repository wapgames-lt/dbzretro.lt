<?php

namespace LegacyDbz\Players\Repositories;

use LegacyDbz\Core\Collection;
use LegacyDbz\Core\Db;
use LegacyDbz\Players\DTO\PlayerSkill;
use PDO;

class PlayerSkillsRepository
{
    public function getActive($playerId)
    {
        $query = "SELECT skill_id, player_id, icon, name, description, category, power, ends_at, cooldown 
              FROM player_skills 
              JOIN skills ON player_skills.skill_id = skills.id 
              WHERE player_id = :playerId AND ends_at > NOW()
              ORDER BY ends_at";

        $stmt = Db::prepare($query);
        $stmt->bindParam(':playerId', $playerId, PDO::PARAM_INT);
        $stmt->execute();

        $skills = [];
        while ($skill = Db::fetch($stmt)) {
            $playerSkill = PlayerSkill::fromArray($skill);
            $skills[] = $playerSkill;
        }

        return new Collection($skills);
    }
}