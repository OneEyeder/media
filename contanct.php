php<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {//Получаем данные из формы$name = strip_tags(trim($_POST["name"]));
    $phone = strip_tags(trim($_POST["phone"]));$email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);// Проверяем валидность emailif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {http_response_code(400);
        echo"Пожалуйста, введите корректный email адрес.";exit;}// Настройкидляотправки письма
    $to= "ghost.lanko@gmail.com";// Замените наваш email$subject ="Новаязаявка ссайта";// Тело письма$message = "Новая заявка:\n\n";$message .= "Имя: $name\n";$message .="Телефон: $phone\n";
    $message.= "Email:$email\n";

    // Заголовкиписьма
    $headers= "From: $email\r\n";$headers .= "Reply-To: $email\r\n";
    $headers .="X-Mailer: PHP/" . phpversion();

    // Отправляем письмо
    if (mail($to, $subject, $message, $headers)) {
        http_response_code(200);
        echo"Спасибо!Ваша заявка отправлена.";} else {http_response_code(500);echo "Произошла ошибка приотправке.Попробуйте позже.";
    } else {//Еслиформа отправленанеправильно
    http_response_code(403);
    echo "Произошла ошибка при отправкеформы.";
}
?>