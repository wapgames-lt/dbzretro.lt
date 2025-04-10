<?php

namespace LegacyDbz\Parties\DTO;

class PartyMember
{
    /**
     * @param $partyId
     * @param $playerId
     * @param $joinedAt
     */
    public function __construct(private $partyId, private $playerId, private $joinedAt)
    {
    }

    /**
     * @return mixed
     */
    public function partyId()
    {
        return $this->partyId;
    }

    /**
     * @return mixed
     */
    public function playerId()
    {
        return $this->playerId;
    }

    /**
     * @return mixed
     */
    public function joinedAt()
    {
        return $this->joinedAt;
    }

    public static function fromArray(array $data)
    {
        return new self($data['party_id'], $data['player_id'], $data['joined_at']);
    }
}