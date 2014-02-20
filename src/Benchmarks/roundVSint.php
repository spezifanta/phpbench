<?php

namespace Bench\Benchmarks;

class roundVSint
{
    public function caseA()
    {
        round(2.3);
    }

    public function caseB()
    {
        (int) 2.3 + 0.5;
    }
}
