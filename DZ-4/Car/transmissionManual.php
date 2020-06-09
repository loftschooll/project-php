<?php

trait transmissionManual
{
    function manual($direction, $speed) {
        if ($direction == 'forward') {
            echo "Движение вперед";
            if ( $speed > 0 && $speed <= 20 ) {
                echo "Включилась первая передача";
            } elseif ($speed > 20) {
                echo "Включилась вторая передача";
            } else {
                echo "Нейтральная передача";
            }
        } elseif ($direction == 'backward') {
            echo "Движение назад";
        }
    }
}