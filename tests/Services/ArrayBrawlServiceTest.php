<?php

namespace Tests\Unit;

use App\Exceptions\UnequalTeamsException;
use App\Factories\TeamFactory;
use App\Services\ArrayBrawlService;
use PHPUnit\Framework\TestCase;

class ArrayBrawlServiceTest extends TestCase
{
    /**
     * @dataProvider provideInputs
     */
    public function testBasicTest($teamA, $teamB, $doesTeamAWin)
    {
        $teamA = TeamFactory::fromString($teamA);
        $teamB = TeamFactory::fromString($teamB);
        $service = new ArrayBrawlService();
        $winner = $service
            ->brawl($teamA, $teamB)
            ->getWinner();
        $this->assertEquals($teamA === $winner, $doesTeamAWin);
    }

    public function testExceptionIsThrownIfTeamsAreNotEqual()
    {
        $this->expectException(UnequalTeamsException::class);
        $teamA = TeamFactory::fromString('1,2,3');
        $teamB = TeamFactory::fromString('1,2,3,4');
        (new ArrayBrawlService())
            ->brawl($teamA, $teamB)
            ->getWinner();
    }

    public function provideInputs()
    {
        return [
            [
                '35, 100, 20, 50, 40',
                '35, 10, 30, 20, 90',
                true
            ],
            [
                '35, 10, 30, 20, 90',
                '35, 100, 20, 50, 40',
                false
            ],
        ];
    }
}
