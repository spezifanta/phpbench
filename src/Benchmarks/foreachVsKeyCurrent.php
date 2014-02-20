<?php

namespace Bench\Benchmarks;

class foreachVsKeyCurrent
{
    public function usingForeach()
    {
        $testArray = ['foo' => 'bar'];

        foreach ($testArray as $key => $value) {
            $a = $key;
            $b = $value;
        }
    }

    public function usingKeyAndCurrent()
    {
        $testArray = ['foo' => 'bar'];

        $a = key($testArray);
        $b = current($testArray);
    }

    public function usingKeyAndReset()
    {
        $testArray = ['foo' => 'bar'];

        $a = key($testArray);
        $b = reset($testArray);
    }
}
