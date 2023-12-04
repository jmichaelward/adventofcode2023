<?php

namespace Assignment;

use JMichaelWard\AdventOfCode2023\Assignment\One;
use PHPUnit\Framework\TestCase;

class OneTest extends TestCase
{
    /**
     * @covers One::calculate_part_one
     */
    public function testPartOneSampleData()
    {
        $test_class = new One(TEST_DATA_ROOT . '/1-1.txt');

        self::assertSame(142, $test_class->calculate_part_one());
    }

    /**
     * @covers One::calculate_part_two
     */
    public function testPartTwoSampleData()
    {
        $test_class = new One(TEST_DATA_ROOT . '/1-2.txt');

        self::assertSame(281, $test_class->calculate_part_two());
    }

    public static function getSampleStrings(): array {
        return [
            ['sixrrmlkptmc18zhvninek', 69],
            ['jcb82eightwond', 88],
            ['twofourthree778nineeight', 28],
            ['sqpxs1cgcrmctlgqvzxbcjzgr', 11],
            ['nqkjxbmbpkz9eight8', 98],
            ['one6fourfiveqndtrvgkkgthppnine', 19],
            ['zbrbdpbfcfxcqq5oneninejfgqpkfn', 59],
            ['hvlstzgvmjfivefourqjqtxdjmbxfour4four2', 52],
            ['13dzbmbtl6', 16],
            ['fourone2pmlxzzbmnfxg2', 42],
            ['3fourrbvvlrsrbb2858', 38],
            ['vlz4six89', 49],
            ['75threeb', 73],
            ['fourp783fiveseventhree', 43],
            ['2gxvcbsmn6', 26],
            ['896', 86],
            ['dnblxtxxpstlsix56', 66],
            ['4fivecl185', 45],
            ['onefk8sdljtfv37zsxsxrv7qvrpnmd', 17],
            ['fourdvhzp7foursix', 46],
        ];
    }

    /**
     * @dataProvider getSampleStrings
     * @covers One::extractNumberFromString
     * @param string $string
     * @param int $expected_result
     * @return void
     */
    public function testParsedStringValues(string $string, int $expected_result)
    {
        $test_class = new One(TEST_DATA_ROOT . '/1-2-generated.txt', '/[0-9]|one|two|three|four|five|six|seven|eight|nine/');

        self::assertSame($expected_result, $test_class->extractNumberFromString($string));
    }

//    public function testPartTwoExtractedGeneratedData() {
//        $test_class = new One(TEST_DATA_ROOT . '/1-2-generated.txt');
//
//        self::assertSame(1933, $test_class->calculate_part_two());
//    }
}
