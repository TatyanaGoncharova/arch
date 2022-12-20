<?php

namespace App\Service;

use App\Contract\CommandInterface;
use App\Exception\CustomException\CommandException;

class MacroCommand implements CommandInterface
{
    private CheckFuelCommand $checkFuelCommand;
    private Move $move;
    private BurnFuelCommand $burnFuelCommand;

    public function __construct(
        CheckFuelCommand $checkFuelCommand,
        Move             $move,
        BurnFuelCommand  $burnFuelCommand)
    {
        $this->checkFuelCommand = $checkFuelCommand;
        $this->move = $move;
        $this->burnFuelCommand = $burnFuelCommand;
    }

    /**
     * @throws CommandException
     */
    public function execute(): void
    {
        $this->checkFuelCommand->execute();
        $this->move->execute();
        $this->burnFuelCommand->execute();
    }
}