<?php

namespace JMichaelWard\AdventOfCode2023\Tests\Assignment;

use JMichaelWard\AdventOfCode2023\Assignment\Day1;
use PHPUnit\Framework\TestCase;

class Day1Test extends TestCase
{
    /**
     * @covers Day1::getPartOneAnswer
     */
    public function testPartOneSampleData()
    {
        $test_class = new Day1(TEST_DATA_ROOT . '/1-1.txt');

        self::assertSame(142, $test_class->getPartOneAnswer());
    }

    /**
     * @covers Day1::getPartTwoAnswer
     */
    public function testPartTwoSampleData()
    {
        $test_class = new Day1(TEST_DATA_ROOT . '/1-2.txt');

        self::assertSame(281, $test_class->getPartTwoAnswer());
    }

    public static function getSampleStrings(): array {
        return [
            ['sixrrmlkptmc18zhvninek', 69],
            ['jcb82eightwond', 82],
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
            ['seventwonineseven27jbrqpxfx8', 78],
            ['1threenine241gnrdfqn5', 15],
            ['sixnrsqdgmkvs7sevenkgjgtglmdq9dkdzsdqmq2nptbxnxghm', 62],
            ['llbkdcpxkg1tnmnmrbskpdb', 11],
            ['zb7nvjz1eighttwo6nine', 79],
            ['5threeeightwor', 52],
            ['tgjmdbr4sixone5', 45],
            ['4twoseven7tjmklbl', 47],
            ['lt2vqgbkzjpcjzeight3frfzqgbhvlx4', 24],
            ['4sixseven3xbmsfxrrvv2st5', 45],
            ['gqlp7', 77],
            ['h137four', 14],
            ['3three7three7', 37],
            ['nine9sjlzcpjvhcnbhbthz4oneb8kfb', 98],
            ['jlrjz5two', 52],
            ['sixthreeeightsgnjnmffq3', 63],
            ['sixone87onepclf3', 63],
            ['two4six', 26],
            ['5dsnxrcfxb4', 54],
            ['fiveninesix4', 54],
            ['eightwo', 82]
        ];
    }

    /**
     * @dataProvider getSampleStrings
     * @covers Day1::extractNumberFromString
     * @param string $string
     * @param int $expected_result
     * @return void
     */
    public function testParsedStringValues(string $string, int $expected_result)
    {
        $test_class = new Day1(TEST_DATA_ROOT . '/1-2-generated.txt', '/(?=([0-9]|one|two|three|four|five|six|seven|eight|nine))/');

        self::assertSame($expected_result, $test_class->extractNumberFromString($string));
    }

    /**
     * @covers Day1::getPartTwoAnswer
     */
    public function testPartTwoExtractedGeneratedData() {
        $test_class = new Day1(TEST_DATA_ROOT . '/1-2-generated.txt');

        self::assertSame(1961, $test_class->getPartTwoAnswer());
    }
}
