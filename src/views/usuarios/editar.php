<?php
$title = "Editar Usuário";

ob_start();
?>
<h1><?php $title ?></h1>
<?php if (isset($usuarioEditar) && !empty($usuarioEditar)): ?>
    <form action="index.php?url=usuarios/atualizar" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" value="<?php echo $usuarioEditar['nome'] ?>"><br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="<?php echo $usuarioEditar['email'] ?>"><br>
        <input type="hidden" name="uCodigo" value="<?php echo $usuarioEditar['codigo'] ?>">

        <button type="submit">Atualizar</button>  
    </form>
<?php else: ?>
    <p>Nenhum usuário encontrado.</p>
<?php endif; ?>
<?php
$content = ob_get_clean();

include __DIR__ . "/layout.php";
?>