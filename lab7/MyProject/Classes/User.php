<?php

namespace MyProject\Classes;

class User
{
    public $name;
    public $login;
    private $password;

    public function __construct($name, $login, $password)
    {
        $this->name = $name;
        $this->login = $login;
        $this->setPassword($password);
    }

    public function setPassword($password)
    {
        $this->password = password_hash($password, PASSWORD_DEFAULT);
    }

    public function showInfo()
    {
        echo "<div class='user-info' style='margin-bottom: 20px;'>\n";
        echo "  <p><strong>Пользователь:</strong> " . htmlspecialchars($this->name) . "</p>\n";
        echo "  <p><strong>Логин:</strong> " . htmlspecialchars($this->login) . "</p>\n";
        echo "  <p><strong>Пароль:</strong> [******]</p>\n";
        echo "  <hr style='margin: 10px 0;'>\n";
        echo "</div>\n";
    }

    public function __destruct()
    {
        // Для чистоты вывода в браузер — пишем в лог сервера
        error_log("Пользователь {$this->login} удалён.");
    }
}
?>
