<?php
/* Classe para fazer a conexão com o banco de dados.*/
/* Classe nativa do PHP.*/

use \SQLite3;

$db = new SQLite3(__DIR__ . '/database.sqlite');
