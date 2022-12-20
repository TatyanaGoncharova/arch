<?php

namespace App\Repository;

use App\Contract\MovableInterface;
use App\ValueObject\Vector;

class Move implements MovableInterface
{

    private Vector $position;
    private Vector $velocity;

    public function __construct(Vector $velocity)
    {
        $this->velocity = $velocity;
    }

    public function getPosition(): Vector
    {
        return $this->position;
    }

    public function getVelocity(): Vector
    {
        return $this->velocity;
    }

    public function setPosition(Vector $newV): void
    {
        $this->position = $newV;
    }
}