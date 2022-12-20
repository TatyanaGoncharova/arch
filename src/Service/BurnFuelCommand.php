<?php

namespace App\Service;

use App\Contract\CommandInterface;

class BurnFuelCommand implements CommandInterface
{

    private int $currentFuelValue;
    private int $fuelRate;

    /**
     * @param int $currentFuelValue
     * @param int $fuelRate
     */
    public function __construct(int $currentFuelValue, int $fuelRate)
    {
        $this->currentFuelValue = $currentFuelValue;
        $this->fuelRate = $fuelRate;
    }

    /**
     * @return void
     */
    public function execute(): void
    {
        $this->currentFuelValue -= $this->fuelRate;
    }
}