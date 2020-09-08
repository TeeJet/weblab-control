<?php

namespace app\control;

use Exception;

class Command implements CommandInterface
{
    public $method;
    public $device;

    /** @var Command */
    public $previous;

    public function __construct(Device &$device)
    {
        $this->device = $device;
    }

    public function backup()
    {
        $this->previous = $this->device->state;
    }

    /**
     * @throws Exception
     */
    public function undo()
    {
        $this->previous->execute();
        $this->device->state = $this->previous;
    }

    public function execute()
    {
        call_user_func([$this->device->baseObject, $this->method]);
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function getDeviceName()
    {
        return $this->device->getName();
    }
}