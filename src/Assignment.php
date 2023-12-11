<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023;

abstract class Assignment
{
    use FileInput;

    public function __construct(
        protected readonly string $input_path
    ) {}

    public function run(): void
    {
        echo 'Answers for ' . get_called_class() . PHP_EOL;

        echo "Part 1: {$this->getPartOneAnswer()}" . PHP_EOL;
        echo "Part 2: {$this->getPartTwoAnswer()}" . PHP_EOL;
    }


    abstract public function getPartOneAnswer();

    abstract public function getPartTwoAnswer();
}
