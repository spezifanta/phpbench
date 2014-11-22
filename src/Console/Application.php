<?php

namespace Bench\Console;

use Bench\Console\Command\BenchMarkCommand;

class Application extends \Symfony\Component\Console\Application
{
    const VERSION = 0.1;

    public function __construct()
    {
        error_reporting(-1);
        ini_set('memory_limit', '-1');

        parent::__construct('PHP Benchmark', self::VERSION);

        $this->add(new BenchMarkCommand());
    }
}
