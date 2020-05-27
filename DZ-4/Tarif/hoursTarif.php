<?php

include 'adddriver.php';

class hoursTarif
{
    const PRICE_PER_ONE_KM = 0;
    const PRICE_PER_SIX_MINUTE = 200;  //рублей
    use addGps;
    use addDriver;

    public function calc($distance, $time, $age, $services = [])
    {
        if ($age < 18 || $age > 65) {
            echo "Расчет остановлен. Либо вам еще молодой для вождения авто, либо вы пенсионер";
            return null;
        }
        //переводим часы в минуты
        $minutes = $this->calcMinutes($time);
        $ageRatio = $this->calcAgeRatio($age);
        $gps = $this->GPS($services);
        $add = $this->Driver($services);
        //формула расчета цены
        $total_price = (($distance * self::PRICE_PER_ONE_KM) + ($minutes * self::PRICE_PER_SIX_MINUTE) + ($minutes * $gps) + $add) * $ageRatio;
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
        $result = $time / 60;
        return ceil($result);
    }
}
