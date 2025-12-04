<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Калькулятор</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <?php include 'inc/top.inc.php'; ?>
  </header>

  <section>
    <h1>Калькулятор школьника</h1>
    <form action=''>
      <label>Число 1:</label><br>
      <input name='num1' type='text'><br>
      <label>Оператор: </label><br>
      <input name='operator' type='text'><br>
      <label>Число 2: </label><br>
      <input name='num2' type='text'><br><br>
      <input type='submit' value='Считать'>
    </form>
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
