<?php
include 'conexao.php';

$nome = $_POST['nome'];
$permissao = $_POST['permissao'];

$busca = "SELECT * FROM usuarios WHERE nome = '$nome'";
$busca_usuario = mysqli_query($conexao, $busca);
$linha = mysqli_fetch_assoc($busca_usuario);


if($permissao >= $linha['permissao']){
    $update = "UPDATE usuarios SET permissao = '$permissao' WHERE nome = '$nome'";
    $update_query = mysqli_query($conexao, $update);
}

?>