<?php

namespace App\Service;

use App\Contract\CommandInterface;

class Repeat
{

    private CommandInterface $command;

    public function __construct(CommandInterface $command)
    {
        $this->command = $command;
    }

    public function execute(): void
    {
        $this->command->execute();
    }
}