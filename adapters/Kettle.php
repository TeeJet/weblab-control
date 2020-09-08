<?php


namespace app\adapters;


use app\control\Device;

class Kettle extends Device
{
    protected $class = \app\devices\Kettle::class;
    protected $methodOn = "on";
    protected $methodOff = "off";
    protected $name = "Kettle";
}