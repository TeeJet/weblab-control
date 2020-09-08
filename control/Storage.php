<?php

namespace app\control;

use DomainException;

class Storage implements StorageInterface
{
    private $capacity = 7;

    /** @var DeviceInterface[] */
    private $devices = [];

    public function add($position, $command)
    {
        if ($position < 1 || $position > $this->capacity) {
            throw new DomainException("Incorrect position #{$position}");
        }
        $this->devices[$position] = $command;
    }

    public function get($position): DeviceInterface
    {
        if ($position < 1 || $position > $this->capacity) {
            throw new DomainException("Incorrect position #{$position}");
        }
        if (!array_key_exists($position, $this->devices)) {
            throw new DomainException("Position #{$position} is empty");
        }
        return $this->devices[$position];
    }

    public function all(): array
    {
        return $this->devices;
    }
}