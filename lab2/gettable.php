<?php declare(strict_types=1); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Таблица умножения</title>
    <style>
        table { border-collapse: collapse; }
        td, th { border: 1px solid #ccc; padding: 8px; }
        th { background: yellow; }
    </style>
</head>
<body>
    <h1>Таблица умножения</h1>

    <?php
    function getTable(int $cols = 3, int $rows = 3, string $color = 'yellow'): int {
        static $count = 0;
        $count++;

        echo "<table>\n";
        
        for ($row = 1; $row <= $rows; $row++) {
            echo "  <tr>\n";
            for ($col = 1; $col <= $cols; $col++) {
                $product = $row * $col;
                if ($row === 1 || $col === 1) {
                    echo "    <th style='background: $color;'>$product</th>\n";
                } else {
                    echo "    <td>$product</td>\n";
                }
            }
            echo "  </tr>\n";
        }
        
        echo "</table>\n";
        return $count;
    }

    getTable();
    getTable(4);
    getTable(5, 4);
    getTable(6, 5, '#ffcccc');

    echo "<p>Таблиц нарисовано: " . getTable() . "</p>";
    ?>
</body>
</html>
