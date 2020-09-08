<?php

namespace app\adapters;

use app\control\Device;

class Door extends Device
{
    protected $class = \app\devices\Door::class;
    protected $methodOn = "open";
    protected $methodOff = "close";
    protected $name = "Door";
}