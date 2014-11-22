# phpbench

PHP Benchmark Tool

## Installation

```
composer update
```

### Usage

```
php phpbench run
```

### Example

Create a new class and save it into the ```Benchmarks``` folder. Add two methods each having ```using`` as prefix for the method's name. Place your code, which you want to bench mark into they methods. Run ```phpbench run```.

#### Benchmark

Question: Is type casting variables faster than using the corresponding function?
Answer: Yes, by ~50%.

```php
<?php

namespace Bench\Benchmarks;

class intvalVSintCasting
{
    public function usingIntval()
    {
        intval(2.3);
    }

    public function usingIntCasting()
    {
        (int) 2.3;
    }
}
