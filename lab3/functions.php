<?php declare(strict_types=1);
header('Content-Type: text/html; charset=utf-8');

echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head><meta charset="UTF-8"><title>Функции PHP-модулей</title></head>';
echo '<body>';
echo '<h1>Загруженные модули</h1>';

$extensions = get_loaded_extensions();

$totalFunctions = 0;

foreach ($extensions as $extension) {
    echo "<h2>$extension</h2>";
    
    $functions = get_extension_funcs($extension);
    
    if ($functions === false) {
        echo '<p><em>Функции не найдены или недоступны.</em></p>';
        continue;
    }

    sort($functions);

    echo '<ul style="margin-left: 20px;">';
    foreach ($functions as $funcName) {
        echo "<li><code>$funcName</code></li>";
        $totalFunctions++;
    }
    echo '</ul>';
}

echo '<hr>';
echo "<p><strong>Общее количество функций:</strong> $totalFunctions</p>";

echo '</body>';
echo '</html>';
