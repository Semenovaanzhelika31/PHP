<?php declare(strict_types=1);

header('Content-Type: text/html; charset=utf-8');

echo '<!DOCTYPE html><html><head><meta charset="UTF-8"><title>Константы PHP</title></head><body>';
echo '<h1>Все константы PHP</h1>';


$constants = get_defined_constants(true);

foreach ($constants as $group => $consts) {
    echo "<h2>$group</h2><table border='1' cellpadding='5'><tr><th>Имя</th><th>Значение</th></tr>";
    
    foreach ($consts as $name => $value) {
        // Чёткая группировка тернарных операторов
        if (is_bool($value)) {
            $val = $value ? 'true' : 'false';
        } elseif (is_null($value)) {
            $val = 'null';
        } elseif (is_array($value)) {
            $val = 'array[' . count($value) . ']';
        } else {
            $val = $value;
        }
        echo "<tr><td><code>$name</code></td><td>$val</td></tr>";
    }
    echo '</table><br>';
}

echo '</body></html>';