<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023;

abstract class Assignment
{
    use FileInput;

    public function __construct(
        protected readonly string $input_path
    ) {}

    abstract public function run(): void;

    abstract public function getPartOneAnswer();

    abstract public function getPartTwoAnswer();
}
