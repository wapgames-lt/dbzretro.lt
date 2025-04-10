<?php

namespace LegacyDbz\Players\DTO;

use DateTime;
use LegacyDbz\Skills\DTO\Skill;

class PlayerSkill
{
    /**
     * @param $endsAt
     * @param $playerId
     * @param Skill $skill
     */
    public function __construct(private $endsAt, private $playerId, private readonly Skill $skill)
    {
    }

    /**
     * @return mixed
     */
    public function endsAt()
    {
        return $this->endsAt;
    }

    public function endsAtFormatted()
    {
        $currentDate = new DateTime();
        $endDateObject = new DateTime($this->endsAt);
        $timeDifference = $currentDate->diff($endDateObject);
        if ($timeDifference->i > 0) {
            return $timeDifference->format('%i min %s sec');
        }
        return $timeDifference->format('%s sec');
    }

    /**
     * @return mixed
     */
    public function playerId()
    {
        return $this->playerId;
    }

    /**
     * @return Skill
     */
    public function skill()
    {
        return $this->skill;
    }

    public static function fromArray(array $data)
    {
        $skill = Skill::fromArray($data);
        return new self(
            $data['ends_at'],
            $data['player_id'],
            $skill
        );
    }
}