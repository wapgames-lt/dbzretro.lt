<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/Dungeons',
        __DIR__ . '/LegendaryBosses',
        __DIR__ . '/cfg',
        __DIR__ . '/jungleking',
        __DIR__ . '/mission',
        __DIR__ . '/src',
        __DIR__ . '/worldbosses',
    ])
    ->withPhpSets()
    ->withTypeCoverageLevel(2)
    ->withDeadCodeLevel(1)
    ->withCodeQualityLevel(30);
