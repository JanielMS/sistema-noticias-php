<?php
include_once "config.local.php";

class Conexao
{
    private $conx;
    public function iniciar()
    {
        $this->conx = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);

        if ($this->conx->connect_error) {
            die("Conexão com banco de dados falhou: " . $this->conx->connect_error);
        }

        return $this->conx;
    }

    public function fechar()
    {

        if ($this->conx) {
            $this->conx->close();
        }
    }
}
