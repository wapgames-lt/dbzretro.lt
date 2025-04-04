<?php


namespace LegacyDbz\Parties\DTO;

class Party
{
    const ALLOWED_MEMBERS_AMOUNT = 4;

    private $id;

    private $leaderId;

    private $name;

    private $createdAt;

    /**
     * @param $id
     * @param $leaderId
     * @param $name
     * @param $createdAt
     */
    public function __construct($id, $leaderId, $name, $createdAt)
    {
        $this->id = $id;
        $this->leaderId = $leaderId;
        $this->name = $name;
        $this->createdAt = $createdAt;
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