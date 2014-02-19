<?php

namespace Bench\Console\Command;

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
        $output->writeln('<info>Results</info>');

        $fileSystemIterator = new \FilesystemIterator(__DIR__ . '/../../Benchmarks');
        $timeTable = [];
        foreach ($fileSystemIterator as $fileInfo) {
            if ($fileInfo->getExtension() !== 'php') {
                continue;
            }

            $class = '\Bench\Benchmarks\\' . $fileInfo->getBasename('.php');
            $reflectionClass = new \ReflectionClass($class);
            $methods = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);

            foreach ($methods as $method) {
                $startTime = microtime(true);
                $this->loop([new $class, $method->getName()]);
                $timeTable[$reflectionClass->getShortName()][] = [
                    'method' => $method->getName(),
                    'duration' => microtime(true) - $startTime,
                ];
            }
        }

        foreach ($timeTable as $testCase => $records) {
            usort($records, function ($a, $b) {
                return ($a['duration'] <= $b['duration']) ? -1 : 1;
            });

            for ($i = 0; $i < count($records); $i++) {
                $output->writeln(sprintf(
                    '%s::%s - %.3fms | %.2f%%',
                    $testCase,
                    $records[$i]['method'],
                    round($records[$i]['duration'] * 1000, 3),
                    $records[$i]['duration'] / $records[0]['duration'] * 100
                ));
            }
        }
    }

    private function loop(callable $case)
    {
        foreach(range(0, 100000) as $run) {
            $case();
        }
    }
} 