<?php
include 'conexao.php';

$nome = $_POST['nome'];

$busca = "SELECT * FROM usuarios WHERE nome = '$nome'";
$busca_usuario = mysqli_query($conexao, $busca);
$linha = mysqli_fetch_assoc($busca_usuario);

if($linha['money'] > 0){
$compra = $linha['money'] - 1;
$compra2 = $linha['cura'] + 1;

$update = "UPDATE usuarios SET money = '$compra' WHERE nome = '$nome'";
$update_query = mysqli_query($conexao, $update);

$update2 = "UPDATE usuarios SET cura = '$compra2' WHERE nome = '$nome'";
$update_query2 = mysqli_query($conexao, $update2);
}
else{
    return;
}

?>