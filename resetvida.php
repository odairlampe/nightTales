<?php

include 'conexao.php';

$id = $_POST['id'];
$id2 = $_POST['id2'];

    //chamada
    $query = "SELECT * FROM personagens WHERE id = '$id'";
    $resultado_query = mysqli_query($conexao, $query);
    $linha = mysqli_fetch_assoc($resultado_query);

    $query2 = "SELECT * FROM personagens WHERE id = '$id2'";
    $resultado_query2 = mysqli_query($conexao, $query2);
    $linha2 = mysqli_fetch_assoc($resultado_query2);

    //variaveis padrao
    $dvida = $linha['dvida'];
    $dvida2 = $linha2['dvida'];

    $dcura2 = $linha2['dcura'];

    //update & query
    $update = "UPDATE personagens SET vida = '$dvida' WHERE id = '$id'";
    $update_query = mysqli_query($conexao, $update);

    

    $update2 = "UPDATE personagens SET vida = '$dvida2' WHERE id = '$id2'";
    $update2_cura = "UPDATE personagens SET cura = '$dcura2' WHERE id = '$id2'";

    $update_query2 = mysqli_query($conexao, $update2);
    $update_query2_cura = mysqli_query($conexao, $update2_cura);
