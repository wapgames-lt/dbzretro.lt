<?php

namespace LegacyDbz\WorldBosses\Repositories;

use LegacyDbz\Core\Db;
use LegacyDbz\WorldBosses\DTO\WorldBoss;

class WorldBossRepository
{
    /**
     * @return WorldBoss|null
     */
    public function findAliveAndStarted()
    {
        $currentDate = date('Y-m-d H:i:s');

        $stmt = Db::prepare("
            SELECT * FROM `world_bosses`
            WHERE `starts_at` <= :now AND `ends_at` >= :now AND `dead_at` IS NULL
            LIMIT 1
        ");
        $stmt->execute(['now' => $currentDate]);
        $result = Db::fetch($stmt);

        return $result ? WorldBoss::fromArray($result) : null;
    }

    /**
     * @return WorldBoss|null
     */
    public function findLastDead()
    {
        $stmt = Db::prepare("
            SELECT * FROM `world_bosses`
            WHERE `dead_at` IS NOT NULL
            ORDER BY id DESC
            LIMIT 1
        ");
        $stmt->execute();
        $result = Db::fetch($stmt);

        return $result ? WorldBoss::fromArray($result) : null;
    }

    public function freeze($bossId, $freezeEndsAt)
    {
        $stmt = Db::prepare("
            UPDATE world_bosses
            SET freeze_ends_at = :freeze_ends_at
            WHERE id = :id
        ");
        $stmt->execute([
            'freeze_ends_at' => $freezeEndsAt,
            'id' => $bossId,
        ]);
    }

    public function save(WorldBoss $worldBoss)
    {
        $id = $worldBoss->getId();
        $bossId = $worldBoss->getBossId();
        $health = $worldBoss->getHealth();
        $damageType = $worldBoss->getDamageType();
        $switchDamageAt = $worldBoss->getSwitchDamageAt();
        $startsAt = $worldBoss->getStartsAt();
        $endsAt = $worldBoss->getEndsAt();

        if (!$id) {
            $stmt = Db::prepare("
                INSERT INTO `world_bosses` (
                    boss_id, health, damage_type, switch_damage_at, starts_at, ends_at
                ) VALUES (
                    :boss_id, :health, :damage_type, :switch_damage_at, :starts_at, :ends_at
                )
            ");

            $stmt->execute([
                'boss_id' => $bossId,
                'health' => $health,
                'damage_type' => $damageType,
                'switch_damage_at' => $switchDamageAt,
                'starts_at' => $startsAt,
                'ends_at' => $endsAt,
            ]);
        }

        return $worldBoss;
    }
}