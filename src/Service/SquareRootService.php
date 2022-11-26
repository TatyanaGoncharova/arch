<?php

namespace App\Service;

use App\DTO\SquareRootDTO;
use InvalidArgumentException;

class SquareRootService
{
    const E = 0.00001;

    /**
     * @param SquareRootDTO $squareRootDTO
     *
     * @return array|float[]|int[]
     */
    public function getRoots(SquareRootDTO $squareRootDTO): array
    {
        $a = $squareRootDTO->getValueA();
        $b = $squareRootDTO->getValueB();
        $c = $squareRootDTO->getValueC();

        if (
            (isset($a) && (abs($a) < self::E)) ||
            (isset($a) && is_nan($a)) ||
            (isset($b) && is_nan($b)) ||
            (isset($c) && is_nan($c)) ||
            (isset($a) && is_infinite($a)) ||
            (isset($b) && is_infinite($b)) ||
            (isset($c) && is_infinite($c))
        ) {
            throw new InvalidArgumentException('SquareRootService a - is not correct value');
        }

        $d = $b ** 2 - 4 * $a * $c;

        if ($d < -self::E) {
            return [];
        }

        if (abs($d) < self::E) {
            return [-$b / 2 * $a];
        }

        if ($d > self::E) {
            return [(-$b + sqrt($d)) / 2 * $a, (-$b - sqrt($d)) / 2 * $a];
        }

        return [];
    }
}