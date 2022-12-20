<?php

namespace App\Exception;

use App\Contract\CommandInterface;
use App\Service\Log;

class ExceptionHandler
{

    public function handle(CommandInterface $command, $exception): void
    {
        $commandClass = get_class($command);
        $exceptionClass = get_class($exception);
        $config = json_decode(file_get_contents('/app/src/Exception/Config/ExceptionConfig.json'), true);
        $handler = $config[$commandClass][$exceptionClass];
        if (!empty($handler)) {
            try {
                (new $handler($command, $exception))->execute();
            } catch (\Throwable $exception) {
                (new Log($command, $exception))->execute();
            }
        }
    }
}