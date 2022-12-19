<?php

namespace App\Service;

use App\Contract\CommandInterface;
use App\Contract\MovableInterface;
use InvalidArgumentException;
use RuntimeException;


class Move implements CommandInterface
{
    /**
     * @var MovableInterface
     */
    private MovableInterface $move;

    /**
     * @var VectorService
     */
    private VectorService $vector;

    /**
     * @param MovableInterface $move
     */
    public function __construct(MovableInterface $move)
    {
        $this->move = $move;
        $this->vector = new VectorService();
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $this->move->setPosition($this->vector->plus($this->move->getPosition(), $this->move->getVelocity()));
    }
}
