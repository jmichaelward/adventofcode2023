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
     * @covers \JMichaelWard\AdventOfCode2023\Assignment\Two::getPossibleGameId
     */
    public function testPossibleGamesInExampleOneMatchAnswer()
    {
        $test_class = $this->getDefaultTestInstance();
        $method = new \ReflectionMethod($test_class, 'getPossibleGameId');
        $method->setAccessible(true);

        $this->assertSame(1, $method->invoke($test_class, 'Game 1: 3 blue, 4 red; 1 red, 2 green, 6 blue; 2 green'));
    }
}
