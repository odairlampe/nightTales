<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./fakeLoader.min.css">
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./gameStyle.css">

    <title>NightTales</title>
</head>
<body>
    
<div class="fakeLoader"></div>
<!-- variaveis -->
<span style="display:none">
    <p id="verificar"></p>
</span>
<!-- tela de jogo -->
<div class="container">
    <div class="containerIn">
        <div class="items">
            <div class="items-heal">

                <div id="specialBar" class="specialBar">
                    <div id="specialBar-in"class="specialBar-in"></div>
                </div>

                <img class="img-button special action" src="./assets/special.png" alt="special" onclick="actions(this)">
                <img class="img-button action2 hide">

                <img class="img-button ataque action" alt="ataque" onclick="actions(this)">
                <img class="img-button action2 hide">

                <img class="img-button cura action" src="./assets/atadura.png" alt="cura" onclick="actions(this)">
                <img class="img-button action2 hide" src="./assets/atadura.png">

                <p>x</p>
                <p id="heal"></p>
            </div>
            <div class="items-heal">
                <img class="img-button-enemy">
                <img class="img-button-enemy" src="./assets/atadura.png" alt="imagem de atadura">
                <p>x</p>
                <p id="heal2"></p>
            </div>
        </div>

        <div class="fight-box">
            <div>
                <img id="imgP1" alt="imagem do jogador 1">
            </div>
            <div>
                <img id="imgP2" alt="imagem do jogador 2">
            </div>
        </div>

        <div class="health-bar">
            <div>
                <p id="health"></p>

                <div class="bar">
                    <div id="bar-in">
                    </div>
                </div>
            </div>
            <button class="menu-button" onclick="mainmenu('O PROGRESSO SERÁ PERDIDO! DESEJA CONTINUAR?')">Encerrar batalha</button>
            <div>
                <p id="health2"></p>

                <div class="bar">
                    <div id="bar-in2">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- tela de vitoria -->
<div class="containerIn">
    <div class="winBox" style="display:none">
        <div>
            <p class="aviso-vencedor">Voce venceu!</p>
            <img id="imgP1" alt="imagem do jogador 1">
        </div>
        <div class="winnerInfo">
            <h5 style="font-size: 2.7vw">✎ Informações da partida</h5>
            <h5 id="ataquesRealizados">Ataques Realizados: error</h5>
            <h5 id="ataquesRecebidos">Ataques Recebidos: error</h5>
            <button id="levelButton" class="levelButton">Proximo inimigo</button>
            <button id="menuButton" class="levelButton" onclick="mainmenu('O PROGRESSO SERÁ PERDIDO! DESEJA CONTINUAR?')">Menu</button>
        </div>
    </div>
</div>

<!-- tela de derrota -->
<div class="containerIn">
    <div class="loseBox" style="display:none">
        <div>
            <p class="aviso-vencedor">CPU venceu!</p>
            <img id="imgP2" alt="imagem do jogador 2">
        </div>
        <div class="winnerInfo">
            <h5 id="ataquesRealizados2">Ataques Realizados: error</h5>
            <h5 id="ataquesRecebidos2">Ataques Recebidos: error</h5>
            <button id="loserButton" class="loserButton">Menu principal</button>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="./fakeLoader.min.js"></script>

<script>
   $.fakeLoader({
    spinner: "spinner3", 
    bgColor: "#303030",
    timeToHide: 1000
   });
</script>
<script>
  var reset1 = function(){
        $.ajax({
            url:'reset.php',
            type:'POST',
            data:{
                id: localStorage.char,
                id2: localStorage.char2
            },
        });
    };
reset1();
</script>
<script>
  $(document).ready(function(){
    $("#lojaButton").on('click', function(){
      $('.long.modal.loja')
      .modal({
        centered: false
    })
    .modal('show')
    })
  })
</script>

<script src="./script.js"></script>
<script src="./script2.js"></script>
</body>
</html>