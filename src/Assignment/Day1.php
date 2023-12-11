<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023\Assignment;

use JMichaelWard\AdventOfCode2023\Assignment;
use Generator;
use JMichaelWard\AdventOfCode2023\FileInput;
use Throwable;

class Day1 extends Assignment
{
    use FileInput;

    public function __construct(
        protected readonly string $input_path,
        private string            $expression = '',
    ) {}

    public function extractNumberFromString(string $line): int
    {
        preg_match_all($this->expression, $line, $matches);

        $numbers = array_values(array_filter($matches[1] ?? $matches[0]));

        if (empty($numbers)) {
            return 0;
        }

        $firstNumber = $this->getNumericString($numbers[0]);
        $secondNumber = $this->getNumericString(array_pop($numbers));

        return (int)"{$firstNumber}{$secondNumber}";
    }

    private function getNumericString(int|string $number): int
    {
        if (is_numeric($number)) {
            return (int)$number;
        }

        return match (strtolower($number)) {
            'zero' => 0,
            'one' => 1,
            'two' => 2,
            'three' => 3,
            'four' => 4,
            'five' => 5,
            'six' => 6,
            'seven' => 7,
            'eight' => 8,
            'nine' => 9,
        };
    }

    /**
     * @see https://adventofcode.com/2023/day/1
     *
     * --- Day 1: Trebuchet?! ---
     *
     * Something is wrong with global snow production, and you've been selected to take a look. The Elves have even given
     * you a map; on it, they've used stars to mark the top fifty locations that are likely to be having problems.
     *
     * You've been doing this long enough to know that to restore snow operations, you need to check all fifty stars by
     * December 25th.
     *
     * Collect stars by solving puzzles. Two puzzles will be made available on each day in the Advent calendar; the second
     * puzzle is unlocked when you complete the first. Each puzzle grants one star. Good luck!
     *
     * You try to ask why they can't just use a weather machine ("not powerful enough") and where they're even sending you
     * ("the sky") and why your map looks mostly blank ("you sure ask a lot of questions") and hang on did you just say the
     * sky ("of course, where do you think snow comes from") when you realize that the Elves are already loading you into a
     * trebuchet ("please hold still, we need to strap you in").
     *
     * As they're making the final adjustments, they discover that their calibration document (your puzzle input) has been
     * amended by a very young Elf who was apparently just excited to show off her art skills. Consequently, the Elves are
     * having trouble reading the values on the document.
     *
     * The newly-improved calibration document consists of lines of text; each line originally contained a specific
     * calibration value that the Elves now need to recover. On each line, the calibration value can be found by combining
     * the first digit and the last digit (in that order) to form a single two-digit number.
     *
     * For example:
     *
     * 1abc2
     * pqr3stu8vwx
     * a1b2c3d4e5f
     * treb7uchet
     *
     * In this example, the calibration values of these four lines are 12, 38, 15, and 77. Adding these together produces 142.
     *
     * Consider your entire calibration document. What is the sum of all of the calibration values?
     */
    public function calculate_part_one(): int
    {
        $this->expression = '/[0-9]/';

        $this->setFileHandler();

        $sum = $this->calculate_sum();

        $this->unsetFileHandler();;

        return $sum;
    }

    /**
     * --- Part Two ---
     *
     * Your calculation isn't quite right. It looks like some of the digits are actually spelled out with letters: one, two, three, four, five, six, seven, eight, and nine also count as valid "digits".
     *
     * Equipped with this new information, you now need to find the real first and last digit on each line. For example:
     *
     * two1nine
     * eightwothree
     * abcone2threexyz
     * xtwone3four
     * 4nineeightseven2
     * zoneight234
     * 7pqrstsixteen
     *
     * In this example, the calibration values are 29, 83, 13, 24, 42, 14, and 76. Adding these together produces 281.
     *
     * What is the sum of all of the calibration values?
     */
    public function calculate_part_two(): int
    {
        $this->expression = '/(?=([0-9]|one|two|three|four|five|six|seven|eight|nine))/';

        $this->setFileHandler();

        $sum = $this->calculate_sum();

        $this->unsetFileHandler();

        return $sum;
    }

    /**
     * Calculate the sum of the numbers from the generated file.
     *
     * @return int
     */
    private function calculate_sum(): int
    {
        $sum = 0;

        foreach ($this->readFileLines($this->file_handle) as $line) {
            $sum += $this->extractNumberFromString($line);
        }

        return $sum;
    }

    /**
     * Run the assignments and output the results.
     *
     * @return void
     */
    public function run(): void
    {
        echo "Question 1 answer: {$this->calculate_part_one()}" . PHP_EOL;
        echo "Question 2 answer: {$this->calculate_part_two()}" . PHP_EOL;
    }
}