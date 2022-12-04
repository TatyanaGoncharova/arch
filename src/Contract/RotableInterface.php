<?php

namespace App\Contract;

interface RotableInterface
{
    public function getDirection(): int;
    public function getAngularVelocity(): int;
    public function setDirection(int $newV): void;
    public function getDirectionsNumber(): int;
}
