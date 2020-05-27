<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
</head>
<body style="display: flex;">
<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

function tableAdmin()
{
    try {
        $config = include "db.php";
        $pdo = new PDO("mysql:host=$config->host;dbname=$config->database", $config->username, $config->password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $street = filter_input(INPUT_POST, 'street', FILTER_SANITIZE_STRING);
        $home = filter_input(INPUT_POST, 'home', FILTER_SANITIZE_STRING);
        $part = filter_input(INPUT_POST, 'part', FILTER_SANITIZE_STRING);
        $appt = filter_input(INPUT_POST, 'appt', FILTER_SANITIZE_STRING);
        $floor = filter_input(INPUT_POST, 'floor', FILTER_SANITIZE_STRING);
        $need_change = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);
        $card_payment = filter_input(INPUT_POST, 'payment', FILTER_SANITIZE_STRING);
        $card_payment = !empty($card_payment) ? "Картой" : "Наличные";
        $callback = filter_input(INPUT_POST, 'callback', FILTER_SANITIZE_STRING);
        $callback = !empty($callback) ? "Не звонить" : "Перезвонить";
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

        $query = "select * from users";
        $select_from_users = $pdo->prepare($query);
        $select_from_users->execute();
        $user = $select_from_users->fetchAll();

        echo "<table width='30%' border='1' style='margin: 10px auto;'>";
        echo "<tr style='background-color: cadetblue'><td>Номер покупателя</td><td>Имя</td><td>Email</td><td>Телефон</td></tr>";
        foreach ($user as $value) {
            $id=$value['id'];
            $name=$value['name'];
            $email=$value['email'];
            $phone=$value['phone'];

            echo "<tr><td>" .$id ."</td><td>" . $name ."</td><td>" .$email ."</td><td>" .$phone ."</td></tr>";
        }
        echo "</table>";

        $query = "select * from orders";
        $select_from_users = $pdo->prepare($query);
        $select_from_users->execute();
        $user = $select_from_users->fetchAll();

        echo "<table width='65%' border='1' style='margin: 10px auto;'>";
        echo "<tr style='background-color: cadetblue'><td>Номер заказа</td><td>Номер пользователя</td><td>Улица</td><td>Дом</td><td>Корпус</td>
                <td>Квартира</td><td>Этаж</td><td>Комментарии</td><td>Наличные</td><td>Картой</td><td>Звонить</td><td>Время заказа</td></tr>";
        foreach ($user as $value) {
            $id=$value['id'];
            $user_id=$value['user_id'];
            $street=$value['street'];
            $home=$value['home'];
            $part=$value['part'];
            $appt=$value['appt'];
            $floor=$value['floor'];
            $comment=$value['comment'];
            $need_change=$value['need_change'];
            $card_payment=$value['card_payment'];
            $callback=$value['callback'];
            $time=$value['times'];

            echo "<tr><td>" .$id ."</td><td>" . $user_id ."</td><td>" .$street ."</td><td>" .$home ."</td><td>" .$part ."</td>
                <td>" .$appt ."</td><td>" .$floor ."</td><td>" .$comment ."</td><td>" .$need_change ."</td><td>" .$card_payment ."</td>
                <td>" .$callback ."</td><td>" .$time ."</td></tr>";
        }
        echo "</table>";
    } catch (Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
}
tableAdmin();
?>
</body>
</html>
