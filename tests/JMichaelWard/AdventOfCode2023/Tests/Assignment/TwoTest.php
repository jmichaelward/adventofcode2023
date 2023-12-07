<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023\Tests\Assignment;

use JMichaelWard\AdventOfCode2023\Assignment\Two;
use PHPUnit\Framework\TestCase;

class TwoTest extends TestCase
{
    private function getDefaultTestInstance(): Two
    {
        return new Two(TEST_DATA_ROOT . '/2-1.txt');
    }

    /**
     * @covers \JMichaelWard\AdventOfCode2023\Assignment\Two::getGameId
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
     * @covers \JMichaelWard\AdventOfCode2023\Assignment\Two::getPossibleGameId
     */
    public function testGameIdIsNotPossibleWithInvalidData()
    {
        $test_class = $this->getDefaultTestInstance();
        $method = new \ReflectionMethod($test_class, 'getPossibleGameId');

        self::assertSame(0, $method->invoke($test_class, 'Game 3: 8 green, 6 blue, 20 red; 5 blue, 4 red, 13 green; 5 green, 1 red'));
    }

    /**
     * @covers Two::getPartOneAnswer
     */
    public function testPartOneExample()
    {
        $test_class = $this->getDefaultTestInstance();
        $method = new \ReflectionMethod($test_class, 'getPartOneAnswer');

        self::assertSame(8, $method->invoke($test_class));
    }
}
