<?php

declare(strict_types=1);

namespace App\Commands\Lamp;

use App\Command;
use App\Lamp;

class OnCommand implements Command
{
    protected Lamp $lamp;

    public function __construct(Lamp $lamp)
    {
        $this->lamp = $lamp;
    }

    public function execute(): void
    {
        $this->lamp->on();
    }
}