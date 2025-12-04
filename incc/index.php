<?php
require_once 'inc/lib.inc.php';
require_once 'inc/data.inc.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сайт нашей школы</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; ?>
  </header>

  <section>
    <?php include 'inc/index.inc.php'; ?>
  </section>

  <nav>
    <?php include 'inc/menu.inc.php'; ?>
  </nav>

  <footer>
    <?php include 'inc/bottom.inc.php'; ?>
  </footer>
</body>
</html>
