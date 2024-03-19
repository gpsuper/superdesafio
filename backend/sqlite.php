<?php

/* Arquivo para realizar a criação do banco de dados */
/* Para utilizar: php sqlite.php */
/* Ou no navegador http://localhost/backend/sqlite.php */
/* Ou no terminal: php sqlite.php */

$db = new SQLite3('sqlite/database.sqlite');

echo "Banco de dados criado com sucesso! <br>";

$db->exec("DROP TABLE IF EXISTS users;");
$db->exec("CREATE TABLE if not exists users (
            user_id INTEGER PRIMARY KEY NOT NULL,
            login TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            first_name TEXT NOT NULL,
            last_name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )");

echo "Tabela criada com sucesso! (users) <br>";



$db->exec("DROP TABLE IF EXISTS company;");
$db->exec("CREATE TABLE if not exists company (
            company_id INTEGER PRIMARY KEY NOT NULL,
            company_name TEXT NOT NULL,
            created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP
            )");

echo "Tabela criada com sucesso! (company)<br>";

$db->exec("DROP TABLE IF EXISTS users_company;");
$db->exec("CREATE TABLE if not exists users_company (
            user_id INTEGER PRIMARY KEY NOT NULL,
            login TEXT NOT NULL UNIQUE,
            password TEXT NOT NULL,
            company_id INTEGER NOT NULL,
            first_name TEXT NOT NULL,
            last_name TEXT NOT NULL,
            email TEXT NOT NULL UNIQUE,
            created_at TEXT NOT NULL DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (company_id) REFERENCES company(company_id)
            )");


$db->exec("CREATE TRIGGER not_same_login 
BEFORE INSERT ON users_company 
BEGIN
  SELECT CASE 
    WHEN EXISTS (SELECT 1 FROM users WHERE NEW.login = users.login) 
    THEN 
      RAISE(ABORT, 'Erro: O login informado ja existe.') 
  END;
END;");


echo "Tabela criada com sucesso! (users_company)<br>";

/* Usuario de Administrador */
$db->exec("INSERT INTO users (login, password, first_name, last_name, email) VALUES ('admin', 'admin', 'admin', 'admin', 'admin')");

echo "Inserido admin com sucesso! (users)<br>";

/* Empresas para teste */
$db->exec("INSERT INTO company (company_name) VALUES ('SevenBlue')");
echo "Inserido SevenBlue com sucesso! (company_name)<br>";
$db->exec("INSERT INTO company (company_name) VALUES ('Rocket brasil')");
echo "Inserido Rocket brasil com sucesso! (company_name)<br>";
$db->exec("INSERT INTO company (company_name) VALUES ('Byte & Construtores')");
echo "Inserido Byte & Construtores com sucesso! (company_name)<br>";


/* Usuários da empresa de teste */
$db->exec("INSERT INTO users_company (login, password, first_name, last_name, email, company_id) VALUES ('augusto.pereira', 'usuario1', 'Augusto', 'Pereira', 'augusto.pereira@email.com', 1)");
echo "Inserido Augusto com sucesso! (users_company)<br>";
$db->exec("INSERT INTO users_company (login, password, first_name, last_name, email, company_id) VALUES ('jose.ponte', 'usuario2', 'José', 'Pontes', 'josé.pontes@email.com', 2)");
echo "Inserido Jose com sucesso! (users_company)<br>";
$db->exec("INSERT INTO users_company (login, password, first_name, last_name, email, company_id) VALUES ('marcos.silva', 'usuario3', 'Marcos', 'Silva', 'marcos.silva@email.com', 2)");
echo "Inserido Marcos com sucesso! (users_company)<br>";
