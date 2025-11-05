<?php declare(strict_types=1);

function getMenu(array $menu, bool $vertical = true): void {
    $class = $vertical ? 'menu' : 'menu horizontal';
    echo "<ul class=\"$class\">\n";
    foreach ($menu as $item) {
        echo "  <li><a href=\"{$item['link']}\">{$item['text']}</a></li>\n";
    }
    echo "</ul>\n";
}

$leftMenu = [
    ['link' => '/home', 'text' => 'Главная'],
    ['link' => '/about', 'text' => 'О нас'],
    ['link' => '/services', 'text' => 'Услуги'],
    ['link' => '/contacts', 'text' => 'Контакты']
];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Меню</title>
    <style>
        .menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        .horizontal li {
            display: inline;
            padding: 5px;
        }
    </style>
</head>
<body>
    <h1>Меню</h1>
    <?php
    getMenu($leftMenu);
    
    getMenu($leftMenu, false);
    ?>
</body>
</html>