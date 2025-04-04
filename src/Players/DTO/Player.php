<?php

namespace LegacyDbz\Players\DTO;

class Player
{
    private $id;

    private $username;

    private $ip;

    private $character;

    /**
     * @param $id
     * @param $username
     * @param $ip
     * @param $character
     */
    public function __construct($id, $username, $ip, $character)
    {
        $this->id = $id;
        $this->username = $username;
        $this->ip = $ip;
        $this->character = $character;
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
    public function username()
    {
        return $this->username;
    }

    public function character()
    {
        return $this->character;
    }

    /**
     * @return mixed
     */
    public function ip()
    {
        return $this->ip;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['nick'],
            $data['ip'],
            $data['veikejas']
        );
    }
}