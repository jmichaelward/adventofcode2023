<?php
declare(strict_types=1);

namespace JMichaelWard\AdventOfCode2023\Assignment\Two;

class Game
{
    public function __construct(
        public readonly int $red,
        public readonly int $green,
        public readonly int $blue,
    ) {
        if ($this->red > 12 || $this->green > 13 || $this->blue > 14) {
            throw new \InvalidArgumentException('Invalid game.');
        }
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
            $processed[$type] = (int) $quantity;
        }

        return new Game($processed['red'], $processed['green'], $processed['blue']);
    }
}
