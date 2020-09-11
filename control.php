<?php

use app\control\Control;
use app\control\History;
use app\control\Map;
use app\control\Storage;

require_once 'autoload.php';

$control = Control::getInstance(new Storage(), new History());

$command = $_SERVER['argv'][1] ?? null;
try {
    switch ($command) {
        case "list":
            echo implode(PHP_EOL, Map::list());
            break;
        case "add":
            $position = $_SERVER['argv'][2] ?? null;
            $deviceName = $_SERVER['argv'][3] ?? null;
            $control->add($position, Map::getObject($deviceName));
            echo "Position #{$position} has been binded";
            break;
        case "state":
            $control->printCommands();
            break;
        case "press":
            $position = $_SERVER['argv'][2] ?? null;
            $action = $_SERVER['argv'][3] ?? null;
            $control->perform($position, $action);
            break;
        case "undo":
            $control->undo();
            break;
        default:
            echo "Available commands: " . PHP_EOL;
            echo str_pad("list", 30) . "displays a list of device names" . PHP_EOL;
            echo str_pad("state", 30) . "displays current state of the control" . PHP_EOL;
            echo str_pad("add <position> <device>", 30) . "binds a button to the device" . PHP_EOL;
            echo str_pad("press <position> <on|off>", 30) . "performs an action on the button" . PHP_EOL;
            echo str_pad("undo", 30) .  "cancels the last action";
            break;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
echo PHP_EOL;