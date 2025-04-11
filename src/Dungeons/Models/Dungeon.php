<?php

declare(strict_types=1);

namespace LegacyDbz\Dungeons\Models;

use LegacyDbz\Core\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $img_url
 * @property int $entry_level_min
 * @property int $entry_level_max
 */
class Dungeon extends Model
{
    protected string $table = 'dungeons';
}