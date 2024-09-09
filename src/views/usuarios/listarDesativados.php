<?php
$title = "Listar Usuários Desativados";

ob_start();
?>
<h1>Listar Usuarios Desativados</h1>
<?php if (isset($usuarios) && !empty($usuarios)): ?>
    <table border="1">
        <thead>
            <th>Codigo</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Senha</th>
            <th>Status</th>
        </thead>
        <tbody>

            <?php foreach ($usuarios as $usuario): ?>
                <tr>
                    <td><?php echo htmlspecialchars($usuario['codigo']) ?></td>
                    <td><?php echo htmlspecialchars($usuario['nome']) ?></td>
                    <td><?php echo htmlspecialchars($usuario['email']) ?></td>
                    <td><?php echo htmlspecialchars($usuario['senha']) ?></td>
                    <td><?php echo htmlspecialchars($usuario['status']) ?></td>
                    <td>
                        <form action="index.php?url=usuarios/reativar" method="post">
                            <input type="hidden" name="uCodigo" value=<?php echo htmlspecialchars($usuario['codigo']) ?>>
                            <button>Ativar</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    <?php else: ?>
        <p>Nenhum usuário ativo encontrado.</p>
    </table>
<?php endif; ?>
<?php
$content = ob_get_clean();

include __DIR__ . "/layout.php";
?>