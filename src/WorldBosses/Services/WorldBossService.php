<?php

namespace LegacyDbz\WorldBosses\Services;

use LegacyDbz\WorldBosses\DTO\WorldBoss;
use LegacyDbz\WorldBosses\Repositories\WorldBossRepository;

class WorldBossService
{
    private $bossList = [
        [
            'id' => '1',
            'name' => 'Kristina',
            'health' => 15000000,
            'videos' => [
                'kristinos_repas.mp4',
            ],
            'defencePercentage' => [
                '5',
                '20',
            ],
            'damagePercentage' => [
                '5',
                '10',
                '15'
            ],
            'criticalChancePercentage' => [
                '1',
                '5',
            ],
            'blockRatePercentage' => [
                '5',
            ],
            'messagesAfterCriticalDamage' => [
                'Degsi pragare!',
            ],
            'chests' => [
                'common' => [
                    'dropRate' => 40,
                    'contents' => [
                        'fish' => [
                            1000,
                            2000,
                        ],
                        'wood' => [
                            1000,
                            2000,
                        ],
                    ],
                ],
                'rare' => [
                    'dropRate' => 31,
                    'contents' => [
                        'fish' => [
                            2000,
                            4000,
                        ],
                        'wood' => [
                            2000,
                            4000,
                        ],
                    ],
                ],
                'legendary' => [
                    'dropRate' => 20,
                    'contents' => [
                        'fish' => [
                            1000,
                            2000,
                        ],
                        'wood' => [
                            4000,
                            12000,
                        ],
                        'deathArmour' => [
                            1,
                            1,
                        ],
                        'deathSword' => [
                            1,
                            1,
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => '2',
            'name' => 'Petras',
            'health' => 5000000,
            'videos' => [
                'petras_kitoks_seimoj.mp4',
            ],
            'defencePercentage' => [
                '5',
                '20',
            ],
            'damagePercentage' => [
                '5',
                '10',
                '15'
            ],
            'criticalChancePercentage' => [
                '1',
                '5',
            ],
            'blockRatePercentage' => [
                '35',
            ],
            'messagesAfterCriticalDamage' => [
                'A tu supranti asileli!',
                'Ooo! Vyrai, tu papuolei į šūdiną situaciją!',
            ],
            'chests' => [
                'epic' => [
                    'dropRate' => 30,
                    'contents' => [
                        'fish' => [
                            2000,
                            4000,
                        ],
                        'wood' => [
                            2000,
                            4000,
                        ],
                        'destructionAmulet' => [
                            1,
                            1,
                        ],
                    ],
                ],
                'legendary' => [
                    'dropRate' => 15,
                    'contents' => [
                        'fish' => [
                            10000,
                            15000,
                        ],
                        'wood' => [
                            4000,
                            6000,
                        ],
                        'revivalAmulet' => [
                            1,
                            1,
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => '3',
            'name' => 'Babidis',
            'health' => 1000000,
            'images' => [
                'babidi.webp',
            ],
            'defencePercentage' => [
                '15',
                '35',
            ],
            'damagePercentage' => [
                '5',
                '10',
                '15'
            ],
            'criticalChancePercentage' => [
                '40',
                '50',
            ],
            'blockRatePercentage' => [
                '65',
            ],
            'messagesAfterCriticalDamage' => [
                'Babidžio smūgis!',
            ],
            'chests' => [
                'common' => [
                    'dropRate' => 70,
                    'contents' => [
                        'fish' => [
                            500,
                            1000,
                        ],
                        'wood' => [
                            500,
                            1000,
                        ],
                    ],
                ],
                'rare' => [
                    'dropRate' => 20,
                    'contents' => [
                        'fish' => [
                            1000,
                            2000,
                        ],
                        'wood' => [
                            1000,
                            2000,
                        ],
                    ],
                ],
                'epic' => [
                    'dropRate' => 9,
                    'contents' => [
                        'fish' => [
                            2000,
                            4000,
                        ],
                        'wood' => [
                            2000,
                            4000,
                        ],
                        'destructionAmulet' => [
                            1,
                            1,
                        ],
                    ],
                ],
                'legendary' => [
                    'dropRate' => 1,
                    'contents' => [
                        'fish' => [
                            10000,
                            15000,
                        ],
                        'wood' => [
                            4000,
                            6000,
                        ],
                        'deathAmulet' => [
                            1,
                            1,
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => '4',
            'name' => 'Fryzas',
            'health' => 3000000,
            'images' => [
                'freeze.gif',
            ],
            'defencePercentage' => [
                '15',
                '35',
            ],
            'damagePercentage' => [
                '15',
                '35'
            ],
            'criticalChancePercentage' => [
                '10',
                '20',
            ],
            'blockRatePercentage' => [
                '50',
            ],
            'messagesAfterCriticalDamage' => [
                'Smūgis iš uodegos!',
            ],
            'chests' => [
                'epic' => [
                    'dropRate' => 30,
                    'contents' => [
                        'fish' => [
                            4000,
                            6000,
                        ],
                        'wood' => [
                            4000,
                            6000,
                        ],
                    ],
                ],
                'legendary' => [
                    'dropRate' => 15,
                    'contents' => [
                        'fish' => [
                            1000,
                            2000,
                        ],
                        'wood' => [
                            4000,
                            12000,
                        ],
                        'deathAmulet' => [
                            1,
                            1,
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => '5',
            'name' => 'Celas',
            'health' => 3000000,
            'images' => [
                'cell.gif',
            ],
            'defencePercentage' => [
                '15',
                '35',
            ],
            'damagePercentage' => [
                '15',
                '35'
            ],
            'criticalChancePercentage' => [
                '30',
                '40',
            ],
            'blockRatePercentage' => [
                '30',
            ],
            'messagesAfterCriticalDamage' => [
                'Smūgis iš uodegos!',
            ],
            'chests' => [
                'common' => [
                    'dropRate' => 70,
                    'contents' => [
                        'fish' => [
                            1000,
                            2000,
                        ],
                        'wood' => [
                            1000,
                            2000,
                        ],
                    ],
                ],
                'rare' => [
                    'dropRate' => 20,
                    'contents' => [
                        'fish' => [
                            2000,
                            4000,
                        ],
                        'wood' => [
                            2000,
                            4000,
                        ],
                    ],
                ],
                'epic' => [
                    'dropRate' => 9,
                    'contents' => [
                        'fish' => [
                            4000,
                            6000,
                        ],
                        'wood' => [
                            4000,
                            6000,
                        ],
                    ],
                ],
                'legendary' => [
                    'dropRate' => 1,
                    'contents' => [
                        'fish' => [
                            1000,
                            2000,
                        ],
                        'wood' => [
                            4000,
                            12000,
                        ],
                        'deathAmulet' => [
                            1,
                            1,
                        ],
                    ],
                ],
            ],
        ],
        [
            'id' => '6',
            'name' => 'Puaras',
            'health' => 100000,
            'images' => [
                'puar.gif',
            ],
            'defencePercentage' => [
                '15',
                '35',
            ],
            'damagePercentage' => [
                '5',
                '10',
                '15'
            ],
            'criticalChancePercentage' => [
                '40',
                '50',
            ],
            'blockRatePercentage' => [
                '85',
            ],
            'messagesAfterCriticalDamage' => [
                'Puaro kraikas nesutvarkytas!',
            ],
            'chests' => [
                'common' => [
                    'dropRate' => 70,
                    'contents' => [
                        'fish' => [
                            500,
                            1000,
                        ],
                        'wood' => [
                            500,
                            1000,
                        ],
                    ],
                ],
                'rare' => [
                    'dropRate' => 20,
                    'contents' => [
                        'fish' => [
                            1000,
                            2000,
                        ],
                        'wood' => [
                            1000,
                            2000,
                        ],
                    ],
                ],
                'epic' => [
                    'dropRate' => 9,
                    'contents' => [
                        'fish' => [
                            2000,
                            4000,
                        ],
                        'wood' => [
                            2000,
                            4000,
                        ],
                    ],
                ],
                'legendary' => [
                    'dropRate' => 1,
                    'contents' => [
                        'fish' => [
                            4000,
                            5000,
                        ],
                        'wood' => [
                            4000,
                            6000,
                        ],
                        'deathArmour' => [
                            1,
                            1,
                        ],
                        'deathSword' => [
                            1,
                            1,
                        ],
                    ],
                ],
            ],
        ],
    ];

    /**
     * @var WorldBossRepository
     */
    private $worldBossRepository;

    public function __construct(WorldBossRepository $worldBossRepository)
    {
        $this->worldBossRepository = $worldBossRepository;
    }

    /**
     * @return WorldBoss
     * @throws \Exception
     */
    public function get()
    {
        $boss = $this->worldBossRepository->findAliveAndStarted();
        if ($boss) {
            return $boss;
        }

        $lastDeadBoss = $this->worldBossRepository->findLastDead();
        if ($lastDeadBoss && !$this->canSpawnBoss($lastDeadBoss)) {
            return null;
        }

        $date = date('Y-m-d H:i:s');
        $switchDamageAt = date('Y-m-d H:i:s', strtotime($date) + 30);
        $endsAt = date('Y-m-d H:i:s', strtotime($date . ' +6 hours'));

        $bossConfig = $this->getRandomBossByConfig($lastDeadBoss->getBossId());
        $worldBoss = new WorldBoss(
            null,
            $bossConfig['id'],
            null,
            null,
            $bossConfig['health'],
            WorldBoss::DAMAGE_TYPE_DEATH,
            $switchDamageAt,
            null,
            $date,
            $endsAt
        );

        return $this->worldBossRepository->save($worldBoss);
    }

    public function getBossConfig($bossId)
    {
        return $this->getBossConfigById($bossId);
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

    public function whenBossWillSpawn()
    {
        $lastDeadBoss = $this->worldBossRepository->findLastDead();

        return $lastDeadBoss ? $lastDeadBoss->getEndsAt() : null;
    }

    private function getRandomBossByConfig($id)
    {
        $filteredBossList = array_filter($this->bossList, static function ($boss) use ($id) {
            return $boss['id'] !== $id;
        });

        if (empty($filteredBossList)) {
            return null;
        }

        $randomKey = array_rand($filteredBossList);

        return $filteredBossList[$randomKey];
    }

    private function getBossConfigById($bossId)
    {
        foreach ($this->bossList as $boss) {
            if ($boss['id'] === $bossId) {
                return $boss;
            }
        }

        return [];
    }

    private function canSpawnBoss(WorldBoss $lastDeadBoss)
    {
        $currentDate = date('Y-m-d H:i:s');
        $timestamp1 = strtotime($currentDate);
        $timestamp2 = strtotime($lastDeadBoss->getEndsAt());

        return $timestamp1 > $timestamp2;
    }
}