<?php

namespace App\Service;

use App\ValueObject\Vector;

class VectorService
{
    /**
     * @param Vector $x
     * @param Vector $y
     *
     * @return Vector
     */
    public function plus(Vector $x, Vector $y): Vector
    {
        return new Vector(
            $x->getX() + $y->getX(),
            $x->getY() + $y->getY()
        );
    }
}