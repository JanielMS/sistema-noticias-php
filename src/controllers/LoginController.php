<?php


require_once "../models/Usuario.php";


class LoginController
{
    public function index()
    {
        if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
            require_once "../../config/connect_db.php";
            $usuario = new Usuario($conx);
            $usuario->cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"], 1);

            echo "Usuario Cadastrado!";
        }
    }
}

$controller = new LoginController();
$controller->index();
