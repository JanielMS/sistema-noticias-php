<?php
require __DIR__ . "/../models/Usuario.php";
require __DIR__ . "/../../config/connect_db.php";
require_once __DIR__ . "/../global.php";



class UsuarioController
{
    public function criar()
    {
        loginNecessario();
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['senha'])) {
                $conexao = new Conexao();
                $conx = $conexao->iniciar();

                $usuario = new Usuario($conx);

                if ($usuario->exiteUsuario($_POST["email"])) {
                    echo "Usuário já cadastrado!";
                } else {

                    $usuario->cadastrar($_POST["nome"], $_POST["email"], $_POST["senha"], 1);


                    echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
                    redirectAfter(getPreviousUrl());
                }
                $conexao->fechar();
            } else {
                echo "<h3>Tentativa de acesso indevido!</h3>";
                echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
                redirectAfter(getPreviousUrl());
            }
        } else {
            include __DIR__ . "/../views/usuarios/cadastro.php";
        }
    }

    public function listar()
    {
        loginNecessario();

        $conexao = new Conexao();
        $conx = $conexao->iniciar();

        $usuario = new Usuario($conx);
        $usuarios = $usuario->listarAtivos();

        $conexao->fechar();

        include __DIR__ . "/../views/usuarios/listar.php";
    }

    public function editar()
    {
        if (!isset($_POST["uCodigo"])) {
            echo "<h3>Tentativa de acesso indevido!</h3>";
            echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
            redirectAfter("index.php?url=usuarios/listar");
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $conexao = new Conexao();
            $conx = $conexao->iniciar();

            $usuario = new Usuario($conx);
            $usuarioEditar = $usuario->selecionarUsuarioPorCod($_POST['uCodigo']);

            $conexao->fechar();
            include __DIR__ . "/../views/usuarios/editar.php";
        }
    }
    public function atualizar()
    {
        if (!isset($_POST["uCodigo"])) {
            echo "<h3>Tentativa de acesso indevido!</h3>";
            echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
            redirectAfter("index.php?url=usuarios/listar");
        }
        if (isset($_POST['uCodigo']) && isset($_POST['nome']) && isset($_POST['email'])) {
            $conexao = new Conexao();
            $conx = $conexao->iniciar();

            $usuario = new Usuario($conx);
            $usuario->atualizar($_POST['uCodigo'], $_POST['nome'], $_POST['email']);

            $conexao->fechar();
            echo " Sucesso!";
            redirectAfter("index.php?=usuarios/listar");
        } else {
            echo "<h3>Dados inválidos!</h3>";
            echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
        }
    }

    public function desativar()
    {
        if (!isset($_POST["uCodigo"])) {
            echo "<h3>Tentativa de acesso indevido!</h3>";
            echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
            redirectAfter(getPreviousUrl());
        }
        $conexao = new Conexao();
        $conx = $conexao->iniciar();

        $usuario = new Usuario($conx);
        $usuario->desativar($_POST["uCodigo"]);

        $conexao->fechar();
        echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
        redirectAfter(getPreviousUrl());
    }

    public function desativados()
    {
        $conexao = new Conexao();
        $conx = $conexao->iniciar();

        $usuario = new Usuario($conx);
        $usuarios = $usuario->listarDesativados();

        $conexao->fechar();

        include __DIR__ . "/../views/usuarios/listarDesativados.php";
    }
    public function reativar()
    {
        if (!isset($_POST["uCodigo"])) {
            echo "<h3>Tentativa de acesso indevido!</h3>";
            echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
            redirectAfter(getPreviousUrl());
        }
        $conexao = new Conexao();
        $conx = $conexao->iniciar();

        $usuario = new Usuario($conx);
        $usuario->ativar($_POST["uCodigo"]);

        $conexao->fechar();
        echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
        redirectAfter(getPreviousUrl());
    }
    public function visualizar()
    {
        if (!isset($_POST["uCodigo"])) {
            echo "<h3>Tentativa de acesso indevido!</h3>";
            echo "<a href='" . getPreviousUrl() . "'>Voltar</a>";
            redirectAfter("index.php?url=usuarios/listar");
        }
        if ($_SERVER["REQUEST_METHOD"] === "POST") {

            $conexao = new Conexao();
            $conx = $conexao->iniciar();

            $usuario = new Usuario($conx);
            $vUsuario = $usuario->selecionarUsuarioPorCod($_POST['uCodigo']);

            $conexao->fechar();
            include __DIR__ . "/../views/usuarios/visualizar.php";
        }
    }
}
