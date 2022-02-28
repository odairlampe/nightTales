<?php
include 'conexao.php';

$nome = $_POST['nome'];

$busca = "SELECT * FROM usuarios WHERE nome = '$nome'";
$busca_usuario = mysqli_query($conexao, $busca);
$linha = mysqli_fetch_assoc($busca_usuario);

$money = $linha['money'] + 2;

$update = "UPDATE usuarios SET money = '$money' WHERE nome = '$nome'";
$update_query = mysqli_query($conexao, $update);

?>