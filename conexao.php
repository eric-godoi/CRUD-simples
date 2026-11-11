<?php
$servidor = "localhost";
$usuario  = "root";
$senha    = "123456";
$banco    = "loja_materiais";

$conexao = mysqli_connect($servidor, $usuario, $senha, $banco);

if (!$conexao) {
    die("Falha na conexão: " . mysqli_connect_error());
}

mysqli_set_charset($conexao, "utf8mb4");
?>