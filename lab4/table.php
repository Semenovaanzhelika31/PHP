<?php
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';

$cols = 10;
$rows = 10;
$color = '#ffff00';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cols = abs((int)$_POST['cols']);
    $rows = abs((int)$_POST['rows']);
    $color = trim(strip_tags($_POST['color']));
}

if (!$cols) $cols = 10;
if (!$rows) $rows = 10;
if (!$color) $color = '#ffff00';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; ?>
  </header>

  <section>
    <h1>Таблица умножения</h1>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="POST">
      <label>Количество колонок: </label><br>
      <input name="cols" type="text" value="<?= htmlspecialchars($cols) ?>" required><br>

      <label>Количество строк: </label><br>
      <input name="rows" type="text" value="<?= htmlspecialchars($rows) ?>" required><br>

      <label>Цвет: </label><br>
      <input name="color" type="color" value="<?= htmlspecialchars($color) ?>" list="listColors" required>
      <datalist id="listColors">
        <option value="#ff0000"></option>
        <option value="#00ff00"></option>
        <option value="#0000ff"></option>
        <option value="#ffff00"></option>
      </datalist><br><br>

      <input type="submit" value="Создать">
    </form>

    <br>

    <?php 

    if (function_exists('drawTable')) {
        drawTable($cols, $rows, $color);
    } else {
        echo '<p>Ошибка: функция drawTable() не определена. Проверьте подключение inc/lib.inc.php.</p>';
    }
    ?>
  </section>

  <nav>
    <?php include 'inc/menu.inc.php'; ?>
  </nav>

  <footer>
    <?php include 'inc/bottom.inc.php'; ?>
  </footer>
</body>
</html>
