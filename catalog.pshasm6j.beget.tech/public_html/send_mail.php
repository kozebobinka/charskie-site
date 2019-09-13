<?php
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$text = $_POST['message'];
$url = $_POST['url'];
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {

    $mail->CharSet = "UTF-8";
    $mail->setFrom('info@charskie.com', 'Сайт Чарские'); // Адрес самой почты и имя отправителя
    // Получатель письма
    $mail->addAddress('charoky@mail.ru');
    $mail->isHTML(true);

    $mail->Subject = 'Обращение с сайта ' . date('d.m.Y H:i');
    $mail->Body    = "
        <b>Со страницы:</b> $url<br><br>
        <b>Имя:</b> $name<br><br>
        <b>Почта:</b> $email<br><br>
        <b>Телефон:</b> $phone<br><br>
        <b>Сообщение:</b><br>$text";
// Проверяем отравленность сообщения
    if ($mail->send()) {
        echo "ok";
    } else {
        echo "Сообщение не было отправлено. Неверно указаны настройки вашей почты";
    }
} catch (Exception $e) {
    echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}