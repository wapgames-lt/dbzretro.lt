<?php

declare(strict_types=1);

namespace LegacyDbz\Parties\Models;

use Carbon\CarbonInterface;
use LegacyDbz\Core\Collection;
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

    public const int ALLOWED_MEMBERS_AMOUNT = 4;

    public static function findOrderedByPlayersCount(): Collection
    {
        return self::rawQuery(
            'SELECT parties.*, COUNT(party_members.id) AS member_count 
                 FROM parties
                 LEFT JOIN party_members ON parties.id = party_members.party_id 
                 GROUP BY parties.id 
                 ORDER BY member_count DESC 
                 LIMIT 30'
        );
    }

    public static function findByPlayerId(int $playerId): ?self
    {
        $sql = "
            SELECT parties.* 
            FROM `parties` 
            JOIN party_members ON party_members.party_id = parties.id 
            WHERE party_members.player_id = :player_id
            ";

       return self::rawQuery($sql, ['player_id' => $playerId])->first();
    }
}