<?php

//require_once 'transmissionManual.php';
//require_once 'transmissionAuto.php';

class Car
{
    //use transmissionManual;
    //use transmissionAuto;
    protected $Engine;
    public $model;

    public function __construct($model, $transmission, $hp)
    {
        $this->Engine = new Engine($transmission, $hp);
        $this->model = $model;
    }

    public function move($distance, $speed, $direction)
    {
        $this->Engine->startEngine();
        $this->Engine->setSpeed($direction, $speed);
        $this->Engine->maxSpeed($speed);
        $this->Engine->getCool($distance, $speed);
        $this->Engine->stopEngine();
    }
}
