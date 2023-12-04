<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023;

abstract class Assignment
{
    protected readonly string $input_path;

    abstract public function run(): void;
}
