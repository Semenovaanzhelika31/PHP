<?php
define('DATA_FILE', 'users.txt');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname = htmlspecialchars(trim($_POST['fname']));
    $lname = htmlspecialchars(trim($_POST['lname']));

    $line = $fname . ';' . $lname . PHP_EOL;

    $file = fopen(DATA_FILE, 'a');
    if ($file) {
        fwrite($file, $line);
        fclose($file);
        // Перезагружаем страницу, чтобы очистить POST-данные
        header('Location: ' . $_SERVER['PHP_SELF']);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Форма ввода данных</title>
</head>
<body>
    <h1>Заполните форму</h1>

    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        Имя: <input type="text" name="fname" required><br>
        Фамилия: <input type="text" name="lname" required><br>
        <input type="submit" value="Отправить">
    </form>

    <?php
    if (file_exists(DATA_FILE)) {
        $lines = file(DATA_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        echo '<h2>Сохранённые записи:</h2>';
        echo '<ol>';
        foreach ($lines as $key => $line) {
            echo '<li>' . htmlspecialchars($line) . '</li>';
        }
        echo '</ol>';

        echo 'Размер файла: ' . filesize(DATA_FILE) . ' байт';
    } else {
        echo 'Файл с данными ещё не создан. Заполните форму, чтобы начать.';
    }
    ?>
</body>
</html>
