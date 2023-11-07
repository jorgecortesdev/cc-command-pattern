<?php

declare(strict_types=1);

namespace App\Commands\Menu;

use App\Command;
use App\Document;

class CloseDocumentCommand implements Command
{
    protected Document $document;

    public function __construct(Document $document)
    {
        $this->document = $document;
    }

    public function execute(): void
    {
        $this->document->close();
    }
}