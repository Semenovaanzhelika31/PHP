<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function ($class) {
    $parts = explode('\\', $class);

    $className = end($parts); 
    $file = __DIR__ . '/MyProject/Classes/' . $className . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
});

use MyProject\Classes\User;
use MyProject\Classes\SuperUser;

$user1 = new User("Иван Иванов", "ivan", "12345");
$user2 = new User("Анна Петрова", "anna", "54321");
$superUser = new SuperUser("Иван Иванов", "ivan_admin", "12345", "Администратор");

echo "<!DOCTYPE html>\n";
echo "<html lang='ru'>\n";
echo "<head>\n";
echo "  <meta charset='UTF-8'>\n";
echo "  <title>Информация о пользователях</title>\n";
echo "</head>\n";
echo "<body>\n";
echo "  <h1>Информация о пользователях</h1>\n";


$user1->showInfo();
$user2->showInfo();

echo "<h2>Информация о суперпользователе</h2>\n";
$superUser->showInfo();

echo "</body>\n";
echo "</html>\n";
?>
