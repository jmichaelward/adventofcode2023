<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class DayCommand extends Command
{
    protected function configure()
    {
        $this->setName('day');
        $this->setDescription('Select which Advent of Code 2023 day to execute.');
        $this->addArgument('number', InputArgument::REQUIRED, 'Which day to run?');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $dayNumber = $input->getArgument('number');
        $ds = DIRECTORY_SEPARATOR;
        $solutionPath = dirname(__DIR__) . $ds . 'solutions' . $ds . $dayNumber . $ds . 'index.php';

        if (!is_readable($solutionPath)) {
            $output->writeln("Could not locate day {$dayNumber} at {$solutionPath}");
            return self::FAILURE;
        }

        require_once $solutionPath;

        return self::SUCCESS;
    }
}
