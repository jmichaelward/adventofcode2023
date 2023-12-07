<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023\Assignment\Two;

class Game
{
    public function __construct(
        public readonly int $red,
        public readonly int $green,
        public readonly int $blue,
    )
    {
    }

    public static function createFromData(string $rawData)
    {
        $processed = [
            'red' => 0,
            'green' => 0,
            'blue' => 0
        ];

        $rawValues = explode(', ', $rawData);

        foreach ($rawValues as $value) {
            [$quantity, $type] = explode(' ', $value);
            $processed[$type] = (int)$quantity;
        }

        return new Game($processed['red'], $processed['green'], $processed['blue']);
    }

    public function getRed(): int
    {
        return $this->red;
    }

    public function getGreen(): int
    {
        return $this->green;
    }

    public function getBlue(): int
    {
        return $this->blue;
    }
}
