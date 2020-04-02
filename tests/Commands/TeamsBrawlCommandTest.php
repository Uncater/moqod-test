<?php

namespace Tests\Unit;

use App\Exceptions\BadTeamDrainInputException;
use App\Exceptions\UnequalTeamsException;
use Tests\TestCase;

class TeamsBrawlCommandTest extends TestCase
{
    public function test()
    {
        $this->artisan('teams:brawl')
            ->expectsQuestion('Enter A team players:', '6,7,8,9,10')
            ->expectsQuestion('Enter B team players:', '1,2,3,4,5')
            ->expectsOutput('Win')
            ->assertExitCode(0);

        $this->artisan('teams:brawl')
            ->expectsQuestion('Enter A team players:', '1,2,3,4,5')
            ->expectsQuestion('Enter B team players:', '6,7,8,9,10')
            ->expectsOutput('Lose')
            ->assertExitCode(0);

        $this->artisan('teams:brawl')
            ->expectsQuestion('Enter A team players:', '1,2,3,4,5,6')
            ->expectsQuestion('Enter B team players:', '6,7,8,9,10')
            ->expectsOutput(UnequalTeamsException::MESSAGE)
            ->assertExitCode(0);

        $this->artisan('teams:brawl')
            ->expectsQuestion('Enter A team players:', '1,2,3,4,5,asdasd')
            ->expectsOutput(BadTeamDrainInputException::MESSAGE)
            ->assertExitCode(0);
    }
}
