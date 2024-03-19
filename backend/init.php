<?php


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
/* Para report de erros */
error_reporting(E_ERROR);

require_once __DIR__ . "/sqlite/sqliteConnection.php";
require_once __DIR__ . "/functions.php";
require_once __DIR__ . "/user.php";
require_once __DIR__ . "/session.php";

use Backend\Session\Session;
Session::start();
