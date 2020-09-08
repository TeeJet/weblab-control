<?php

namespace app\adapters;

use app\control\Device;

class Jacuzzi extends Device
{
    protected $class = \app\devices\Jacuzzi::class;
    protected $methodOn = "turnOn";
    protected $methodOff = "turnOff";
    protected $name = "Jacuzzi";
}