<?php


require_once "../../models/usuarios/Usuario.php";
require_once "../../../config/connect_db.php";


class CadastroController
{
    public function index()
    {
        if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
            $conexao = new Conexao();
            $conx = $conexao->iniciar();

            $usuario = new Usuario($conx);
            $usuario->cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"], 1);

            echo "Usuario Cadastrado!";

            $conexao->fechar();
        }
    }
}

$controller = new CadastroController();
$controller->index();
