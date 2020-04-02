<?php

namespace App\Contracts;

interface Team
{
    public function getMembersSortedByDrain() :array;
}
