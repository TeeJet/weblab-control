<?php

namespace app\control;

interface StorageInterface
{
    public function add($position, $command);

    public function get($position): DeviceInterface;

    /**
     * @return DeviceInterface[]
     */
    public function all(): array ;
}