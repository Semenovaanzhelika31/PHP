<?php
function drawTable($cols = 5, $rows = 5, $color = '#ff0000') {
    echo '<table border="1" width="200" style="border-collapse: collapse;">';
    for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';
        for ($j = 1; $j <= $cols; $j++) {
            $product = $i * $j;
            echo '<td style="background-color: ' . htmlspecialchars($color) . '; color: white; text-align: center; padding: 5px;">' . $product . '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}

function getMenu() {
    $menuItems = [
        'index.php' => 'Домой',
        'about.php' => 'О нас',
        'contact.php' => 'Контакты',
        'table.php' => 'Таблица умножения',
        'calc.php' => 'Калькулятор'
    ];
    echo '<ul>';
    foreach ($menuItems as $url => $text) {
        echo '<li><a href="' . htmlspecialchars($url) . '">' . htmlspecialchars($text) . '</a></li>';
    }
    echo '</ul>';
}
?>
