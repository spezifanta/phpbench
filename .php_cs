<?php

use Symfony\CS\FixerInterface;

$finder = Symfony\CS\Finder\DefaultFinder::create()
    ->notName('LICENSE')
    ->notName('README.md')
    ->notName('.php_cs')
    ->notName('composer.*')
    ->notName('phpunit.xml*')
    ->notName('*.phar')
    ->notName('*.yml')
    ->exclude('vendor')
    ->in(__DIR__)
;

# https://github.com/fabpot/PHP-CS-Fixer
return Symfony\CS\Config\Config::create()
	->fixers([
		'indentation',
		'linefeed',
		'trailing_spaces',
		'unused_use',
		'return',
		'visibility',
		'php_closing_tag',
		'braces',
		'extra_empty_lines',
		'function_declaration',
		'include',
		'controls_spaces',
		'elseif',
		'eof_ending'
	])
    ->finder($finder)
;

