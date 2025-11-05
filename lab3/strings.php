<?php declare(strict_types=1);

$login = ' User ';
$password = 'megaP@ssw0rd';
$name = 'иван';
$email = 'ivan@petrov.ru';
$code = '<?=$login?>';

$login = strtolower(trim($login));

function isPasswordComplex(string $password): bool {
    return preg_match('/[A-Z]/', $password) &&
           preg_match('/[a-z]/', $password) &&
           preg_match('/d/', $password) &&
           strlen($password) >= 8;
}

$passwordComplexity = isPasswordComplex($password) ? "Пароль сложный." : "Пароль не сложный.";
$name = ucfirst($name);
$isEmailValid = filter_var($email, FILTER_VALIDATE_EMAIL) ? "Email корректен." : "Email некорректен.";
$codeOutput = str_replace('<?=$login?>', $login, $code);

?>
<!doctype html>
<html>
<head>
 <meta charset="utf-8">
 <title>Использование функций обработки строк</title>
</head>
<body>

<p>Логин: <?php echo $login; ?></p>
<p><?php echo $passwordComplexity; ?></p>
<p>Имя: <?php echo $name; ?></p>
<p><?php echo $isEmailValid; ?></p>
<p>Код: <?php echo htmlspecialchars($codeOutput); ?></p>

</body>
</html>
