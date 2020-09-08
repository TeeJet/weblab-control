<?php

namespace app\control;

interface CommandInterface
{
    public function execute();

    public function undo();

    public function getMethod();

    public function getDeviceName();
}