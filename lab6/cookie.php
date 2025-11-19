<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Последний визит</title>
</head>
<body>
    <h1>Последний визит</h1>

    <?php

    $visitCount = 1;

    if (isset($_COOKIE['visit_count'])) {
        $visitCount = (int)trim(htmlspecialchars($_COOKIE['visit_count'])) + 1;
    }

    $lastVisit = '';

    if (isset($_COOKIE['last_visit'])) {
        $lastVisit = trim(htmlspecialchars($_COOKIE['last_visit']));
    }

    setcookie('visit_count', $visitCount, strtotime('+1 day'), '/');

    $currentDateTime = date('d-m-Y H:i:s');
    setcookie('last_visit', $currentDateTime, strtotime('+1 day'), '/');


    if ($visitCount == 1) {
        echo 'Добро пожаловать!';
    } else {
        echo 'Вы зашли на страницу ' . $visitCount . ' раз<br>';
        echo 'Последнее посещение: ' . $currentDateTime;
    }
    ?>
</body>
</html>
