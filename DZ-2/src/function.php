<?php
//Задание 2.1

function task1($n1, $n2, $n3)
{
    $array = array("PHP", "MySQL", "GitHub");
    echo '<p>' . $array[0] . '</p>';
    echo '<p>' . $array[1] . '</p>';
    echo '<p>' . $array[2] . '</p>';
    if (isset($n2)) {
        echo "$n1 " . "$n2" . " $n3";
    }
    return array($n1, $n2, $n3);
}

//Задание 2.2
function task2($operator, $args)
{
    $res = 0;
    foreach ($args as $j => $element) {
        if (is_numeric($element)) {
            if ($j > 0) {
                switch ($operator) {
                    case ' + ':
                        $res += $element;
                        break;
                    case ' - ':
                        $res -= $element;
                        break;
                    case ' * ':
                        $res *= $element;
                        break;
                    case ' / ':
                        $res /= $element;
                        break;
                    default:
                        echo 'Выполнение функции невозможно, неверный аргумент мат.функции';
                        return;
                }
            } else {
                $res = $element;
            }
        } else {
            echo 'Выполнение функции невозможно, в массиве должны быть только числа';
            return;
        }
    }
    $expression = implode($operator, $args);
    echo $expression .'=' . $res;
    eval("\$expression = \"$expression\";");
}

//Задание 2.3
function task3($rows, $cols)
{
    $table = '<table border="1" width="250">';

    for ($tr = 1; $tr <= $rows; $tr++) {
        $table .= '<tr>';
        for ($td = 1; $td <= $cols; $td++) {
            if ($rows == $cols) {
                $table .= "<td width='20'>" .$tr * $td . "</td>\n";
            }
        }
        $table .= '</tr>';
    }
    $table .= '</table>';
    echo $table;
}

//Задание 2.4
function task4()
{
    $customDate = mktime();
    echo "Текущая дата: " .date("d.m.y H:i", $customDate);
    echo "<br/><br/>";
    $date = '24.02.2016';
    echo "Unixtime время: " .strtotime($date);
}

//Задание 2.5
function task5()
{
    $str = 'Карл у Клары украл Кораллы';
    $str2 = str_replace("К", " ", $str);
    echo "<br>" .$str2;

    $str_1 = 'Две бутылки лимонада';
    $str_2 = str_replace("Две", "Три", $str_1);
    echo "<br><br>" .$str_2 ."<br>";
}

//Задание 2.6
function task6($filename)
{
    $text = 'Hello again!';

    file_put_contents($filename, $text);
    echo file_get_contents('index.txt', $text);
}
