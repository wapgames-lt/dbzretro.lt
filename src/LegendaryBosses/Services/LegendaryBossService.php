<?php

namespace LegacyDbz\LegendaryBosses\Services;

use LegacyDbz\LegendaryBosses\DTO\LegendaryBoss;
use LegacyDbz\LegendaryBosses\Repositories\LegendaryBossRepository;

class LegendaryBossService
{
    private $bossList;

    public function __construct(private readonly LegendaryBossRepository $legendaryBossRepository)
    {
        $this->bossList = include __DIR__ . '/../config/boss.php';
    }

    /**
     * @return LegendaryBoss|null
     * @throws \Exception
     */
    public function get()
    {
        return $this->legendaryBossRepository->findAliveAndStarted();
    }


    /**
     * @return LegendaryBoss
     * @throws \Exception
     */
    public function getPreparedBoss($bossId)
    {
        $boss = $this->legendaryBossRepository->findPrepared($bossId);
        if ($boss) {
            return $boss;
        }

        $lastDeadBoss = $this->legendaryBossRepository->findLastDead($bossId);
        if ($lastDeadBoss && !$this->canSpawnBoss($lastDeadBoss)) {
            return null;
        }

        $date = date('Y-m-d H:i:s');
        $switchDamageAt = date('Y-m-d H:i:s', strtotime($date) + 30);
//        $endsAt = date('Y-m-d H:i:s', strtotime($date . ' +3 hours'));


        $bossConfig = $this->getBossConfig($bossId);
        $boss = new LegendaryBoss(
            null,
            $bossConfig['id'],
            null,
            null,
            $bossConfig['health'],
            LegendaryBoss::DAMAGE_TYPE_DEATH,
            $switchDamageAt,
            null,
            null,
            null
        );

        $this->legendaryBossRepository->save($boss);

        return $this->legendaryBossRepository->findPrepared($bossId);
    }

    public function getBossConfig($bossId)
    {
        return $this->getBossConfigById($bossId);
    }

    public function getBossesFromConfig()
    {
        $bosses = [];
        foreach ($this->bossList as $boss) {
            $bosses[] = [
                'id' => $boss['id'],
                'name' => $boss['name'],
                'image' => $this->getRandomImage($boss),
            ];
        }

        return $bosses;
    }

    public function getRandomChest($bossConfig)
    {
        if (!isset($bossConfig['chests'])) {
            return null;
        }

        $dropRates = [];
        foreach ($bossConfig['chests'] as $type => $chest) {
            $dropRates[$type] = $chest['dropRate'];
        }

        $random = mt_rand(1, 100);
        $currentSum = 0;

        foreach ($dropRates as $chestType => $rate) {
            $currentSum += $rate;
            if ($random <= $currentSum) {
                return [
                    'type' => $chestType,
                    'config' => $bossConfig['chests'][$chestType]
                ];
            }
        }
        return null;
    }

    public function getRandomVideo($bossConfig)
    {
        $videos = $bossConfig['videos'];
        if (!$videos) {
            return null;
        }

        $randomKey = array_rand($videos);

        return $videos[$randomKey];
    }

    public function getRandomImage($bossConfig)
    {
        $images = $bossConfig['images'];
        if (!$images) {
            return null;
        }

        $randomKey = array_rand($images);

        return $images[$randomKey];
    }

    public function whenBossWillSpawn($bossId)
    {
        $lastDeadBoss = $this->legendaryBossRepository->findLastDead($bossId);

        return $lastDeadBoss ? $lastDeadBoss->getEndsAt() : null;
    }

    private function getRandomBossByConfig($id)
    {
        $filteredBossList = array_filter($this->bossList, static fn($boss) => $boss['id'] !== $id);

        if (empty($filteredBossList)) {
            return null;
        }

        $randomKey = array_rand($filteredBossList);

        return $filteredBossList[$randomKey];
    }

    private function getBossConfigById(int $bossId)
    {
        foreach ($this->bossList as $boss) {
            if ((int)$boss['id'] === $bossId) {
                return $boss;
            }
        }

        return [];
    }

    private function canSpawnBoss(LegendaryBoss $lastDeadBoss)
    {
        $currentDate = date('Y-m-d H:i:s');
        $timestamp1 = strtotime($currentDate);
        $timestamp2 = strtotime($lastDeadBoss->getEndsAt());

        return $timestamp1 > $timestamp2;
    }
}