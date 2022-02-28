<?php

include 'conexao.php';

$nome = $_POST['nome'];
$id = $_POST['id'];
$id2 = $_POST['id2'];


    // Curar

    $query = "SELECT * FROM usuarios WHERE nome = '$nome'";
    $resultado = mysqli_query($conexao, $query);
    $linha = mysqli_fetch_assoc($resultado);

    $query_p1 = "SELECT * FROM personagens WHERE id = '$id'";
    $resultado_p1 = mysqli_query($conexao, $query_p1);
    $linha_p1 = mysqli_fetch_assoc($resultado_p1);

    if($linha['cura'] > 0){
        $curas = $linha['cura'] - 1;
        $curar = $linha_p1['vida'] + 25;
        if($linha_p1['vida'] == 100){
            return;
        }
        if($linha_p1['vida'] <= 75){
            $update = "UPDATE personagens SET vida = '$curar' WHERE id = '$id'";
            $update_query = mysqli_query($conexao, $update);
            //gastar atadura
            $update_cura = "UPDATE usuarios SET cura = '$curas' WHERE nome = '$nome'";
            $update_query_cura = mysqli_query($conexao, $update_cura);
            }
        else{
            $update = "UPDATE personagens SET vida = 100 WHERE id = '$id'";
            $update_query = mysqli_query($conexao, $update);
            //gastar atadura
            $update_cura = "UPDATE usuarios SET cura = '$curas' WHERE nome = '$nome'";
            $update_query_cura = mysqli_query($conexao, $update_cura);
        }

    // TURNO INIMIGO

        sleep(4);

        $query_p1 = "SELECT * FROM personagens WHERE id = '$id'";
        $resultado_query_p1 = mysqli_query($conexao, $query_p1);
        $linha_p1 = mysqli_fetch_assoc($resultado_query_p1);

        $query_p2 = "SELECT * FROM personagens WHERE id = '$id2'";
        $resultado_query_p2 = mysqli_query($conexao, $query_p2);
        $linha_p2 = mysqli_fetch_assoc($resultado_query_p2);


        $r = rand(0,4);
        
        if($linha_p2['vida'] < 30 and $linha_p2['cura'] > 0){
            if($r < 4){
                $dano_inimigo = $linha_p1['vida'] - (rand($linha_p2['ataque'] / 2 , $linha_p2['ataque']));
                $final_inimigo = "UPDATE personagens SET vida = '$dano_inimigo' WHERE id = '$id'";
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
            $dano_inimigo = $linha_p1['vida'] - (rand($linha_p2['ataque'] / 2 , $linha_p2['ataque']));
            $final_inimigo = "UPDATE personagens SET vida = '$dano_inimigo' WHERE id = '$id'";
            $update_query_inimigo = mysqli_query($conexao, $final_inimigo);
            echo "ataque";
        }
    }




?>