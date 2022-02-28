<?php
include 'conexao.php';

$nome = $_POST['nome'];

$busca = "SELECT * FROM usuarios WHERE nome = '$nome'";
$busca_usuario = mysqli_query($conexao, $busca);

$linha = mysqli_fetch_assoc($busca_usuario);

echo $linha['permissao'];

?>