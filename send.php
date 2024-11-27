<?php
// Подключение к базе данных
$servername = "MySQL-8.2";
$username = "root"; // ваш пользователь phpMyAdmin
$password = ""; // ваш пароль phpMyAdmin
$dbname = "feedback1";

// Создание подключения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получение данных из формы
$name = $_POST['name'];
$phone = $_POST['phone'];
$message = $_POST['message'];

// Защита от SQL-инъекций
$name = $conn->real_escape_string($name);
$phone = $conn->real_escape_string($phone);
$message = $conn->real_escape_string($message);

// SQL-запрос на вставку данных
$sql = "INSERT INTO feedback (name, phone, message) VALUES ('$name', '$phone', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Сообщение успешно отправлено!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
