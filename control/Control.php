<?php

namespace app\control;

use DomainException;

class Control
{
    private static $instance;

    /** @var StorageInterface */
    private $storage;

    /** @var HistoryInterface */
    private $history;

    protected function __construct() {}

    public function add($position, DeviceInterface $device)
    {
        $this->storage->add($position, $device);
    }

    public function printCommands()
    {
        foreach ($this->storage->all() as $position => $device) {
            echo $position . ". " . $device->getName() . PHP_EOL;
        }
    }

    public function undo()
    {
        $command = $this->history->pop();
        $command->undo();
    }

    public function perform($position, $type)
    {
        if ($type == "on") {
            $this->performOn($position);
        } elseif ($type == "off") {
            $this->performOff($position);
        } else {
            throw new DomainException("Incorrect action: {$type}");
        }
    }

    public function performOn($position)
    {
        $command = $this->storage->get($position)->actionOn();
        $this->history->add($command);
    }

    public function performOff($position)
    {
        $command = $this->storage->get($position)->actionOff();
        $this->history->add($command);
    }

    public static function getInstance(StorageInterface $storage, HistoryInterface $history)
    {
        if (!isset(self::$instance)) {
            if (file_exists('state')) {
                $file = file_get_contents('state');
                self::$instance = unserialize($file);
            } else {
                self::$instance = new static();
                self::$instance->storage = $storage;
                self::$instance->history = $history;
            }
        }
        return self::$instance;
    }

    public function __destruct()
    {
        file_put_contents('state', serialize($this));
    }
}