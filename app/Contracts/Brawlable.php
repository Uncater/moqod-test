<?php

namespace App\Contracts;

use App\Exceptions\UnequalTeamsException;

/**
 * Interface Brawlable
 * @package App\Contracts
 * @property Team $winner
 */
interface Brawlable
{
    /**
     * @param Team $teamA
     * @param Team $teamB
     * @return bool
     * @throws UnequalTeamsException
     */
    public function brawl(Team $teamA, Team $teamB) :Brawlable;

    public function getWinner() :Team;
}
