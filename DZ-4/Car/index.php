<?php

error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once 'Car.php';
require_once 'Engine.php';

/*
use Car\transmissionAuto;
use Car\transmissionManual;

require_once 'Niva.php';
require_once 'Fan.php';


$car = new Car(new Engine(20), new transmissionAuto());
//$car = new Niva(new Engine(150), new transmissionAuto());

$car->startEngine();
$car->move(320, 1000, 'forward');
$car->stopEngine();*/


$bmw = new Car("BMW", "MT", 50);
$bmw->Move(300, 10, "fwd");
