<?php

class Fan
{
    const TEMPERATURE_DECREASE_STEP = 10;
    const STATE_ON = 'on';
    const STATE_OFF = 'off';

    private $state;
    private $engine;

    public function __construct(Engine $engine)
    {
        $this->state = self::STATE_OFF;
        $this->engine = $engine;
    }

    public function turnOn()
    {
        $this->state = self::STATE_ON;
        echo "Вентилятор включен";
        $this->engine->decreaseTemperature(self::TEMPERATURE_DECREASE_STEP);
    }

    public function turnOff()
    {
        $this->state = self::STATE_OFF;
        echo "Вентилятор выключен";
    }
}