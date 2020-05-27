<?php
//Задание 3.1
function task1($xml)
{
    echo '-------------------------#Задание 1---------------------------------<br/><br/>';
    echo 'Номер заказа - ' . $xml['PurchaseOrderNumber'] . '<br>';
    echo 'Дата заказа - ' . $xml['OrderDate'] . '<br>';
    echo '<pre>';
    echo '</pre>';
    echo '<br/>';

    foreach ($xml->Address as $items) {
        echo 'Имя заказчика - ' . $items->Name . '<br/>';
        echo 'Дом/Улица - ' . $items->Street . '<br/>';
        echo 'Город - ' . $items->City . '<br/>';
        echo 'Штат - ' . $items->State . '<br/><br/>';
    }
    echo 'Пометки - ' . $xml->DeliveryNotes[0] . '<br/>';

    foreach ($xml->Items->Item as $item) {
        echo '<br/>';
        echo 'Номер партии - ' . $item['PartNumber'] . '<br/>';
        echo 'Наименование - ' . $item->ProductName . '<br/>';
        echo 'Количество - ' . $item->Quantity . '<br/>';
        echo 'Цена - ' . $item->USPrice . '<br/>';
        echo 'Дата доставки - ' . $item->ShipDate . '<br/>';
    }
}

//Задание 3.2
function task2()
{
    echo '<br/><br/>-------------------------#Задание 2---------------------------------<br/><br/>';
    //Создается массив. Преобразуется в JSON.
    $product = array(
        "productName" => "Car",
        "productModel" => "BMW",
        "component" => array(
            array(
                "productID" => 22,
                "color" => "red",
                "quantity" => 1
            ),
            array(
                "productID" => 3,
                "color" => "green",
                "quantity" => 4
            )
        ),
        "availability" => true
    );
    $json_text = json_encode($product);

    $file = fopen('output.json', 'w');
    file_put_contents('output.json', $json_text);

    fclose($file);

    //Открыть файл output.json. Используется функция rand().
    $change = rand(0, 1);
    if ($change == 1) {
        $oldName = 'Old name';
        $name = 'New name';
        $oldName = trim($oldName);
        $newName = trim($name);
        $fl = file_get_contents('output.json');
        $taskList = json_decode($fl, true);
        foreach ($taskList as $key => $value) {
            if ($oldName == $value) {
                $taskList[$key] = $newName;
            }
        }
        file_put_contents('output2.json', json_encode($taskList));
        unset($taskList);
    } else {
        echo "<br>Нет изменений!<br>";
        $fl = file_get_contents('output.json');
        $taskList = json_decode($fl, true);
        file_put_contents('output2.json', json_encode($taskList));
        unset($taskList);
    }
    $readFromFiles = file_get_contents('output2.json') or die('ошибка');

    //сравнение и вывод информации
    $firstFile = file_get_contents('output.json');
    $secondFile = file_get_contents('output2.json');
    $taskList1 = json_decode($firstFile, true);
    $taskList2 = json_decode($secondFile, true);

    $result = array_diff($taskList1, $taskList2);
    echo "<br>Сравнение двух файлов<br>";
    print_r($result);
}

//Задание 3.3
function task3($value)
{
    echo '<br/><br/>-------------------------#Задание 3---------------------------------<br/><br/>';
    //создается массив
    /*$array = array();
    for ($i = 1; $i < 50; $i++) {
         $array[$i] = range(1, 100);
    }
    echo $array;*/
    $array = [];
    $i = 0;
    while ($i < $value) {
        array_push($array, rand(1, 100));
        $i++;
    }

    //массив записывается в файл text.csv
    $fp = fopen('text.csv', 'w');
    fputcsv($fp, $array, ';');
    fclose($fp);
    echo 'Файл успешно записан' . '<br>';

    //сумма четных значений массива записывается в файл
    $fp = fopen('text.csv', 'w');
    fgetcsv($fp, 1000, ';');

    $sum = array_filter($array, function ($val) {
        return $val % 2 == 0;
    });
    echo 'Сумма четных чисел: ' .array_sum($sum);
    fclose($fp);
}

//Задание 3.4
function task4()
{
    echo '<br/><br/>-------------------------#Задание 4---------------------------------<br/><br/>';
    $page = file_get_contents('https://en.wikipedia.org/w/api.php?action=query&titles=Main%20Page&prop=revisions&rvprop=content&format=json');

    echo "Title:   " .substr($page, '566', 9) . '<br/>';
    echo "Page_id: " .substr($page, '541', 8) . '<br/>';
}
