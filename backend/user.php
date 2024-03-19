<?php

namespace Backend\User;

use \SQLite3;
use \Backend\Session\Session;

/* Classe para fazer o login e manter dados do usuário */

class User
{
    private $id;

    private $pass;

    private $login;

    public function __construct($l, $p)
    {

        Session::start();
        global $db;

        $this->login = SQLite3::escapeString($l);
        $this->pass =  SQLite3::escapeString($p);

        $sql_admin = $db->query("SELECT * FROM users WHERE login = '{$this->login}' AND password = '{$this->pass}' LIMIT 1");


        if ($user = $sql_admin->fetchArray()) {;
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['module'] = "admin";
        } else {
            $sql_empresa = $db->query("SELECT * FROM users_company WHERE login = '{$this->login}' AND password = '{$this->pass}' LIMIT 1");
            if ($user_empresa = $sql_empresa->fetchArray()) {
                $_SESSION['login'] = true;
                $_SESSION['first_name'] = $user_empresa['first_name'];
                $_SESSION['last_name'] = $user_empresa['last_name'];
                $_SESSION['email'] = $user_empresa['email'];
                $_SESSION['module'] = "empresa";
            } else {
                $_SESSION['login'] = false;
            }
        }
    }

    public function login()
    {
        return $_SESSION['login'];
    }

    public function logout()
    {
        Session::destroy();
        header("Location: /");
        exit();
    }

    public function getId()
    {
        return $_SESSION['user_id'];
    }
    public function getFirstName()
    {
        return $_SESSION['first_name'];
    }
    public function getLastName()
    {
        return $_SESSION['last_name'];
    }
    public function getEmail()
    {
        return $_SESSION['email'];
    }

    public function getModule()
    {
        return $_SESSION['module'];
    }
    public function redirect_dashboard()
    {
        if ($this->getModule() == "admin") {
            header("Location: /admin");
        } else if ($this->getModule() == "empresa") {
            header("Location: /empresa");
        }
    }
}
