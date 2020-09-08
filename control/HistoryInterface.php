<?php


namespace app\control;


interface HistoryInterface
{
    public function add($command);

    public function pop(): CommandInterface;
}