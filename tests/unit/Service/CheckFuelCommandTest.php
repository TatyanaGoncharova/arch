<?php

namespace UnitTests\Service;

use App\Exception\CustomException\CommandException;
use App\Service\CheckFuelCommand;

class CheckFuelCommandTest
{
    /**
     * @throws CommandException
     */
    public function testExceptionFuel(): void
    {
        $this->expectException('CommandException');
        $checkFuelCommand = new CheckFuelCommand(0);
        $checkFuelCommand->execute();
    }
}