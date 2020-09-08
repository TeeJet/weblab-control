<?php


namespace app\control;


use app\adapters\BathroomLight;
use app\adapters\Door;
use app\adapters\Garage;
use app\adapters\Heating;
use app\adapters\Jacuzzi;
use app\adapters\Jalousie;
use app\adapters\Kettle;
use DomainException;

class Map
{
    public static $devices = [
        "light" => BathroomLight::class,
        "door" => Door::class,
        "garage" => Garage::class,
        "heating" => Heating::class,
        "jacuzzi" => Jacuzzi::class,
        "jalousie" => Jalousie::class,
        "kettle" => Kettle::class,
    ];

    public static function list()
    {
        return array_keys(self::$devices);
    }
    
    public static function getObject($name)
    {
        if (empty($name)) {
            throw new DomainException("Parameter <device> is required");
        }
        if (!array_key_exists($name, self::$devices)) {
            throw new DomainException("Incorrect device: {$name}");
        }
        return new self::$devices[$name];
    }
}