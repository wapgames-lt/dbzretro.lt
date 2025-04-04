<?php

namespace LegacyDbz\WorldBosses\DTO;

use DateTime;

class WorldBoss
{
    const DAMAGE_TYPE_DEATH = 'death';
    const DAMAGE_TYPE_REVIVAL = 'revival';

    private $id;

    private $bossId;
    private $firstHitPlayerId;
    private $lastHitPlayerId;

    private $health;

    private $damageType;
    private $switchDamageAt;

    private $freezeEndsAt;
    private $startsAt;
    private $endsAt;

    /**
     * @param $id
     * @param $bossId
     * @param $firstHitPlayerId
     * @param $lastHitPlayerId
     * @param $health
     * @param $damageType
     * @param $switchDamageAt
     * @param $freezeEndsAt
     * @param $startsAt
     * @param $endsAt
     */
    public function __construct($id, $bossId, $firstHitPlayerId, $lastHitPlayerId, $health, $damageType, $switchDamageAt, $freezeEndsAt, $startsAt, $endsAt)
    {
        $this->id = $id;
        $this->bossId = $bossId;
        $this->firstHitPlayerId = $firstHitPlayerId;
        $this->lastHitPlayerId = $lastHitPlayerId;
        $this->health = $health;
        $this->damageType = $damageType;
        $this->switchDamageAt = $switchDamageAt;
        $this->freezeEndsAt = $freezeEndsAt;
        $this->startsAt = $startsAt;
        $this->endsAt = $endsAt;
    }


    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getBossId()
    {
        return $this->bossId;
    }

    /**
     * @return mixed
     */
    public function getFirstHitPlayerId()
    {
        return $this->firstHitPlayerId;
    }

    /**
     * @return int
     */
    public function getLastHitPlayerId()
    {
        return $this->lastHitPlayerId;
    }

    /**
     * @return int
     */
    public function getHealth()
    {
        return $this->health;
    }

    /**
     * @return string
     */
    public function getDamageType()
    {
        return $this->damageType;
    }

    /**
     * @return string
     */
    public function getSwitchDamageAt()
    {
        return $this->switchDamageAt;
    }

    public function canSwitchDamage()
    {
        $currentDate = date('Y-m-d H:i:s');
        $timestamp1 = strtotime($currentDate);
        $timestamp2 = strtotime($this->switchDamageAt);

        return $timestamp1 > $timestamp2;
    }

    /**
     * @return string
     */
    public function getFreezeEndsAt()
    {
        return $this->freezeEndsAt;
    }

    public function freezeEndsAfter()
    {
        $currentDate = new DateTime();
        $endDateObject = new DateTime($this->freezeEndsAt);
        $timeDifference = $currentDate->diff($endDateObject);
        if ($timeDifference->i > 0) {
           return $timeDifference->format('%i min %s sec');
        }

        return $timeDifference->format('%s sec');
    }

    /**
     * @return bool
     */
    public function isFreezed()
    {
        if (!$this->freezeEndsAt) {
            return false;
        }

        $currentDate = date('Y-m-d H:i:s');
        $timestamp1 = strtotime($currentDate);
        $timestamp2 = strtotime($this->freezeEndsAt);

        return $timestamp1 < $timestamp2;
    }

    public function getStartsAt()
    {
        return $this->startsAt;
    }

    /**
     * @return string
     */
    public function getEndsAt()
    {
        return $this->endsAt;
    }

    /**
     * @return self
     */
    public static function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['boss_id'],
            $data['first_hit_player_id'],
            $data['last_hit_player_id'],
            $data['health'],
            $data['damage_type'],
            $data['switch_damage_at'],
            $data['freeze_ends_at'],
            $data['starts_at'],
            $data['ends_at']
        );
    }
}