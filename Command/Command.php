<?php
interface Command
{
    public function execute();
    public function undo();
}

class LightOnCommand implements Command
{
    private $light;

    public function __construct($light)
    {
        $this->light = $light;
    }

    public function execute()
    {
        $this->light->on();
    }

    public function undo()
    {
        $this->light->off();
    }
}
class LightOffCommand implements Command
{
    private $light;

    public function __construct($light)
    {
        $this->light = $light;
    }

    public function execute()
    {
        $this->light->off();
    }

    public function undo()
    {
        $this->light->on();
    }
}

class GarageDoorOpenCommand implements Command
{
    private $garageDoor;

    public function __construct($garageDoor)
    {
        $this->garageDoor = $garageDoor;
    }

    public function execute()
    {
        $this->garageDoor->up();
    }

    public function undo()
    {
        $this->garageDoor->down();
    }
}

class GarageDoorCloseCommand implements Command
{
    private $garageDoor;

    public function __construct($garageDoor)
    {
        $this->garageDoor = $garageDoor;
    }

    public function execute()
    {
        $this->garageDoor->down();
    }

    public function undo()
    {
        $this->garageDoor->up();
    }
}

class RemoteControl
{
    private $onCommands = array();
    private $offCommands = array();
    private $undoCommand = null;

    public function setCommand(int $slot, Command $onCommand, Command $offCommand)
    {
        $this->onCommands[$slot] = $onCommand;
        $this->offCommands[$slot] = $offCommand;
    }

    public function onButtonWasPushed(int $slot)
    {
        $this->onCommands[$slot]->execute();
        $this->undoCommand = $this->onCommands[$slot];
    }
    public function offButtonWasPushed(int $slot)
    {
        $this->offCommands[$slot]->execute();
        $this->undoCommand = $this->offCommands[$slot];
    }

    public function undoButtonWasPushed()
    {
        $this->undoCommand->undo();
    }


    public function toString()
    {
        print_r($this->onCommands);
        print_r($this->offCommands);
    }
}

class Light
{
    public function on()
    {
        echo 'Да будет свет!<br>';
    }

    public function off()
    {
        echo 'Ой темно!<br>';
    }
}

class GarageDoor
{
    public function up()
    {
        echo 'Двери открываются<br>';
    }

    public function down()
    {
        echo 'Двери закрываются<br>';
    }
}

class CeilingFan {
    public const HIGH = 3;
    public const MEDIUM = 2;
    public const LOW = 1;
    public const OFF = 0;
    public $location;
    public $speed;
 
    public function __construct(String $location) {
        $this->location = $location;
        $this->speed = self::OFF;
    }
  
    public function high() {
        $this->speed = self::HIGH;
        echo "$this->speed<br>";
        // Высокая скорость
    } 
 
    public function medium() {
        $this->speed = self::MEDIUM;
        echo "$this->speed<br>";
        // Средняя скорость 
    }
 
    public function low() {
        $this->speed = self::LOW;
        echo "$this->speed<br>";
        // Низкая скорость
    }
  
    public function off() {
        $this->speed = self::OFF;
        echo "$this->speed<br>";
        // Выключение вентилятора
    }
  
    public function getSpeed() {
        return $this->speed;
    }
}

abstract class CeilingFanCommand implements Command {
    protected $ceilingFan;
    protected $prevSpeed;
  
    public function __construct(CeilingFan $ceilingFan) {
        $this->ceilingFan = $ceilingFan;
    }
 
    public function execute(){}
 
    public function undo() {
        if ($this->prevSpeed == $this->ceilingFan::HIGH) {
            $this->ceilingFan->high();
        } else if ($this->prevSpeed == $this->ceilingFan::MEDIUM) {
            $this->ceilingFan->medium();
        } else if ($this->prevSpeed == $this->ceilingFan::LOW) {
            $this->ceilingFan->low();
        } else if ($this->prevSpeed == $this->ceilingFan::OFF) {
            $this->ceilingFan->off();
        }
    }
}
    
class CeilingFanHighCommand extends CeilingFanCommand {
    public function execute() {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->high();
    }
}

class CeilingFanMediumCommand extends CeilingFanCommand {
    public function execute() {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->medium();
    }
}

class CeilingFanLowCommand extends CeilingFanCommand {
    public function execute() {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->low();
    }
}

class CeilingFanOffCommand extends CeilingFanCommand {
    public function execute() {
        $this->prevSpeed = $this->ceilingFan->getSpeed();
        $this->ceilingFan->off();
    }
}


$remote = new RemoteControl;
//$light = new Light();
//$lightOn = new LightOnCommand($light);
//$lightOff = new LightOffCommand($light);
//$garageDoor = new GarageDoor();
//$garageOpen = new GarageDoorOpenCommand($garageDoor);
//$garageClose = new GarageDoorCloseCommand($garageDoor);
//
//$remote->setCommand(1, $lightOn, $lightOff);
//$remote->onButtonWasPushed(1);
//$remote->offButtonWasPushed(1);
//$remote->setCommand(2, $garageOpen, $garageClose);
//$remote->onButtonWasPushed(2);
//$remote->offButtonWasPushed(2);
//$remote->undoButtonWasPushed();

$ceilingFan = new CeilingFan("Living Room");
   
$ceilingFanMedium = new CeilingFanMediumCommand($ceilingFan);
$ceilingFanHigh = new CeilingFanHighCommand($ceilingFan);
$ceilingFanOff = new CeilingFanOffCommand($ceilingFan);
  
$remote->setCommand(0, $ceilingFanMedium, $ceilingFanOff);
$remote->setCommand(1, $ceilingFanHigh, $ceilingFanOff);
   
$remote->onButtonWasPushed(0);
$remote->offButtonWasPushed(0);
//var_dump($remote);
$remote->undoButtonWasPushed();
  
$remote->onButtonWasPushed(1);
//var_dump($remote);
$remote->undoButtonWasPushed();