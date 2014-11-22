<?php

namespace Bench;

class BenchMark
{
    /**
     * @var array
     */
    private $results = [];

    public function run()
    {
        $testCases = new PhpFilterIterator(new TestCaseIterator());
        $timeTable = [];
        /** @var FileInfoDecorator $testCase */
        foreach ($testCases as $testCase) {
            $testCase = new FileInfoDecorator($testCase);
            $testClass = $testCase->createClass();

            foreach ($testCase->getMethods() as $method) {
                $startTime = microtime(true);
                $this->loop([$testClass, $method->getName()]);
                $timeTable[$testCase->getShortName()][] = [
                    'method' => substr($method->getName(), 5),
                    'duration' => microtime(true) - $startTime,
                ];
            }
        }
        foreach ($timeTable as $testCase => $records) {
            usort($records, function ($a, $b) {
                return ($a['duration'] <= $b['duration']) ? -1 : 1;
            });

            for ($i = 0; $i < count($records); $i++) {
                $this->results[] = sprintf(
                    '%s::%s %s %07.3fms | %.2f%%',
                    $testCase,
                    $records[$i]['method'],
                    str_repeat(' ', 50 - strlen($testCase . '::' . $records[$i]['method'])),
                    round($records[$i]['duration'] * 1000, 3),
                    $records[$i]['duration'] / $records[0]['duration'] * 100
                );
            }
        }
    }

    /**
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    private function loop(callable $testCase)
    {
        foreach (range(0, 100000) as $run) {
            $testCase();
        }
    }
}