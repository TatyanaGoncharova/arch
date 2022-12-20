<?php

namespace App\Contract;

interface CommandInterface
{
    public function execute(): void;
}