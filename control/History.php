<?php

namespace app\control;

use Exception;

class History implements HistoryInterface
{
    private $capacity = 8;

    /** @var CommandInterface[] */
    private $commands = [];

    public function add($command)
    {
        $this->commands[] = $command;
        if (count($this->commands) > $this->capacity) {
            array_shift($this->commands);
        }
    }

    /**
     * @return CommandInterface
     * @throws Exception
     */
    public function pop(): CommandInterface
    {
        if (empty($this->commands)) {
            throw new Exception("The history is empty");
        }
        return array_pop($this->commands);
    }
}