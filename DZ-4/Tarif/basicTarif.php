<?php

include 'addGps.php';

class basicTarif
{
    const PRICE_PER_ONE_KM = 10;
    const PRICE_PER_ONE_MINUTE = 3;
    use addGps;

    public function calc($distance, $time, $age, $services = [])
    {
        if ($age < 18 || $age > 65) {
            echo 'Расчет невозможен. Либо Вы молоды для вождения, либо уже на пенсии';
            return null;
        }
        //переводим часы в минуты
        $minutes = $this->calcMinutes($time); //минуты
        $hours = $this->calcHours($time); //часы gps
        $ageRatio = $this->calcAgeRatio($age);
        $gps = $this->GPS($services);
        //формула расчета цены
        $total_price = (($distance * self::PRICE_PER_ONE_KM) + ($minutes * self::PRICE_PER_ONE_MINUTE) + ($hours * $gps)) * $ageRatio;
        return $total_price;
    }

    private function calcAgeRatio($age)
    {
        if ($age >= 18 && $age <= 21) {
            $result = 1.1;
        } else {
            $result = 1;
        }
        return $result;
    }

    private function calcMinutes($time)
    {
        return $time;
    }
    private function calcHours($time)
    {
        return $time / 60;
    }
}
