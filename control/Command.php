<?php

namespace app\control;

use Exception;

class Command implements CommandInterface
{
    public $method;
    public $device;

    /** @var string $previous method */
    public $previous;

    public function __construct(Device &$device, $method)
    {
        $this->device = $device;
        $this->method = $method;
    }

    public function execute()
    {
        call_user_func([$this->device->baseObject, $this->method]);
        $this->device->state = $this->getState();
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
        if (empty($this->previous)) {
            throw new Exception("Can't undo to init state, because it is unknown");
        }
        $command = new Command($this->device, $this->previous);
        $command->execute();
        $this->device->state = $this->previous;
    }

    public function getState()
    {
        return $this->method;
    }

    public function getDeviceName()
    {
        return $this->device->getName();
    }
}