<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023\Tests\Assignment;

use JMichaelWard\AdventOfCode2023\Assignment\Day2;
use PHPUnit\Framework\TestCase;

class Day2Test extends TestCase
{
    private function getDefaultTestInstance(): Day2
    {
        return new Day2(TEST_DATA_ROOT . '/2-1.txt');
    }

    /**
     * @covers \JMichaelWard\AdventOfCode2023\Assignment\Day2::getGameId
     */
    public function testGameIdIsReturnedFromString()
    {
        $test_class = $this->getDefaultTestInstance();
        $method = new \ReflectionMethod($test_class, 'getGameId');

        self::assertSame(1, $method->invoke($test_class, 'Game 1'));

        self::expectException(\Exception::class);

        $method->invoke($test_class, 'Invalid text format.');
    }

    /**
     * @covers \JMichaelWard\AdventOfCode2023\Assignment\Day2::getPossibleGameId
     */
    public function testGameIdIsNotPossibleWithInvalidData()
    {
        $test_class = $this->getDefaultTestInstance();
        $method = new \ReflectionMethod($test_class, 'getPossibleGameId');

        self::assertSame(0, $method->invoke($test_class, 'Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red'));
    }

    /**
     * @covers Day2::getPartOneAnswer
     */
    public function testPartOneExampleAnswer()
    {
        $test_class = $this->getDefaultTestInstance();
        $method = new \ReflectionMethod($test_class, 'getPartOneAnswer');

        self::assertSame(8, $method->invoke($test_class));
    }

    /**
     * @covers Day2::getGamePower
     */
    public function testGetGamePowerExample()
    {
        $test_class = $this->getDefaultTestInstance();
        $method = new \ReflectionMethod($test_class, 'getGamePower');

        self::assertSame(48, $method->invoke($test_class, 'Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green'));
    }

    /**
     * @covers Day2::getPartTwoAnswer
     */
    public function testGetGamePowerSumExample()
    {
        $test_class = $this->getDefaultTestInstance();
        $method = new \ReflectionMethod($test_class, 'getPartTwoAnswer');

        self::assertSame(2286, $method->invoke($test_class));
    }
}
