<?php

include 'conexao.php';

$id = $_GET['id'];

    $query = "SELECT * FROM personagens WHERE id = '$id'";
    $resultado_query = mysqli_query($conexao, $query);


if($resultado_query == true) {
    while($linha = mysqli_fetch_assoc($resultado_query)){
    echo $linha['cura'];

}
}

?>