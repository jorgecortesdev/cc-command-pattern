<?php

declare(strict_types=1);

namespace App;

class MySwitch
{
    protected Command $onCommand;

    protected Command $offCommand;

    public function __construct(Command $onCommand, Command $offCommand)
    {
        $this->onCommand = $onCommand;
        $this->offCommand = $offCommand;
    }

    public function on(): void
    {
        $this->onCommand->execute();
    }

    public function off(): void
    {
        $this->offCommand->execute();
    }
}
