<?php

$cars = array(
    "bmw" => array("model" => "X5", "speed" => "120", "doors" => "5", "year" => "2015"),
    "toyota" => array("model" => "RAV4", "speed" => "130", "doors" => "4", "year" => "2017"),
    "opel" => array("model" => "astra", "speed" => "140", "doors" => "3", "year" => "2010"));

foreach ($cars as $name => $characteristic) {
    echo "<br><br>CAR " . "$name:<br>";
    echo $characteristic['model'] ." " . $characteristic['speed'] ." " . $characteristic['doors'] ." " . $characteristic['year'];
}
