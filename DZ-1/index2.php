<?php
//Задание 1.2
define('CONST_FIGURE', '80');
define('CONST_FELT_PEN', '23');
define('CONST_PENCIL', '40');

$paints = CONST_FIGURE - CONST_FELT_PEN - CONST_PENCIL;

echo CONST_FIGURE . ' рисунков ' . ' - ' . CONST_FELT_PEN . ' фломастерами ' .' - ' . CONST_PENCIL . ' карандашами ' .' = '
    . $paints . ' красками ';
