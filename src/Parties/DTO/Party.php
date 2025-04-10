<?php


namespace LegacyDbz\Parties\DTO;

class Party
{
    const ALLOWED_MEMBERS_AMOUNT = 4;

    /**
     * @param $id
     * @param $leaderId
     * @param $name
     * @param $createdAt
     */
    public function __construct(private $id, private $leaderId, private $name, private $createdAt)
    {
    }

    /**
     * @return int|null
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function leaderId()
    {
        return $this->leaderId;
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function createdAt()
    {
        return $this->createdAt;
    }

    public static function fromArray($data)
    {
        return new self($data['id'], $data['leader_id'], $data['name'], $data['created_at']);
    }
}