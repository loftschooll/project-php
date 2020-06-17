<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);

require_once '../vendor/autoload.php';

function register()
{
    try {
        $config = include "db.php";
        $pdo = new PDO ("mysql:host=$config->host; dbname=$config->database", $config->username, $config->password);
        $pdo -> setAttribute (PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $password = md5(filter_input(INPUT_POST,'password', FILTER_SANITIZE_STRING));

        // Получаем из базы пользователя
        $query = "select * from users where email = '{$email}'";
        $select_from_users = $pdo->prepare($query);
        $select_from_users->execute();
        $user_email = $select_from_users->fetchAll();

        // регистрация пользователя
        if (!empty($user_email)) {
            $user_id = $user_email[0]['id'];
            $message = "Email уже существует";
        } else {
            $query = "insert into users (username, email, password) values ('$username', '$email', '$password')";
            $insert_user = $pdo->prepare($query);
            $insert_user->execute();
            $user_id = $pdo->lastInsertId();
            $message = "Регистрация прошла успешно";

            // отправка сообщения на почту
            $transport = (new Swift_SmtpTransport('ssl://smtp.yandex.ru', 465))
                ->setUsername('batjoh@yandex.ru')
                ->setPassword('GznsqCtpjy5!');

            $mailer = new Swift_Mailer($transport);

            $message_send = (new Swift_Message('Заказ продуктов'))
                ->setFrom(['batjoh@yandex.ru' => 'Burger-shop'])
                ->setTo([$email])
                ->setBody($message);

            $result = $mailer->send($message_send);
        }

        echo $message;
    } catch (Exception $e) {
        echo 'Message: ' .$e->getMessage();
    }
}
register();
