<?php

trait transmissionAuto
{
    function Auto($direction)
    {
        if ($direction == 'forward') {
            echo "Движение вперед";
        } elseif ($direction == 'backward') {
            echo "Движение назад";
        }
    }
}