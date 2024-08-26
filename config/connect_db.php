<?php
include_once "config.local.php";

$conx = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

if ($conx->connect_error) {
    die("Conexão com banco de dados falhou: " . $conx->connect_error);
}
