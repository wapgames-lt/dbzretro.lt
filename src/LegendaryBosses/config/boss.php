<?php

return [
    [
        'id' => '1',
        'name' => 'Broly',
        'health' => 1000000,
        'images' => [
            'broly.gif',
        ],
        'defencePercentage' => [
            '5',
            '20',
        ],
        'damagePercentage' => [
            '5',
            '10',
            '15',
        ],
        'criticalChancePercentage' => [
            '1',
            '5',
        ],
        'blockRatePercentage' => [
            '5',
        ],
        'messagesAfterCriticalDamage' => [
            'Budumc!',
        ],
        'summon_items' => [
            'cadmiumOre' => '150',
            'stone' => '50',
            'microshem' => '30',
            'sayiantail' => '50',
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
                    'quartzOre' =>[
                        400,
                        600,
                    ],
                ],
            ],
        ],
    ],
    [
        'id' => '2',
        'name' => 'Jiren',
        'health' => 1000000,
        'images' => [
            'jiren.gif',
        ],
        'defencePercentage' => [
            '15',
            '25',
        ],
        'damagePercentage' => [
            '5',
            '10',
            '25',
        ],
        'criticalChancePercentage' => [
            '1',
            '5',
        ],
        'blockRatePercentage' => [
            '5',
        ],
        'messagesAfterCriticalDamage' => [
            'Budumc!',
        ],
        'summon_items' => [
            'cadmiumOre' => '300',
            'stone' => '40',
            'microshem' => '30',
            'sayiantail' => '150',
        ],
        'chests' => [
            'rare' => [
                'dropRate' => 70,
                'contents' => [
                    'fish' => [
                        2000,
                        4000,
                    ],
                    'wood' => [
                        2000,
                        4000,
                    ],
                    'quartzOre' =>[
                        100,
                        600,
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
                    'quartzOre' =>[
                        400,
                        16000,
                    ],
                    'infinitySword' => [
                        1,
                        1,
                    ],
                ],
            ],
        ],
    ],
    [
        'id' => '3',
        'name' => 'Beerus',
        'health' => 1000000,
        'images' => [
            'beerus.gif',
        ],
        'defencePercentage' => [
            '15',
            '25',
        ],
        'damagePercentage' => [
            '15',
            '20',
            '25',
        ],
        'criticalChancePercentage' => [
            '1',
            '25',
        ],
        'blockRatePercentage' => [
            '25',
        ],
        'messagesAfterCriticalDamage' => [
            'Budumc!',
        ],
        'summon_items' => [
            'cadmiumOre' => '1600',
            'stone' => '40',
            'microshem' => '150',
            'sayiantail' => '350',
        ],
        'chests' => [
            'rare' => [
                'dropRate' => 70,
                'contents' => [
                    'fish' => [
                        2000,
                        4000,
                    ],
                    'wood' => [
                        2000,
                        4000,
                    ],
                    'quartzOre' =>[
                        400,
                        600,
                    ],
                ],
            ],
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
                    'quartzOre' => [
                        4000,
                        60000,
                    ],
                    'infinitySword' => [
                        1,
                        1,
                    ],
                ],
            ],
        ],
    ],
];
