<?php

namespace App\Contract;

use App\ValueObject\Vector;

interface MovableInterface
{
    public function getPosition(): Vector;
    public function getVelocity(): Vector;
    public function setPosition(Vector $newV): void;
}