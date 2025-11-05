<?php declare(strict_types=1);
$now = time();
$birthday = mktime(0, 0, 0, 3, 3, 2000);
$hour = (int)date('H', $now);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Использование функций даты и времени</title>
</head>
<body>
 <h1>Использование функций даты и времени</h1>
 <?php
 if ($hour >= 0 && $hour < 6) {
 $welcome = 'Доброй ночи';
 } elseif ($hour >= 6 && $hour < 12) {
 $welcome = 'Доброе утро';
 } elseif ($hour >= 12 && $hour < 18) {
 $welcome = 'Добрый день';
 } else {
 $welcome = 'Добрый вечер';
 }
 echo "<p>$welcome</p>";

 $formatter = new IntlDateFormatter(
 'ru_RU',
 IntlDateFormatter::NONE,
 IntlDateFormatter::NONE,
 'Europe/Moscow',
 IntlDateFormatter::GREGORIAN
 );
 $formatter->setPattern('Сегодня d MMMM y года, EEEE, H:mm:ss');
 echo "<p>". $formatter->format($now). "</p>";

 $currentYear = (int)date('Y', $now);
 $nextBirthday = mktime(0, 0, 0, (int)date('n', $birthday), (int)date('j', $birthday), $currentYear);

 if ($nextBirthday < $now) {
 $nextBirthday = mktime(0, 0, 0, (int)date('n', $birthday), (int)date('j', $birthday), $currentYear + 1);
 }

 $secondsLeft = $nextBirthday - $now;
 $days = floor($secondsLeft / 86400);
 $hours = floor(($secondsLeft % 86400) / 3600);
 $minutes = floor(($secondsLeft % 3600) / 60);
 $seconds = $secondsLeft % 60;

 echo "<p>До моего дня рождения осталось $days дней, $hours часов, $minutes минут и $seconds секунд.</p>";
 ?>
</body>
</html>