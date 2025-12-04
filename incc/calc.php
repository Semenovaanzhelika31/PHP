<?php
$result = null;
$outputStr = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Валидация и получение чисел
    $num1 = filter_input(INPUT_POST, 'num1', FILTER_VALIDATE_FLOAT);
    $num2 = filter_input(INPUT_POST, 'num2', FILTER_VALIDATE_FLOAT);

    // Обработка оператора
    $operator = $_POST['operator'] ?? '';
    $operator = htmlspecialchars(strip_tags(trim($operator)));

    // Проверка корректности данных
    if (
        $num1 !== false &&
        $num2 !== false &&
        in_array($operator, ['+', '-', '*', '/'])
    ) {
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
        <style>
            body { font-family: Arial, sans-serif; margin: 20px; }
            form { max-width: 400px; }
            label { display: block; margin-top: 10px; font-weight: bold; }
            input, select { width: 100%; padding: 8px; margin-top: 5px; }
            button { margin-top: 15px; padding: 10px 20px; background: #007BFF; color: white; border: none; cursor: pointer; }
            .result { background: #f0f8ff; padding: 15px; margin: 20px 0; border-left: 4px solid #007BFF; }
        </style>
    </head>
    <body>
        <h1>Калькулятор</h1>

        <?php if ($outputStr): ?>
            <div class="result">
                <strong>Результат:</strong> <?= htmlspecialchars($outputStr) ?>
            </div>
        <?php endif; ?>

        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="num1">Число 1</label>
            <input
                type="text"
                name="num1"
                id="num1"
                value="<?= htmlspecialchars($_POST['num1'] ?? '') ?>"
                required
            >

            <label for="operator">Оператор</label>
            <select name="operator" id="operator">
                <option value="+" <?= ($_POST['operator'] ?? '') === '+' ? 'selected' : '' ?>>+</option>
                <option value="-" <?= ($_POST['operator'] ?? '') === '-' ? 'selected' : '' ?>>−</option>
                <option value="*" <?= ($_POST['operator'] ?? '') === '*' ? 'selected' : '' ?>>×</option>
                <option value="/" <?= ($_POST['operator'] ?? '') === '/' ? 'selected' : '' ?>>÷</option>
            </select>

            <label for="num2">Число 2</label>
            <input
                type="text"
                name="num2"
                id="num2"
                value="<?= htmlspecialchars($_POST['num2'] ?? '') ?>"
                required
            >

            <button type="submit">Считать!</button>
        </form>
    </body>
</html>
