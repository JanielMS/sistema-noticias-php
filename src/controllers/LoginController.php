<?php
require_once __DIR__ . '/../models/Usuario.php';
require_once __DIR__ . '/../../config/connect_db.php';
include_once __DIR__ . "/../global.php";

class LoginController
{
    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['email']) && isset($_POST['senha'])) {

                $conexao = new Conexao();
                $conx = $conexao->iniciar();

                $usuario = new Usuario($conx);
                $dadosUsuario = $usuario->verificarCredenciais($_POST['email'], $_POST['senha']);

                if ($dadosUsuario) {
                    $_SESSION['codigoUsuario'] = $dadosUsuario['codigo'];
                    $_SESSION['nomeUsuario'] = $dadosUsuario['nome'];
                    redirectAfter("index.php?url=usuarios", 1);
                } else {

                    redirectAfter("index.php?error=1", 0);
                }

                $conexao->fechar();
            } else {
                redirectAfter("index.php?error=1", 0);
            }
        } else {
            include __DIR__ . "/../views/login.php";
        }
    }
    public function logout()
    {
        session_unset();
        session_destroy();
        redirectAfter("index.php", 1);
    }
}
