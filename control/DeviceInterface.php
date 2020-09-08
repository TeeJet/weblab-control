<?php

namespace app\control;

interface DeviceInterface
{
    public function getName();

    public function actionOn(): CommandInterface;

    public function actionOff(): CommandInterface;
}