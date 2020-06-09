<?php

class Engine
{
    const TEMPERATURE_INCREASE_STEP = 5;
    const TEMPERATURE_INCREASE_THRESHOLD = 10;
    const FAN_START_TEMPERATURE_THRESHOLD = 90;
    const START_STARTER = "on";
    const STOP_STARTER = "off";
    private $state = "on";
    private $hp = 1;
    private $temperature = 0;
    private $mileage = 0;
    private $fan;
    protected $transmission;

    public function __construct($transmission, $hp)
    {
        $this->transmission = $transmission;
        $this->hp = $hp;
    }
    public function getTransmission() {
        return $this->transmission;
    }
    public function startEngine()
    {
        if($this->state === self::START_STARTER){
            $this->state = self::START_STARTER;
            echo "Двигатель включен</br>";
        }
    }
    public function stopEngine()
    {
        if($this->state === self::START_STARTER){
            $this->state = self::STOP_STARTER;
            echo "Двигатель заглушен";
        }
    }
    public function maxSpeed($speed) {
        $max = $this->hp * 2;
        if ($speed > $max) {
            return $max;
        } else {
            return $speed;
        }
    }
    public function getCool($distance, $speed) {
        for ( $done = 0; $done <= $distance; $done += $this->maxSpeed($speed) ) {
            if ($done == 0) {
                echo "Начинаем движение!\n";
                continue;
            }
            $this->temperature += $speed / 10 * 5;
            if ($this->temperature >= 90) {
                $this->temperature -= 10;
                echo "Включается вентилятор!\n";
            }
            echo "</br>Скорость $done км/ч. Температура двигателя $this->temperature C.\n</br>";
        }
    }
    public function setSpeed($direction, $speed)
    {
        switch ($direction) {
            case 'fwd':
                echo "Движемся вперед\n</br>";
                break;
            case 'bck':
                echo "Движемся назад\n</br>";
                break;
        }
        if ($this->getTransmission() == 'MT') {
            switch ($speed) {
                case $speed <= 20:
                    echo "Включена первая передача\n";
                    break;
                case $speed > 20:
                    echo "Включена вторая передача\n";
                    break;
            }
        }
    }
}
/*
class Engine
{
    const TEMPERATURE_INCREASE_STEP = 5;
    const TEMPERATURE_INCREASE_THRESHOLD = 10;
    const FAN_START_TEMPERATURE_THRESHOLD = 90;
    const START_STARTER = "on";
    const STOP_STARTER = "off";
    private $state = "on";
    private $hp = 1;
    private $temperature = 0;
    private $mileage = 0;
    private $fan;

    public function __construct($hp)
    {
        $this->hp = $hp;
        $this->fan = new Fan($this);
    }

    public function accelerate()
    {
        $this->mileage++;
        $passedTenMeters = ($this->mileage % self::TEMPERATURE_INCREASE_THRESHOLD === 0);

        if ($passedTenMeters) {
            $this->temperature += self::TEMPERATURE_INCREASE_STEP;
            echo "Температура двигателя повысилась на " .self::TEMPERATURE_INCREASE_STEP;
            echo "Текущая температура двигателя {$this->temperature} C";
        }
        if ($this->temperature === self::FAN_START_TEMPERATURE_THRESHOLD) {
            $this->fan->turnOn();
            $this->fan->turnOff();
            echo "Текущая температура двигателя: {$this->temperature} C";
        }
    }

    public function getHp()
    {
        return $this->hp;
    }

    public function decreaseTemperature($step)
    {
        if ($this->temperature >= $step) {
            $this->temperature = $this->temperature - $step;
            echo "Температура двигателя снижена на {$step} C";
        }
    }

    public function getMileage()
    {
        return $this->mileage;
    }

    public function getGear($direction)
    {
        if ($direction == 'forward') {
            echo "Движение вперед";
        } elseif ($direction == 'backward') {
            echo "Движение назад";
        }
    }
}*/