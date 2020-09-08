<?php

namespace app\devices;

class Heating
{
    public function warmUp()
    {
        echo "Heating warmed up";
    }

    public function warmDown()
    {
        echo "Heating warmed down";
    }

    public function warmMax()
    {
        echo "Heating warmed max";
    }

    public function off()
    {
        echo "Heating off";
    }
}