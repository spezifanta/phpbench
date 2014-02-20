<?php

namespace Bench\Console;

use Bench\Console\Command\BenchMarkCommand;

class Application extends \Symfony\Component\Console\Application
{
    public function __construct()
    {
        error_reporting(-1);
        ini_set('memory_limit', '2G');

        parent::__construct('PHP Benchmark', 0.1);

        $this->add(new BenchMarkCommand());
    }
}
