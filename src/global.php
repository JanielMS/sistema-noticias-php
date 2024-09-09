<?php
// Verifica se o referer está definido

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function getPreviousUrl()
{
    if (isset($_SERVER['HTTP_REFERER'])) {
        return $_SERVER['HTTP_REFERER'];
    } else {
        // Define uma URL padrão caso não haja referer
        return '/programacao-web/projetos/projetos-php/sistema-noticias/index.php';
    }
}

function redirectAfter($path, $seconds = 3)
{
    $baseUrl = 'http://localhost/programacao-web/projetos/projetos-php/sistema-noticias/';
    $fullUrl = $baseUrl . ltrim($path, '/');

    if ($seconds > 0) {
        echo "<meta http-equiv='refresh' content='{$seconds};url={$fullUrl}'>";
    } else {
        header("Location: {$fullUrl}");
        exit();
    };
}

function logado()
{
    return isset($_SESSION['codigoUsuario']);
}

function loginNecessario()
{
    if (!logado()) {
        echo "Acesso Restrito!";
        redirectAfter("", 3);
    }
}
