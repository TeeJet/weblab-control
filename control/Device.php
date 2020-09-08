<?php

namespace app\control;

use Exception;

class Device implements DeviceInterface
{
    /** @var CommandInterface */
    public $state;

    protected $class;
    public $baseObject;

    protected $name;
    protected $methodOn;
    protected $methodOff;

    public function __construct()
    {
        $className = $this->class;
        $this->baseObject = new $className;
    }

    public function getName()
    {
        return $this->name;
    }

    /**
     * @return CommandInterface
     * @throws Exception
     */
    public function actionOn(): CommandInterface
    {
        $command = new Command($this);
        $command->method = $this->methodOn;
        return $this->executeCommand($command);
    }

    /**
     * @return CommandInterface
     * @throws Exception
     */
    public function actionOff(): CommandInterface
    {
        $command = new Command($this);
        $command->method = $this->methodOff;
        return $this->executeCommand($command);
    }

    /**
     * @param CommandInterface $command
     * @return CommandInterface
     * @throws Exception
     */
    public function executeCommand(CommandInterface $command)
    {
        $this->checkCommandIsDifferent($command);
        $command->backup();
        $command->execute();
        $this->state = $command;
        return $command;
    }

    /**
     * @param CommandInterface $command
     * @throws Exception
     */
    private function checkCommandIsDifferent(CommandInterface $command)
    {
        if (empty($this->state)) {
            return;
        }
        if ($this->state->getMethod() == $command->getMethod() && $this->state->getDeviceName() == $command->getDeviceName()) {
            throw new Exception("Attempt to change a state, that is already active");
        }
    }
}