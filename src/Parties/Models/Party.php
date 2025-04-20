<?php

declare(strict_types=1);

namespace LegacyDbz\Parties\Models;

use Carbon\CarbonInterface;
use LegacyDbz\Core\Model;

/**
 * @property int $id
 * @property int $leader_id
 * @property string $name
 * @property CarbonInterface $created_at
 */
final class Party extends Model
{
    protected string $table = 'parties';
}