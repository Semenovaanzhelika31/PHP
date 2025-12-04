<?php
$result = null;
$outputStr = '';
$num1 = '';
$num2 = '';
$operator = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Получаем и валидируем входные данные
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    $operator = filter_input(INPUT_POST, 'operator', FILTER_SANITIZE_STRING);

    $operator = trim(strip_tags($operator));

    if ($num1 !== false && $num2 !== false && in_array($operator, ['+', '-', '*', '/'])) {
        switch ($operator) {
            case '+':
                $result = $num1 + $num2;
                $outputStr = "$num1 + $num2 = $result";
                break;
            case '-':
                $result = $num1 - $num2;
                $outputStr = "$num1 − $num2 = $result";
                break;
            case '*':
                $result = $num1 * $num2;
                $outputStr = "$num1 × $num2 = $result";
                break;
            case '/':
                if ($num2 == 0) {
                    $outputStr = 'Ошибка: деление на ноль!';
                } else {
                    $result = $num1 / $num2;
                    $outputStr = "$num1 ÷ $num2 = $result";
                }
                break;
        }
    } else {
        $outputStr = 'Ошибка: некорректные входные данные!';
    }
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Калькулятор</title>
    <!-- Подключение внешнего CSS-файла -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <header>
            <?php include 'inc/top.inc.php'; ?>
        </header>

        <section>
            <h1>Калькулятор школьника</h1>

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
                <label for="num1">Число 1:</label>
                <input type="text" name="num1" id="num1"
                       value="<?php echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; ?>"
                       required>

                <label for="operator">Оператор (+, −, ×, ÷):</label>
                <input type="text" name="operator" id="operator"
                       value="<?php echo isset($_POST['operator']) ? htmlspecialchars($_POST['operator']) : ''; ?>"
                       maxlength="1" required>

                <label for="num2">Число 2:</label>
                <input type="text" name="num2" id="num2"
                       value="<?php echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; ?>"
                       required>

                <input type="submit" value="Считать">
            </form>

            <?php if (!empty($outputStr)): ?>
                <div class="result <?php echo strpos($outputStr, 'Ошибка') === 0 ? 'error' : 'success'; ?>">
                    <?php echo htmlspecialchars($outputStr); ?>
                </div>
            <?php endif; ?>
        </section>

        <nav>
            <ul>
                <li><a href="index.php">Домой</a></li>
                <li><a href="about.php">О нас</a></li>
                <li><a href="contact.php">Контакты</a></li>
                <li><a href="table.php">Таблица умножения</a></li>
                <li><a href="calc.php">Калькулятор</a></li>
            </ul>
        </nav>

        <footer>
            &copy; Супер Мега Веб-мастер, 2000 &ndash; 20xx
        </footer>
    </div>
</body>
</html>
