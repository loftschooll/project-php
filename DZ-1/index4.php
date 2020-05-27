<?php

$day = rand(0, 10);

switch ($day) {
    case 0:
        echo "Недопустимое значение";
        break;
    case ($day <= 5):
        echo "Это рабочий день";
        break;
    case ($day <= 7):
        echo "Это выходной день";
        break;
    default:
        echo "Неизвестный день";
        break;
}
