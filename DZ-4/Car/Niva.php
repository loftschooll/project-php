<?php

require_once 'transmissionManual.php';
require_once 'transmissionAuto.php';

class Niva
{
    use transmissionAuto;
    use transmissionManual;

    public function move($distance, $speed, $direction)
    {

    }
}