<?php
$title = "Visualiar Usuário";

ob_start();
?>
<h1><?php $title ?></h1>
<?php if (isset($vUsuario) && !empty($vUsuario)): ?>
    <fieldset>
        <legend>Código</legend>
        <?php echo $vUsuario['codigo']; ?>
    </fieldset>
    <fieldset>
        <legend>Nome</legend>
        <?php echo $vUsuario['nome']; ?>
    </fieldset>
    <fieldset>
        <legend>E-mail</legend>
        <?php echo $vUsuario['email']; ?>
    </fieldset>
    <fieldset>
        <legend>Senha</legend>
        <?php echo $vUsuario['senha']; ?>
    </fieldset>
    <fieldset>
        <legend>Status</legend>
        <?php echo ($vUsuario['status'] == 1) ? "Ativado" : "Desativado"; ?>
    </fieldset>
    <p><a href="index.php?url=usuarios/listar">Voltar</a></p>
<?php else: ?>
    <p>Nenhum usuário encontrado.</p>
<?php endif; ?>
<?php
$content = ob_get_clean();

include __DIR__ . "/layout.php";
?>