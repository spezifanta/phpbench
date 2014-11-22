<?php

namespace Bench\Console\Command;

use Bench\BenchMark;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class BenchMarkCommand extends Command
{
    protected function configure()
    {
        $this->setName('run');
        $this->setDescription('Run benchmarks');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $benchMark = new BenchMark();
        $benchMark->run();

        $output->writeln('<info>Results</info>');

        foreach ($benchMark->getResults() as $result) {
            $output->writeln($result);
        }
    }
}
