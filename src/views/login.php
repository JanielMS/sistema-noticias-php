<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login - Sistema Notícias</title>
</head>

<body>
    <h1>Login</h1>
    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">Credenciais inválidas. Tente novamente.</p>
    <?php endif; ?>
    <form action="index.php?url=login" method="post">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br>

        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" required><br>

        <button type="submit">Login</button>
    </form>
</body>

</html>