<?php

class Usuario
{
    private $conx;

    public function __construct($conx)
    {
        $this->conx = $conx;
    }

    public function cadastrar($nome, $email, $senha, $status)
    {
        $senha_cript = md5($senha);

        $sql = "INSERT INTO usuario (nome, email, senha, status) VALUES (?, ?, ?, ?)";
        $prep = $this->conx->prepare($sql);
        $prep->bind_param("sssi", $nome, $email, $senha_cript, $status);
        $prep->execute();
    }
}
