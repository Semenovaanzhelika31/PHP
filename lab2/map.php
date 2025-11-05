<?php declare(strict_types=1);

function map(array $arr, callable $callback): array {
    $result = [];
    foreach ($arr as $item) {
        $result[] = $callback($item);
    }
    return $result;
}

$numbers = [1, 2, 3, 4, 5];

$squared = map($numbers, fn($x) => $x ** 2);

print_r($squared); 
?>