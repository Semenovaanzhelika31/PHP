<?php
namespace MyProject\Classes;

use MyProject\Classes\User;

class SuperUser extends User {
    public $role;

    public function __construct($name, $login, $password, $role) {
        parent::__construct($name, $login, $password);
        $this->role = $role;
    }

    public function getInfo() {
        $info = parent::getInfo();
        $info['role'] = $this->role;
        return $info;
    }
}
