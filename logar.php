<?php
include 'conexao.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];

$busca = "SELECT * FROM usuarios WHERE nome = '$nome' and senha = '$senha'";
$busca_usuario = mysqli_query($conexao, $busca);

if(mysqli_num_rows($busca_usuario) != 1){
   header('Location:./index.php');
}
 else {
    header('Location:./home.php');
 }