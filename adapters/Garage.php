<?php


namespace app\adapters;


use app\control\Device;

class Garage extends Device
{
    protected $class = \app\devices\Garage::class;
    protected $methodOn = "open";
    protected $methodOff = "close";
    protected $name = "Garage";
}