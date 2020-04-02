<?php

namespace App\Services;

use App\Contracts\Brawlable;
use App\Contracts\Team;
use App\Exceptions\UnequalTeamsException;

class ArrayBrawlService implements Brawlable
{
    /**
     * @var Team
     */
    protected $winner;

    public function brawl(Team $teamA, Team $teamB): Brawlable
    {
        $teamAMembers = $teamA->getMembersSortedByDrain();
        $teamBMembers = $teamB->getMembersSortedByDrain();

        if (count($teamAMembers) != count ($teamBMembers)) {
            throw new UnequalTeamsException();
        }

        $this->winner = $teamA;
        foreach ($teamAMembers as $key => $value) {
            if ($teamBMembers[$key] >= $value) {
                $this->winner = $teamB;
                break;
            }
        }
        return $this;
    }

    public function getWinner(): Team
    {
        return $this->winner;
    }
}
