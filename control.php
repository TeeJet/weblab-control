<?php

use app\control\Control;
use app\control\History;
use app\control\Map;
use app\control\Storage;

require_once 'autoload.php';

$control = Control::getInstance(new Storage(), new History());
try {
    switch ($_SERVER['argv'][1]) {
        case "list":
            echo implode(PHP_EOL, Map::list());
            break;
        case "add":
            $position = $_SERVER['argv'][2];
            $control->add($position, Map::getObject($_SERVER['argv'][3]));
            echo "Position #{$position} has been binded";
            break;
        case "state":
            $control->printCommands();
            break;
        case "press":
            $control->perform($_SERVER['argv'][2], $_SERVER['argv'][3]);
            break;
        case "undo":
            $control->undo();
            break;
        default:
            echo "Available commands: " . PHP_EOL;
            echo str_pad("list", 30) . "shows list of device names" . PHP_EOL;
            echo str_pad("add <position> <device>", 30) . "binds a button on the control" . PHP_EOL;
            echo str_pad("state", 30) . "shows current statement of the control " . PHP_EOL;
            echo str_pad("press <position> <on|off>", 30) . "performs an action of a binded button" . PHP_EOL;
            echo str_pad("undo", 30) .  "cancels last action";
            break;
    }
} catch (Exception $e) {
    echo $e->getMessage();
}
echo PHP_EOL;