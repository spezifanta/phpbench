<?php

namespace Bench\Benchmarks;

class strposVSstripos
{
    public function usingStrpos()
    {
        strpos('Bundle:Controller:Method', ':');
    }

    public function usingStripos()
    {
        stripos('Bundle:Controller:Method', ':');
    }
}
