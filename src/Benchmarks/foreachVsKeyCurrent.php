<?php

namespace Bench\Benchmarks;

class foreachVsKeyCurrent
{
    public function caseA()
    {
        $testArray = ['foo' => 'bar'];

        foreach ($testArray as $key => $value) {
            $a = $key;
            $b = $value;
        }
    }

    public function caseB()
    {
        $testArray = ['foo' => 'bar'];

        $a = key($testArray);
        $b = current($testArray);
    }

    public function caseC()
    {
        $testArray = ['foo' => 'bar'];

        $a = key($testArray);
        $b = reset($testArray);
    }
} 