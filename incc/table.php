<?php
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';

$cols = 10;
$rows = 10;
$color = '#ffff00';


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $cols_input = abs((int)($_POST['cols'] ?? 0));
  $rows_input = abs((int)($_POST['rows'] ?? 0));
  $color_input = trim(strip_tags($_POST['color'] ?? ''));


  if ($cols_input > 0) {
    $cols = $cols_input;
  }
  if ($rows_input > 0) {
    $rows = $rows_input;
  }
  if (!empty($color_input)) {
    $color = $color_input;
  }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Таблица умножения</title>
  <link rel="stylesheet" href="style.css">
  <style>
    table {
      border: 2px solid black;
      border-collapse: collapse;
      margin-top: 20px;
    }
    th, td {
      padding: 10px;
      border: 1px solid black;
    }
    th {
      background-color: <?php echo htmlspecialchars($color); ?>;
      font-weight: bold;
      text-align: center;
    }
    form {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin: 5px 0;
    }
    input[type="text"] {
      width: 100px;
    }
  </style>
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; ?>
  </header>

  <section>
    <h1>Таблица умножения</h1>

    <form method="POST" action="<?=$_SERVER['REQUEST_URI']?>">
      <label>
        Количество столбцов:
        <input type="text" name="cols" value="<?php echo htmlspecialchars((string)$cols); ?>">
      </label>
      <label>
        Количество строк:
        <input type="text" name="rows" value="<?php echo htmlspecialchars((string)$rows); ?>">
      </label>
      <label>
        Цвет заголовков:
        <input type="color" name="color" value="<?php echo htmlspecialchars($color); ?>">
      </label>
      <button type="submit">Обновить таблицу</button>
    </form>

    <?php
    function drawTable($cols, $rows, $color) {
      echo '<table>';

      for ($i = 1; $i <= $rows; $i++) {
        echo '<tr>';

        for ($j = 1; $j <= $cols; $j++) {
          $result = $i * $j;

          if ($i == 1 || $j == 1) {
            echo "<th style='background-color: $color;'>$result</th>";
          } else {
            echo "<td>$result</td>";
          }
        }

        echo '</tr>';
      }

      echo '</table>';
    }

    drawTable($cols, $rows, $color);
    ?>
  </section>

  <nav>
    <h2>Навигация по сайту</h2>
    <ul>
      <li><a href='index.php'>Домой</a></li>
      <li><a href='about.php'>О нас</a></li>
      <li><a href='contact.php'>Контакты</a></li>
      <li><a href='table.php'>Таблица умножения</a></li>
      <li><a href='calc.php'>Калькулятор</a></li>
    </ul>
  </nav>


  <footer>
    &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
  </footer>
</body>
</html>
