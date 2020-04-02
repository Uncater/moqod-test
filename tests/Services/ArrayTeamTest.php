<?php

namespace Tests\Unit;

use App\Services\ArrayTeam;
use Tests\TestCase;

class ArrayTeamTest extends TestCase
{
    /**
     * @dataProvider provideInputsForDrain
     */
    public function testGetMembersSortedByDrain($data, $expected)
    {
        $team = new ArrayTeam($data);
        $this->assertEquals($team->getMembersSortedByDrain(), $expected);
    }

    public function provideInputsForDrain()
    {
        return [
            [
                [2,1,3,5,4],
                [1,2,3,4,5],
            ],
            [
                [10,20,99,150,4],
                [4,10,20,99,150],
            ],
        ];
    }
}
