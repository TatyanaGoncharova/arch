<?php

namespace App\Service;

use App\Contract\RotableInterface;

class Rotate
{
    private RotableInterface $rotate;

    public function __construct(RotableInterface $rotate)
    {
        $this->rotate = $rotate;
    }

    public function execute(): void
    {
        $this->rotate->setDirection(($this->rotate->getDirection() + $this->rotate->getAngularVelocity()) % $this->rotate->getDirectionsNumber());
    }
}
