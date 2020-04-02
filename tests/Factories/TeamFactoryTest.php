<?php

namespace Tests\Unit;

use App\Exceptions\BadTeamDrainInputException;
use App\Factories\TeamFactory;
use PHPUnit\Framework\TestCase;

class TeamFactoryTest extends TestCase
{
    /**
     * @dataProvider provideInputsForCreate
     */
    public function testCreate($data, $expected)
    {
        $team = TeamFactory::fromString($data);
        $this->assertEquals($team->getMembers(), $expected);
    }

    public function testExceptionIsThrownOnInvalidInput()
    {
        $this->expectException(BadTeamDrainInputException::class);
        TeamFactory::fromString('1,2,asd,3');
    }

    public function provideInputsForCreate()
    {
        return [
            [
                '1,2,3,4,5',
                [1,2,3,4,5]
            ],
            [
                '1, 2 ,3 ,4 ,5',
                [1,2,3,4,5]
            ],
        ];
    }
}
