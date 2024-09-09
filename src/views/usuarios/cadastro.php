<?php
$title = "Cadastro";
ob_start();
?>

<h2>Cadastro de Usuários</h2>
<form action="index.php?url=usuarios" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome"><br>
    <label for="email">Email:</label>
    <input type="email" name="email" id="email"><br>
    <label for="senha">Senha:</label>  
    <input type="password" name="senha" id="senha"><br>

    <button type="submit">Cadastrar</button>  
</form>
<?php
$content = ob_get_clean();

include __DIR__ . "/layout.php";
?>