<?php

namespace Bench\Benchmarks;

/**
 * Class explodeVsArraySlice
 *
 * Cutting a text after $limit words using $delimiter.
 */
class explodeVsArraySlice
{
    public function usingExplode()
    {
        $text = 'This is a test string, containing a lot of silly words';
        $limit = 3;
        $delimiter = ' ';

        $words = explode($delimiter, $text, $limit + 1);

        $partA = implode($delimiter, array_slice($words, 0, $limit));
        $partB = $words[$limit];
    }

    public function usingArraySlice()
    {
        $text = 'This is a test string, containing a lot of silly words';
        $limit = 3;
        $delimiter = ' ';

        $words = explode($delimiter, $text);

        $partA = implode($delimiter, array_slice($words, 0, $limit));
        $partB = implode($delimiter, array_slice($words, $limit));
    }
}
