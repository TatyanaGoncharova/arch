<?php

namespace App\Service;

use App\Contract\CommandInterface;
use App\Exception\CustomException\CommandException;

class CheckFuelCommand implements CommandInterface
{

    private int $fuelValue;

    /**
     * @param int $fuelValue
     */
    public function __construct(int $fuelValue)
    {
        $this->fuelValue = $fuelValue;
    }

    /**
     * @return void
     * @throws CommandException
     */
    public function execute(): void
    {
        if ($this->fuelValue <= 0) {
            throw new CommandException('fuel is empty');
        }
    }
}