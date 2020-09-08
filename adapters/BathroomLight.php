<?php

namespace app\adapters;

use app\control\Device;

class BathroomLight extends Device
{
    protected $class = \app\devices\BathroomLight::class;
    protected $methodOn = "on";
    protected $methodOff = "off";
    protected $name = "Bathroom light";
}