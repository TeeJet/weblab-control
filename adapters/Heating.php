<?php

namespace app\adapters;

use app\control\Device;

class Heating extends Device
{
    protected $class = \app\devices\Heating::class;
    protected $methodOn = "warmUp";
    protected $methodOff = "warmDown";
    protected $name = "Heating";
}