<?php

namespace Bench\Benchmarks;

class intvalVSintCasting
{
    public function usingIntval()
    {
        intval(2.3);
    }

    public function usingIntCasting()
    {
        (int) 2.3;
    }
}
