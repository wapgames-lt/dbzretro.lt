<?php

namespace LegacyDbz\Skills\DTO;

class Skill
{
    const BUFF_NAME_MONEY_DROP = 'Money Drop';
    const BUFF_NAME_LUCKY_DROP = 'Lucky Drop';
    const BUFF_NAME_DIVINE_PROSPERITY = 'Divine Prosperity';
    const BUFF_NAME_CROSS_OF_BLOOD = 'Cross Of Blood';

    const FIGHT_ZONE_BUFFS = [
        self::BUFF_NAME_MONEY_DROP,
        self::BUFF_NAME_LUCKY_DROP,
        self::BUFF_NAME_DIVINE_PROSPERITY,
    ];

    const JUNGLE_KING_BOSSES_BUFFS = [
        self::BUFF_NAME_CROSS_OF_BLOOD,
    ];

    const CATEGORY_BUFF = 'buff';

    /**
     * @param $id
     * @param $name
     * @param $description
     * @param $cooldown
     */
    public function __construct(private $id, private $name, private $description, private $cooldown, private $category, private $power, private $icon)
    {
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
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
    public function description()
    {
        return $this->description;
    }

    /**
     * @return int
     */
    public function cooldown()
    {
        return $this->cooldown;
    }

    /**
     * @return mixed
     */
    public function category()
    {
        return $this->category;
    }

    /**
     * @return int
     */
    public function power()
    {
        return $this->power;
    }

    /**
     * @return string
     */
    public function icon()
    {
        return $this->icon;
    }

    /**
     * @return self
     */
    public static function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['description'],
            $data['cooldown'],
            $data['category'],
            $data['power'],
            $data['icon']
        );
    }

    public function toArray()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
        ];
    }
}