<?php

include 'conexao.php';

$id = $_POST['id'];
$id2 = $_POST['id2'];
$arma = $_POST['arma'];
$arma2 = $_POST['arma2'];

    // REALIZAR ATAQUE

    $query = "SELECT * FROM personagens WHERE id = '$id'";
    $resultado_query = mysqli_query($conexao, $query);
    $linha = mysqli_fetch_assoc($resultado_query);

    $query_arma = "SELECT * FROM armas WHERE id = '$arma'";
    $resultado_query_arma = mysqli_query($conexao, $query_arma);
    $linha_arma = mysqli_fetch_assoc($resultado_query_arma);


    $query2 = "SELECT * FROM personagens WHERE id = '$id2'";
    $resultado_query2 = mysqli_query($conexao, $query2);
    $linha2 = mysqli_fetch_assoc($resultado_query2);

    $query_arma2 = "SELECT * FROM armas WHERE id = '$arma2'";
    $resultado_query_arma2 = mysqli_query($conexao, $query_arma2);
    $linha_arma2 = mysqli_fetch_assoc($resultado_query_arma2);

    $ataque = rand($linha['ataque'] / 2 , $linha['ataque']) + rand($linha_arma['dano'] / 2 , $linha_arma['dano']);
    $ataqueFinal = $linha2['vida'] - $ataque;

    $update = "UPDATE personagens SET vida = '$ataqueFinal' WHERE id = '$id2'";
    $update_query = mysqli_query($conexao, $update);


    // TURNO INIMIGO

    sleep(4);

    $query_p1 = "SELECT * FROM personagens WHERE id = '$id'";
    $resultado_query_p1 = mysqli_query($conexao, $query_p1);
    $linha_p1 = mysqli_fetch_assoc($resultado_query_p1);

    $query_p2 = "SELECT * FROM personagens WHERE id = '$id2'";
    $resultado_query_p2 = mysqli_query($conexao, $query_p2);
    $linha_p2 = mysqli_fetch_assoc($resultado_query_p2);


    $r = rand(0,4);
    
    if($linha_p2['vida'] > 0){
        if($linha_p2['vida'] < 30 and $linha_p2['cura'] > 0){
            if($r < 4){
                $dano_inimigo = rand($linha2['ataque'] / 2 , $linha2['ataque']) + rand($linha_arma2['dano'] / 2 , $linha_arma2['dano']);
                $dano_final = $linha['vida'] - $dano_inimigo;
                $final_inimigo = "UPDATE personagens SET vida = '$dano_final' WHERE id = '$id'";
                $update_query_inimigo = mysqli_query($conexao, $final_inimigo);
                echo "ataque";
            }
            else{
                $cura_inimigo = $linha_p2['vida'] + 25;
                $final_inimigo = "UPDATE personagens SET vida = '$cura_inimigo' WHERE id = '$id2'";
                $update_query_inimigo = mysqli_query($conexao, $final_inimigo);

                $curas_inimigo = $linha_p2['cura'] - 1;
                $final_inimigo_cura = "UPDATE personagens SET cura = '$curas_inimigo' WHERE id = '$id2'";
                $update_query_cura_inimigo = mysqli_query($conexao, $final_inimigo_cura);
            }
        }else{
            $dano_inimigo = rand($linha2['ataque'] / 2 , $linha2['ataque']) + rand($linha_arma2['dano'] / 2 , $linha_arma2['dano']);
            $dano_final = $linha['vida'] - $dano_inimigo;
            $final_inimigo = "UPDATE personagens SET vida = '$dano_final' WHERE id = '$id'";
            $update_query_inimigo = mysqli_query($conexao, $final_inimigo);
            echo "ataque";
        }
    }

?>