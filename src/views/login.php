<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistema Notícias</title>
</head>

<body>
    <form action="../controllers/LoginController.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email"><br>
        <label for="senha">Senha:</label>  

        <input type="password" name="senha" id="senha"><br>
        <button type="submit">Cadastrar</button>  

    </form>
</body>

</html>