<?php

declare(strict_types=1);

namespace Tests;

use App\Commands\Lamp\OffCommand;
use App\Commands\Lamp\OnCommand;
use App\Lamp;
use App\MySwitch;
use PHPUnit\Framework\TestCase;
use Symfony\Component\VarDumper\VarDumper;

class MySwitchTest extends TestCase
{
    protected function tearDown(): void
    {
        // Reset the handler after the test
        VarDumper::setHandler(null);
    }

    /** @test */
    public function it_can_control_the_lamp(): void
    {
        $myDump = '';

        // Set a custom handler to capture dump output
        VarDumper::setHandler(static function ($value) use (&$myDump) {
            return $myDump = $value;
        });

        $lamp = new Lamp();
        $onCommand = new OnCommand($lamp);
        $offCommand = new OffCommand($lamp);
        $switch = new MySwitch($onCommand, $offCommand);

        $switch->on();
        $this->assertEquals('La lámpara está encendida', $myDump);

        $switch->off();
        $this->assertEquals('La lámpara está apagada', $myDump);
    }
}
