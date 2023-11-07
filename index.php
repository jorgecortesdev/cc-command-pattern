<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use App\Commands\Lamp\OffCommand;
use App\Commands\Lamp\OnCommand;
use App\Commands\Menu\CloseDocumentCommand;
use App\Commands\Menu\OpenDocumentCommand;
use App\Commands\Menu\SaveDocumentCommand;
use App\Document;
use App\Lamp;
use App\Menu;
use App\MySwitch;

// Ejemplo de la lámpara
$lamp = new Lamp();

$onCommand = new OnCommand($lamp);
$offCommand = new OffCommand($lamp);

$switch = new MySwitch($onCommand, $offCommand);

$switch->on();
$switch->off();

// Ejemplo del documento
$document = new Document();

$openCommand = new OpenDocumentCommand($document);
$saveCommand = new SaveDocumentCommand($document);
$closeCommand =new CloseDocumentCommand($document);

$menu = new Menu($openCommand, $saveCommand, $closeCommand);

$menu->open();
$menu->save();
$menu->close();