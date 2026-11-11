<?php
include_once 'conexao.php';
include_once 'funcoes.php';

$mensagem = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome            = $_POST['nome'] ?? '';
    $marca           = $_POST['marca'] ?? '';
    $modelo          = $_POST['modelo'] ?? '';
    $categoria       = $_POST['categoria'] ?? '';
    $material        = $_POST['material'] ?? '';
    $tamanho         = $_POST['tamanho'] ?? '';
    $peso            = $_POST['peso'] ?? '';
    $tensao          = $_POST['tensao'] ?? '';
    $estoque         = (int)($_POST['estoque'] ?? 0);
    $estoque_minimo  = (int)($_POST['estoque_minimo'] ?? 0);
    $caracteristicas = $_POST['caracteristicas'] ?? '';

    if (gravar_produto($nome, $marca, $modelo, $categoria, $material, $tamanho, $peso, $tensao, $estoque, $estoque_minimo, $caracteristicas)) {
        $mensagem = "<p style='color: green;'>Produto cadastrado com sucesso!</p>";
    } else {
        $mensagem = "<p style='color: red;'>Erro ao cadastrar produto: " . mysqli_error($conexao) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastrar Produto</title>
</head>
<body>
    <h2>Cadastro de Produto</h2>
    <?= $mensagem ?>

    <form action="cadastro.php" method="post">
        Nome: <input type="text" name="nome" required><br><br>
        Marca: <input type="text" name="marca"><br><br>
        Modelo: <input type="text" name="modelo"><br><br>
        Categoria: <input type="text" name="categoria"><br><br>
        Material: <input type="text" name="material"><br><br>
        Tamanho: <input type="text" name="tamanho"><br><br>
        Peso: <input type="text" name="peso"><br><br>
        Tensão: <input type="text" name="tensao"><br><br>
        Estoque: <input type="number" name="estoque" value="0"><br><br>
        Estoque Mínimo: <input type="number" name="estoque_minimo" value="0"><br><br>
        Características:<br>
        <textarea name="caracteristicas" rows="4" cols="40"></textarea><br><br>

        <button type="submit">Cadastrar</button>
        <a href="index.html">Voltar ao Menu</a>
    </form>
</body>
</html>