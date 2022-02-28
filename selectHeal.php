<?php

include 'conexao.php';

$nome = $_POST['nome'];

    $query = "SELECT * FROM usuarios WHERE nome = '$nome'";
    $resultado_query = mysqli_query($conexao, $query);

    $linha = mysqli_fetch_assoc($resultado_query);

    echo $linha['cura'];

?>