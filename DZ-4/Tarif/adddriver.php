<?php

trait addDriver
{
    function Driver($services)
    {
        if ($services == 'add') {
            $result = 100;
        } else {
            $result = 0;
        }
        return $result;
    }
}
