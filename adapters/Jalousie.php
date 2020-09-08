<?php


namespace app\adapters;


use app\control\Device;

class Jalousie extends Device
{
    protected $class = \app\devices\Jalousie::class;
    protected $methodOn = "up";
    protected $methodOff = "down";
    protected $name = "Jalousie";
}