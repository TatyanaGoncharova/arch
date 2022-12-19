<?php

namespace App\Service;

use App\Contract\CommandInterface;
use Exception;

class Log implements CommandInterface
{

    private CommandInterface $command;
    private Exception $exception;

    public function __construct(CommandInterface $command, Exception $exception)
    {
        $this->command = $command;
        $this->exception = $exception;

    }

    public function execute(): void
    {
        echo get_class($this->command) . ' ' . get_class($this->exception);
    }

}