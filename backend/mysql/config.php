<?php

/* Conexão para usar o MySQL do XAMPP */

$host_ip_bd = "127.0.0.1";
$user_admin_bd = "root";
$senha_user_admin_bd = "";
$name_db = "test";

// Database Constants // 

defined('DB_SERVER') ? null : define("DB_SERVER", $host_ip_bd);
defined('DB_USER')   ? null : define("DB_USER", $user_admin_bd);
defined('DB_PASS')   ? null : define("DB_PASS", $senha_user_admin_bd);
defined('DB_NAME')   ? null : define("DB_NAME", $name_db);
