<?php

declare(strict_types=1);

namespace Tests;

use App\Commands\Menu\CloseDocumentCommand;
use App\Commands\Menu\OpenDocumentCommand;
use App\Commands\Menu\SaveDocumentCommand;
use App\Document;
use App\Menu;
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\VarDumper;

class MenuTest extends TestCase
{
    protected function tearDown(): void
    {
        // Reset the handler after the test
        VarDumper::setHandler(null);
    }

    /** @test */
    public function it_can_control_the_document(): void
    {
        $myDump = '';

        // Set a custom handler to capture dump output
        VarDumper::setHandler(static function ($value) use (&$myDump) {
            return $myDump = $value;
        });

        $document = new Document();

        $openCommand = new OpenDocumentCommand($document);
        $saveCommand = new SaveDocumentCommand($document);
        $closeCommand = new CloseDocumentCommand($document);

        $menu = new Menu($openCommand, $saveCommand, $closeCommand);

        $menu->open();
        $this->assertEquals('El documento está abierto', $myDump);

        $menu->save();
        $this->assertEquals('El documento se ha guardado', $myDump);

        $menu->close();
        $this->assertEquals('El documento se ha cerrado', $myDump);
    }
}
