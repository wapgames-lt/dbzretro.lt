<?php

namespace LegacyDbz\Parties\DTO;

class PartyInvite
{
    const STATUS_PENDING = 'pending';
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_DECLINED = 'declined';

    /**
     * @param $id
     * @param $partyId
     * @param $inviterId
     * @param $inviteeId
     * @param $status
     * @param $createdAt
     */
    public function __construct(private $id, private $partyId, private $inviterId, private $inviteeId, private $status = null, private $createdAt = null)
    {
    }

    /**
     * @return mixed
     */
    public function id()
    {
        return $this->id;
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
    public function inviterId()
    {
        return $this->inviterId;
    }

    /**
     * @return mixed
     */
    public function inviteeId()
    {
        return $this->inviteeId;
    }

    /**
     * @return mixed
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * @return mixed
     */
    public function createdAt()
    {
        return $this->createdAt;
    }

    public function isPending()
    {
        return $this->status === self::STATUS_PENDING;
    }

    /**
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data)
    {
        return new self($data['id'], $data['party_id'], $data['inviter_id'], $data['invitee_id'], $data['status'], $data['created_at']);
    }
}