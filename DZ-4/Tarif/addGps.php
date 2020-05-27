<?php

trait addGps
{
    function GPS($services)
    {
        if ($services == 'gps') {
            $result = 15;
        } else {
            $result = 0;
        }
        return $result;
    }
}
