<?php

namespace Bench\Benchmarks;

class crc32VsMd5VsSha1
{
    public function usingCrc32()
    {
        crc32('foobar');
    }

    public function usingMd5()
    {
        md5('foobar');
    }

    public function usingSha1()
    {
        sha1('foobar');
    }
}
