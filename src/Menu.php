<?php

declare(strict_types=1);

namespace App;

class Menu
{
    protected Command $openCommand;
    protected Command $saveCommand;
    protected Command $closeCommand;

    public function __construct(Command $openCommand, Command $saveCommand, Command $closeCommand)
    {
        $this->openCommand = $openCommand;
        $this->saveCommand = $saveCommand;
        $this->closeCommand = $closeCommand;
    }

    public function open(): void
    {
        $this->openCommand->execute();
    }

    public function save(): void
    {
        $this->saveCommand->execute();
    }

    public function close(): void
    {
        $this->closeCommand->execute();
    }
}