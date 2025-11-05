<?php declare(strict_types=1);

$swap = function (&$x, &$y) {
    $temp = $x;
    $x = $y;
    $y = $temp;
};

$a = 5;
$b = 8;

$swap($a, $b);

var_dump(5 === $b); 
var_dump(8 === $a); 
?>