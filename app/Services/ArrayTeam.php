<?php

namespace App\Services;

class ArrayTeam implements \App\Contracts\Team
{
    /**
     * @var array
     */
    protected $members;

    public function __construct(array $members)
    {
        $this->members = $members;
    }

    /**
     * @return array
     */
    public function getMembers(): array
    {
        return $this->members;
    }

    public function getMembersSortedByDrain(): array
    {
        $members = $this->members;
        sort($members);
        return $members;
    }
}
