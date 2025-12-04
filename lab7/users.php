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

$userData1 = $user1->getInfo();
$userData2 = $user2->getInfo();
$superUserData = $superUser->getInfo();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Информация о пользователях</title>
</head>
<body>
    <h1>Информация о пользователях</h1>


    <div class="user">
        <h3><?= htmlspecialchars($userData1['name']) ?></h3>
        <p><strong>Логин:</strong> <?= htmlspecialchars($userData1['login']) ?></p>
    </div>

    <div class="user">
        <h3><?= htmlspecialchars($userData2['name']) ?></h3>
        <p><strong>Логин:</strong> <?= htmlspecialchars($userData2['login']) ?></p>
    </div>

    <h2>Суперпользователь</h2>
    <div class="superuser">
        <h3><?= htmlspecialchars($superUserData['name']) ?></h3>
        <p><strong>Логин:</strong> <?= htmlspecialchars($superUserData['login']) ?></p>
        <p><strong>Роль:</strong> <?= htmlspecialchars($superUserData['role']) ?></p>
    </div>
</body>
</html>
