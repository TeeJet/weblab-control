<?php

namespace app\control;

interface CommandInterface
{
    public function execute();

    public function undo();

    public function getState();

    public function getDeviceName();
}