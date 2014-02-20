<?php

namespace Bench\Benchmarks;

class roundVSint
{
    public function usingRound()
    {
        round(2.3);
    }

    public function usingIntCasting()
    {
        (int) 2.3 + 0.5;
    }
}
