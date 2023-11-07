<?php

declare(strict_types=1);

namespace App;

class Document
{
    public function open(): void
    {
        dump("El documento está abierto");
    }

    public function save(): void
    {
        dump("El documento se ha guardado");
    }

    public function close(): void
    {
        dump("El documento se ha cerrado");
    }
}