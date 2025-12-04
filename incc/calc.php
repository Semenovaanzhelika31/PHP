<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Калькулятор</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input, select { padding: 5px; margin-bottom: 15px; width: 200px; }
        button { padding: 10px 15px; background: #007BFF; color: white; border: none; cursor: pointer; }
    </style>
</head>
<body>
    <h1>Калькулятор</h1>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num1 = floatval($_POST['num1']);
        $num2 = floatval($_POST['num2']);
        $operator = $_POST['operator'];
        $result = null;

        switch ($operator) {
            case '+': $result = $num1 + $num2; break;
            case '-': $result = $num1 - $num2; break;
            case '*': $result = $num1 * $num2; break;
            case '/': 
                if ($num2 != 0) $result = $num1 / $num2;
                else $result = 'Ошибка: деление на 0';
                break;
            default: $result = 'Ошибка: неизвестный оператор';
        }

        echo '<p><strong>Результат:</strong> ' . $num1 . ' ' . $operator . ' ' . $num2 . ' = ' . $result . '</p>';
    }
    ?>

    <form method="POST">
        <label>Число 1</label>
        <input type="text" name="num1" required>

        <label>Оператор</label>
        <select name="operator" required>
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">×</option>
            <option value="/">÷</option>
        </select>

        <label>Число 2</label>
        <input type="text" name="num2" required>

        <button type="submit">Считать!</button>
    </form>
</body>
</html>
