<?php

spl_autoload_register(function ($class) {
    $classPath = str_replace('\\', '/', $class);
    $file = __DIR__ . '/' . $classPath . '.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        throw new Exception("Файл класса не найден: $file");
    }
});

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

$user1 = new User("Иван Иванов", "ivan", "12345");
$user2 = new User("Анна Петрова", "anna", "54321");
$superUser = new SuperUser("Администратор", "admin", "adminpass", "Главный");

echo "<!DOCTYPE html><html lang='ru'><head><meta charset='UTF-8'></head><body>";
echo "<h1>Информация о пользователях</h1>";

$user1->showInfo();
$user2->showInfo();

echo "<h2>Суперпользователь</h2>";
$superUser->showInfo();

echo "</body></html>";
?>
