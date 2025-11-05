<?php
$result = null;
$outputStr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);
    
    $operator = $_POST['operator'] ?? '';
    $operator = htmlspecialchars(strip_tags(trim($operator)));

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
                    $result = 'Ошибка: деление на ноль!';
                    $outputStr = $result;
                } else {
                    $result = $num1 / $num2;
                    $outputStr = "$num1 ÷ $num2 = $result";
                }
                break;
        }
    } else {
        $result = 'Ошибка: некорректные входные данные!';
        $outputStr = $result;
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
</head>
<body>
<h1>Калькулятор</h1>
<?php if ($outputStr): ?>
    <p><strong>Результат:</strong> <?= htmlspecialchars($outputStr) ?></p>
    <hr>
<?php endif; ?>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<p><label for="num1">Число 1</label><br>
<input type="text" name="num1" id="num1" value="<?php echo isset($_POST['num1']) ? htmlspecialchars($_POST['num1']) : ''; ?>" required></p>
<p><label for="operator">Оператор</label><br>
<select name="operator" id="operator">
    <option value="+" <?php echo (isset($_POST['operator']) && $_POST['operator'] == '+') ? 'selected' : ''; ?>>+</option>
    <option value="-" <?php echo (isset($_POST['operator']) && $_POST['operator'] == '-') ? 'selected' : ''; ?>>−</option>
    <option value="*" <?php echo (isset($_POST['operator']) && $_POST['operator'] == '*') ? 'selected' : ''; ?>>×</option>
    <option value="/" <?php echo (isset($_POST['operator']) && $_POST['operator'] == '/') ? 'selected' : ''; ?>>÷</option>
</select></p>
<p><label for="num2">Число 2</label><br>
<input type="text" name="num2" id="num2" value="<?php echo isset($_POST['num2']) ? htmlspecialchars($_POST['num2']) : ''; ?>" required></p>
<button type="submit">Считать!</button>
</form>
</body>
</html>
