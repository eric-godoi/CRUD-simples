<?php
include_once 'conexao.php';
include_once 'funcoes.php';

$resultado = listarProdutos($conexao);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Produtos</title>
</head>
<body>
    <h1>Lista de Produtos</h1>

    <a href="cadastro.php">Cadastrar novo produto</a>
    <br><br>

    <?php if (mysqli_num_rows($resultado) > 0): ?>
        <table border="1" cellpadding="8" cellspacing="0">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>Modelo</th>
                    <th>Categoria</th>
                    <th>Material</th>
                    <th>Tamanho</th>
                    <th>Peso</th>
                    <th>Tensão</th>
                    <th>Estoque</th>
                    <th>Estoque Mínimo</th>
                    <th>Características</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($produto = mysqli_fetch_assoc($resultado)): ?>
                    <tr>
                        <td><?= $produto['id'] ?></td>
                        <td><?= htmlspecialchars($produto['nome']) ?></td>
                        <td><?= htmlspecialchars($produto['marca']) ?></td>
                        <td><?= htmlspecialchars($produto['modelo']) ?></td>
                        <td><?= htmlspecialchars($produto['categoria']) ?></td>
                        <td><?= htmlspecialchars($produto['material']) ?></td>
                        <td><?= htmlspecialchars($produto['tamanho']) ?></td>
                        <td><?= htmlspecialchars($produto['peso']) ?></td>
                        <td><?= htmlspecialchars($produto['tensao']) ?></td>
                        <td><?= htmlspecialchars($produto['estoque']) ?></td>
                        <td><?= htmlspecialchars($produto['estoque_minimo']) ?></td>
                        <td><?= htmlspecialchars($produto['caracteristicas']) ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>Nenhum produto cadastrado.</p>
    <?php endif; ?>
</body>
</html>
