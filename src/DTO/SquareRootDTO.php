<?php

namespace App\DTO;

class SquareRootDTO
{
    private ?float $a;
    private ?float $b;
    private ?float $c;

    public function __construct(?float $a, ?float $b, ?float $c)
    {
        $this->setValueA($a)->setValueB($b)->setValueC($c);
    }

    public function setValueA(?float $a): SquareRootDTO
    {
        $this->a = $a;
        return $this;
    }

    public function setValueB(?float $b): SquareRootDTO
    {
        $this->b = $b;
        return $this;
    }

    public function setValueC(?float $c): SquareRootDTO
    {
        $this->c = $c;
        return $this;
    }

    public function getValueA(): ?float
    {
        return $this->a;
    }

    public function getValueB(): ?float
    {
        return $this->b;
    }

    public function getValueC(): ?float
    {
        return $this->c;
    }
}
