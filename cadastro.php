<?php

include 'conexao.php';

$nome = $_POST['nome'];
$senha = $_POST['senha'];
$idade = $_POST['idade'];
$cidade = $_POST['cidade'];

$busca = "SELECT * FROM usuarios";
$busca_usuario = mysqli_query($conexao, $busca);
$linha = mysqli_fetch_assoc($busca_usuario);

if($nome == $linha['nome']){
    echo "Nome de usuario já cadastrado, por favor use um nome diferente!";
}else{
    $insere = "INSERT INTO usuarios (nome, senha, idade, cidade) VALUES ('$nome', '$senha', '$idade', '$cidade')";
    $query = mysqli_query($conexao, $insere);
    
    if(!$query){
        echo "Ocorreu um erro durante o registro. por favor, tente novamente!";
    }
    else{
        echo "Cadastro realizado!";
    }
}




?>