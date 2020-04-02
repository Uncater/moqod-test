<?php

namespace App\Factories;

use App\Exceptions\BadTeamDrainInputException;
use App\Services\ArrayTeam;

class TeamFactory
{
    public static function fromString(string $string)
    {
        $members = explode(',', preg_replace('/\s+/', '', $string));
        foreach ($members as $member) {
            if (!is_numeric($member)) {
                throw new BadTeamDrainInputException();
            }
        }
        return new ArrayTeam($members);
    }
}
