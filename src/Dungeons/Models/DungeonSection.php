<?php

declare(strict_types=1);

namespace LegacyDbz\Dungeons\Models;

use Carbon\CarbonInterface;
use LegacyDbz\Core\Model;

/**
 * @property int $id
 * @property int $dungeon_id
 * @property int $priority
 * @property string $name
 * @property string $img_url
 * @property CarbonInterface $created_at
 * @property CarbonInterface $updated_at
 */
class DungeonSection extends Model
{
    protected string $table = 'dungeon_sections';
}