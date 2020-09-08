<?php

namespace app\control;

interface CommandInterface
{
    public function __construct(Device &$device);

    public function execute();

    public function undo();

    public function getMethod();

    public function getDeviceName();
}