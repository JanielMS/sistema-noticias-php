<?php

class Usuario
{
    private $conx;

    public function __construct($conx)
    {
        $this->conx = $conx;
    }
    public function verificarCredenciais($email, $senha)
    {
        // $senha_cript = md5($senha);
        $senha_cript = $senha;
        $p_query = $this->conx->prepare("SELECT * FROM usuario WHERE email = ? AND senha = ? AND status = 1");
        $p_query->bind_param('ss', $email, $senha_cript);
        $p_query->execute();

        $result = $p_query->get_result();
        if ($result->num_rows > 0) {

            return $result->fetch_assoc();
        }
        return false;
    }

    public function cadastrar($nome, $email, $senha, $status)
    {
        $senha_cript = md5($senha);

        $sql = "INSERT INTO usuario (nome, email, senha, status) VALUES (?, ?, ?, ?)";
        $p_query = $this->conx->prepare($sql);
        $p_query->bind_param("sssi", $nome, $email, $senha_cript, $status);

        if ($p_query->execute()) {
            echo "Usuário Cadastrado com sucesso.";
        } else {
            echo "Falha em cadastrar o usuário: " . $p_query->error;
        }
        $p_query->close();
    }

    public function exiteUsuario($email)
    {
        $p_query = $this->conx->prepare("SELECT codigo FROM usuario WHERE email = ?");

        if ($p_query) {
            $p_query->bind_param('s', $email);
            $p_query->execute();

            $p_query->store_result();

            if ($p_query->num_rows() > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            die("Erro na preparação da query: " . $this->conx->error);
        }
        $p_query->close();
    }

    public function listarAtivos()
    {
        $p_query = $this->conx->prepare("SELECT * FROM usuario WHERE status = 1");
        $p_query->execute();

        $result = $p_query->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }

    public function desativar($codigo)
    {
        $p_query = $this->conx->prepare("UPDATE usuario SET status = 0 WHERE codigo = ?");
        if (!$p_query) {
            die("Erro na preparação da query: " . $this->conx->error);
        }

        $p_query->bind_param('i', $codigo);
        if ($p_query->execute()) {
            echo "Usuário Desativado.";
        } else {
            echo "Falha em desativar o usuário: " . $p_query->error;
        }

        $p_query->close();
    }
    public function listarDesativados()
    {
        $p_query = $this->conx->prepare("SELECT * FROM usuario WHERE status = 0");
        $p_query->execute();

        $result = $p_query->get_result();

        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return [];
        }
    }
    public function ativar($codigo)
    {
        $p_query = $this->conx->prepare("UPDATE usuario SET status = 1 WHERE codigo = ?");
        if (!$p_query) {
            die("Erro na preparação da query: " . $this->conx->error);
        }

        $p_query->bind_param('i', $codigo);
        if ($p_query->execute()) {
            echo "Usuário Ativado.";
        } else {
            echo "Falha em ativar o usuário: " . $p_query->error;
        }

        $p_query->close();
    }
    public function atualizar($codigo, $nome, $email)
    {
        $p_query = $this->conx->prepare("UPDATE usuario SET nome = ?, email = ? WHERE codigo = ?");

        if (!$p_query) {
            die("Erro na preparação da query: " . $this->conx->error);
        }
        $p_query->bind_param("ssi", $nome, $email, $codigo);
        if ($p_query->execute()) {
            echo "Usuário Atualizado.";
        } else {
            echo "Falha em atualizar o usuário: " . $p_query->error;
        }

        $p_query->close();
    }

    public function selecionarUsuarioPorCod($codigo)
    {
        $p_query = $this->conx->prepare("SELECT * FROM usuario WHERE codigo = ?");

        if ($p_query) {
            $p_query->bind_param('i', $codigo);
            $p_query->execute();


            $result = $p_query->get_result();

            if ($result->num_rows > 0) {
                return $result->fetch_assoc();
            } else {
                return null;
            }
        } else {
            die("Erro na preparação da query: " . $this->conx->error);
        }
        $p_query->close();
    }
}
