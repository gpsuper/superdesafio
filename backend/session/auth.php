<?
include('../init.php');

use Backend\User\User;
use Backend\Session\Session;

Session::start();
$user = SQLite3::escapeString($_POST['login']);
$password = SQLite3::escapeString($_POST['password']);

$login_usuario = new User($user, $password);

$_SESSION['user'] = $login_usuario;
if ($_SESSION['user']->login()) {
    $_SESSION['user']->redirect_dashboard();
} else {
    header('Location: /login/?error=1');
};
