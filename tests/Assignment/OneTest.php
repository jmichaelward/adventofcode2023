<?php

namespace Assignment;

use JMichaelWard\AdventOfCode2023\Assignment\One;
use PHPUnit\Framework\TestCase;

class OneTest extends TestCase
{
    /**
     * @covers One::calculate_part_one
     */
    public function testPartOneSampleData() {
        $test_class = new One(TEST_DATA_ROOT . '/1-1.txt');

        self::assertSame(142, $test_class->calculate_part_one());
    }

    /**
     * @covers One::calculate_part_two
     */
    public function testPartTwoSampleData() {
        $test_class = new One(TEST_DATA_ROOT . '/1-2.txt');

        self::assertSame(281, $test_class->calculate_part_two());
    }
}
