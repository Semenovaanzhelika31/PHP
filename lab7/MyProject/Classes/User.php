<?php
namespace MyProject\Classes;

class User {
    public $name;
    public $login;
    private $password;

    public function __construct($name, $login, $password) {
        $this->name = $name;
        $this->login = $login;
        $this->password = $password;
    }

    public function getInfo() {
        return [
            'name' => $this->name,
            'login' => $this->login
        ];
    }

    public function __destruct() {
        echo "<div class='destruct-message'>Пользователь {$this->login} удалён.</div>";
    }
}
