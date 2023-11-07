<?php

declare(strict_types=1);

namespace App;

class Lamp
{
    public function on(): void
    {
        dump('La lámpara está encendida');
    }

    public function off(): void
    {
        dump('La lámpara está apagada');
    }
}