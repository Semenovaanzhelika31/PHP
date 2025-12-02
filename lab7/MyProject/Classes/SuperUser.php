<?php

namespace MyProject\Classes;

require_once __DIR__ . '/User.php';

class SuperUser extends User
{
    public $role;

    public function __construct($name, $login, $password, $role)
    {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    public function showInfo()
    {
        parent::showInfo();
        echo "<p><strong>Роль:</strong> " . htmlspecialchars($this->role) . "</p>\n";
    }
}
?>
