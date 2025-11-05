<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
</head>
<body>
    <h1>Меню</h1>
    <nav>
        <?php

        $leftMenu = [
            ['link' => 'Домой',        'href' => 'index.php'],
            ['link' => 'О нас',        'href' => 'about.php'],
            ['link' => 'Контакты',      'href' => 'contact.php'],
            ['link' => 'Таблица умножения', 'href' => 'table.php'],
            ['link' => 'Калькулятор',    'href' => 'calc.php']
        ];


        foreach ($leftMenu as $item) {
            echo '<a href="' . htmlspecialchars($item['href']) . '">' 
                . htmlspecialchars($item['link']) . '</a><br>';
        }
        ?>
    </nav>
</body>
</html>