<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

function proceedOrder()
{
    try {
        $config = include "adminka/db.php";
        $pdo = new PDO (
            "mysql:host=$config->host;
            dbname=$config->database",
            $config->username, $config->password);
        $pdo -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
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
        $need_change = !empty($need_change) ? "Потребуется сдача" : "Без наличная оплата";
        $card_payment = !empty($card_payment) ? "Картой" : "Наличные";
        $callback = filter_input(INPUT_POST, 'callback', FILTER_SANITIZE_STRING);
        $callback = !empty($callback) ? "Не звонить" : "Перезвонить";
        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);

        // Получаем из базы пользователя
        $query = "select * from users where email = '{$email}'";
        $select_from_users = $pdo->prepare($query);
        $select_from_users->execute();
        $user = $select_from_users->fetchAll();

        // если пользователь уже заказывал
        if (!empty($user)) {
            $user_id = $user[0]['id'];
        } else {
            $query = "insert into users (name, email, phone) values ('$name', '$email', '$phone')";
            $insert_user = $pdo->prepare($query);
            $insert_user->execute();
            $user_id = $pdo->lastInsertId();
        }

        $query = "insert into orders (user_id, street, home, part, appt, floor, comment, need_change, card_payment, callback)
                  values ('$user_id', '$street', '$home', '$part', '$appt', '$floor', '$comment', '$need_change', '$card_payment', '$callback')";
        $insert_order = $pdo->prepare($query);
        $insert_order->execute();
        $order_id = $pdo->lastInsertId();

        $query = "select count(*) as total from orders where user_id = '{$user_id}'";
        $select_user_orders = $pdo->prepare($query);
        $select_user_orders->execute();
        $orders_count = $select_user_orders->fetchAll();
        $orders_count = $orders_count[0]['total'];

        $message = "<br/>Уважаемый " . $name . ", Ваш заказ № " . $order_id ."<br/>DarkBeefBurger за 500 рублей, 1 шт. " ." Успешно размещен.<br/>"
            . "Заказ будет доставлен по адресу: {$street} дом {$home} корпус {$part} квартира {$appt}
             Этаж {$floor}<br/> Комментарии: {$comment}. <br/>Оплата: {$card_payment}. {$callback}<br/>";
        if ($orders_count == 1) {
            $message .= "Спасибо за ваш первый заказ!";
        } elseif ($orders_count > 1) {
            $message .= "Спасибо, это ваш {$orders_count} заказ!\n";
        }
        file_put_contents('order.txt', $message);
        echo $message;
    } catch (Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
}
proceedOrder();
