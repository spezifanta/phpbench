<?php

namespace Bench\Benchmarks;

class strposVSstripos
{
    public function caseA()
    {
        strpos('Bundle:Controller:Method', ':');
    }

    public function caseB()
    {
        stripos('Bundle:Controller:Method', ':');
    }
}
