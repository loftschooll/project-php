<?php

class dailyTarif
{
    const PRICE_PER_ONE_KM = 1; //рубль
    const PRICE_PER_DAILY = 1000; //цена за сутки
    use addGps;
    use addDriver;

    public function calc($distance, $time, $age, $services = [])
    {
        if ($age < 18 || $age > 65) {
            echo 'Расчет невозможен. Либо Вы молоды для вождения, либо уже на пенсии';
            return null;
        }
        //переводим часы в минуты
        $daily = $this->calcDaily($time); //сутки
        $hours = $this->calcHours($time); //часы
        $ageRatio = $this->calcAgeRatio($age);
        $gps = $this->GPS($services);
        $add = $this->Driver($services);
        //формула расчета цены
        $total_price = (($distance * self::PRICE_PER_ONE_KM) + ($daily * self::PRICE_PER_DAILY) + ($hours * $gps) + $add) * $ageRatio;
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

    private function calcDaily($time)
    {
        $result = $time / 24;
        return ceil($result);
    }
    private function calcHours($time)
    {
        return $time;
    }
}
