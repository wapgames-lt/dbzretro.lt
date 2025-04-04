<?php

namespace LegacyDbz\LegendaryBosses\Repositories;

use LegacyDbz\Core\Db;
use LegacyDbz\LegendaryBosses\DTO\LegendaryBoss;

class LegendaryBossRepository
{
    /**
     * @return LegendaryBoss|null
     */
    public function findAliveAndStarted()
    {
        $currentDate = date('Y-m-d H:i:s');
        $stmt = Db::prepare("
            SELECT * FROM `legendary_bosses`
            WHERE `starts_at` <= :now AND `ends_at` >= :now AND `dead_at` IS NULL
            LIMIT 1
        ");
        $stmt->execute(['now' => $currentDate]);
        $result = Db::fetch($stmt);

        return $result ? LegendaryBoss::fromArray($result) : null;
    }

    public function findPrepared($bossId)
    {
        $stmt = Db::prepare("
            SELECT * FROM `legendary_bosses`
            WHERE `starts_at` IS NULL AND boss_id = :boss_id
            LIMIT 1
        ");
        $stmt->execute(['boss_id' => $bossId]);
        $result = Db::fetch($stmt);

        return $result ? LegendaryBoss::fromArray($result) : null;
    }

    public function findLastDead($bossId)
    {
        $stmt = Db::prepare("
            SELECT * FROM `legendary_bosses`
            WHERE `dead_at` IS NOT NULL AND boss_id = :boss_id
            ORDER BY id DESC
            LIMIT 1
        ");
        $stmt->execute(['boss_id' => $bossId]);
        $result = Db::fetch($stmt);

        return $result ? LegendaryBoss::fromArray($result) : null;
    }

    public function freeze($bossId, $freezeEndsAt)
    {
        $stmt = Db::prepare("
            UPDATE legendary_bosses
            SET freeze_ends_at = :freeze_ends_at
            WHERE id = :id
        ");
        $stmt->execute([
            'freeze_ends_at' => $freezeEndsAt,
            'id' => $bossId,
        ]);
    }

    public function summon($bossId)
    {
        $now = new \DateTime();
        $switchDamageAt = clone $now;
        $switchDamageAt->modify('+30 seconds');

        $endsAt = clone $now;
        $endsAt->modify('+4 hours');

        $stmt = Db::prepare("
            UPDATE legendary_bosses
            SET
                switch_damage_at = :switch_damage_at,
                starts_at = :starts_at,
                ends_at = :ends_at
            WHERE id = :id
        ");
        $stmt->execute([
            'switch_damage_at' => $switchDamageAt->format('Y-m-d H:i:s'),
            'starts_at' => $now->format('Y-m-d H:i:s'),
            'ends_at' => $endsAt->format('Y-m-d H:i:s'),
            'id' => $bossId,
        ]);
    }

    public function save(LegendaryBoss $legendaryBoss)
    {
        $bossId = $legendaryBoss->getBossId();
        $health = $legendaryBoss->getHealth();
        $damageType = $legendaryBoss->getDamageType();
        $switchDamageAt = $legendaryBoss->getSwitchDamageAt();
        $startsAt = $legendaryBoss->getStartsAt();
        $endsAt = $legendaryBoss->getEndsAt();

        $stmt = Db::prepare("
            INSERT INTO `legendary_bosses` (
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

        return $legendaryBoss;
    }
}