<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="/programacao-web/projetos/projetos-php/sistema-noticias/"> <!-- Define a URL base -->
    <title><?php echo $title . " - Sistema de Noticias" ?? 'Sistema de Noticas'; ?></title>

    <style>
        header {
            margin: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>

<body>
    <header>
        <h2>SisNoticias</h2>
        <nav>
            <a href="index.php">Inicio</a> |
            <a href="index.php?url=usuarios/listar">Listar Usuários</a> |
            <a href="index.php?url=usuarios/desativados">Listar Usuários Desativados</a> |
            <a href="index.php?url=logout">Sair</a>

        </nav>
    </header>
    <main>
        <?php echo $content; ?>
    </main>
    <footer>
        <p>&copy; <?php echo date("Y"); ?> Sistema de Noticias</p>
    </footer>
</body>

</html>