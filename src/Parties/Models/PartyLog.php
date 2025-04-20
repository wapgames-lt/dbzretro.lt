<?php

declare(strict_types=1);

namespace LegacyDbz\Parties\Models;

use Carbon\CarbonInterface;
use LegacyDbz\Core\Model;

/**
 * @property int $id
 * @property int $party_id
 * @property string $description
 * @property CarbonInterface $created_at
 */
final class PartyLog extends Model
{
    protected string $table = 'party_logs';
}