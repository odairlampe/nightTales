<?php

include 'conexao.php';
include 'session.php';

$query_select = "SELECT * FROM personagens";
$resultado_query_character = mysqli_query($conexao, $query_select);

$query_weapon = "SELECT * FROM armas";
$resultado_query_weapon = mysqli_query($conexao, $query_weapon);

$query_user = "SELECT * FROM usuarios";
$resultado_query_user = mysqli_query($conexao, $query_user);




?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/css/uikit.min.css" />

    <link rel="stylesheet" href="./fakeLoader.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="./style.css">

    <title>NightTales</title>
</head>
<body>

<div class="fakeLoader"></div>

<!-- MODAL SELECIONAR PERSONAGEM-->
<div id="modalBody" class="ui first coupled modal">
      <div class="description">
        <h3>Escolha seu personagem</h3>
        <div class="characters">

          <?php 
          $counter = 0;
          while($linha = mysqli_fetch_assoc($resultado_query_character)){
            $counter += 1;
            ?>
            <img class="selectCharacter button" onclick="select(this)" src="./assets/characters/<?php echo $counter; ?>.png" alt="<?php echo $counter;?>">
          

            <p class="cInfo">
              <strong><?php echo $linha['nome'];?></strong><br>
              <strong> Ataque: </strong><?php echo $linha['ataque'];?><br>
              <strong> Defesa: </strong><?php echo $linha['defesa'];?><br>
            </p>
    
            <?php } ?>

        </div>
      </div>
</div>

<!-- MODAL SELECIONAR ARMA -->
<div id="modalBody2" class="ui small second coupled modal">
      <div class="description">
        <h3>Escolha sua arma</h3>
        <div class="characters">

          <?php
          $counter2 = 0;
          while($linha2 = mysqli_fetch_assoc($resultado_query_weapon)){
            $counter2 += 1;
            ?>
            <a href="./game.php"><img class="selectWeapon" onclick="selectW(this)" src="./assets/weapons/<?php echo $counter2; ?>.png" alt="<?php echo $counter2;?>"></a>


            <p class="cInfoW">
              <strong><?php echo $linha2['nome'];?></strong><br>
              <strong> Dano: </strong><?php echo $linha2['dano'];?><br>
              <strong> Especial: </strong><?php echo $linha2['especial'];?><br>
            </p>

            <?php } ?>

        </div>
      </div>
</div>

<!-- MODAL LOJA -->
<div id="modalBody" class="ui long modal loja">
  <div class="description-loja">
    <div class="money-body">
      <h3 id="money" class="moneyP"></h3>
      <img class="earsImg" src="./assets/ears.png">
    </div>
    <div class="buy-body">
      <div class="atadura">
        <img class="imgComprar"src="./assets/atadura.png">
        <p class="pComprar">1 orelha</p>
        <p id="comprarAtadura" class="buyButton">COMPRAR</p>
      </div>
    </div>   
  </div>
</div>

<!-- MODAL INSTRUÇÕES -->
<div id="modalBody" class="ui long modal instructions">
  <div class="description-loja">
    <div class="instructions-body">
      <h3 class="comoJogar">Como jogar</h3>
    </div>
    <div class="instructions-images">
      <img src="./assets/instructions/1.png">
        <p>1. Barra de fúria. <br>
          Ao tomar alguns golpes, seu personagem começara a ficar furioso.
          Quando a barra de fúria estiver completamente cheia, libere a fúria no seu inimigo
          clicando no item especial ao lado.
        </p>
        <p>2. Arma equipada<br>
          Clique na sua arma equipada para liberar um ataque no inimigo.
          O dano é calculado a partir do poder de ataque do seu personager e sua arma equipada.
        </p>
        <p>3. Ataduras<br>
          As ataduras serão o item que te manterá vivo durante a batalha.
          Clique em uma atadura para curar imediatamente 25% de vida. Mas cuidado, curar consome um turno de ataque,
          portanto saiba a hora certa de usá-las.
        </p>
        <p>4. Barra de vida<br>
          A barra mostra sua saúde atual, não deixe ela esvaziar!
        </p>
      <img src="./assets/instructions/2.png">
        <p>5. Orelhas<br>
          As orelhas são seu pagamento por derrotar um inimigo.
          Receba 2 orelhas ao derrotar qualquer inimigo.
        </p>
        <p>6. Compras<br>
          É possivel trocar suas orelhas por ataduras.
          Ao clicar em comprar, você estará recebendo 1 atadura em troca de 1 orelha.
        </p>
        <img src="./assets/instructions/3.png">
        <p>7. Informações da partida<br>
          Após cada luta, será mostrado um pequeno resumo de golpes aplicados durante a batalha.
        </p>
        <p>8. Passando de nível<br>
        Após cada vitória, você será desafiado por um novo inimigo.
        Além do inimigo derrotado ser jogável na próxima vez que iniciar um novo jogo, sua arma também ficará disponível
        para ser jogado com qualquer personagem<br>
        Continue ganhando para desbloquear todos personagens com suas respectivas armas.
        </p>
      <img src="./assets/instructions/4.png">
        <p>9. Derrota<br>
          Você foi derrotado?<br>
          Não desanime! <br>
          Vá até a loja comprar mais ataduras, escolha com sabedoria seu personagem e sua arma, e tente novamente!
        </p>
        <br>
        <br>
        <br>
        <p>Atenção: <br>
        Este jogo foi desenvolvido apenas para uso discente, não possuo os direitos de nenhum som ou personagem usado.<br>
        https://github.com/oda07
        </p>
    </div>   
  </div>   
</div>

<!-- PAGINA -->
<!-- menu -->
<div id="cont2" class="container">
    <div class="box">

      <div class="avisos">
        <button id="deslogar" class="input-button">Deslogar</button>
      </div>
        
      <img class="logo" src="./assets/logo.png" alt="imagem do logo">
      <img class="characters-background" src="./assets/box.png" alt="sombra de personagens">

      <div class="box-buttons">
        <div class="buttons">
          <button id="newgame">Novo jogo</button>
          <button id="loja">Loja</button>
          <button id="instructions">Instruções</button>
          <p class="input-button" id="verificarPermissao" style="display: none;"></p>
        </div>
      </div>

    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<script src="./fakeLoader.min.js"></script>

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/js/uikit-icons.min.js"></script>

<script>
   $.fakeLoader({
    spinner: "spinner3", 
    bgColor: "#303030",
    timeToHide: 1000
   });

    $("#sidecall").on('click', function(){
      $('.ui.sidebar')
      .sidebar('toggle');
    });
</script>

<script>
    $('.coupled.modal')
  .modal({
    allowMultiple: false
  })
;
    // attach events to buttons
    $('.second.modal')
    .modal('attach events', '.first.modal .button')
    ;
    // show first now
$(document).ready(function(){
  $("#newgame").on('click', function(){
    $('.first.modal')
    .modal('show');
  })
});

</script>
<script>
  $(document).ready(function(){
    $("#loja").on('click', function(){
      $('.long.modal.loja')
      .modal({
        centered: false
    })
    .modal('show')
    })
  })
</script>
<script>
  $(document).ready(function(){
    $("#instructions").on('click', function(){
      $('.long.modal.instructions')
      .modal({
        centered: false
    })
    .modal('show')
    })
  })
</script>

<script>
  var reset2 = function(){
        $.ajax({
            url:'reset.php',
            type:'POST',
            data:{
                id: localStorage.char,
                id2: localStorage.char2
            },
        });
    };
reset2();
</script>

<script>
function recarregar(){
  if(!window.location.hash) {
    window.location = window.location + '#loaded';
    setTimeout(() => {
      window.location.reload();
    }, 1000);
  }
}
recarregar();

$("#login").on('click', function(){
  window.location.href = "./index.php"
});


</script>

<script src="./login.js"></script>
<script src="./script.js"></script>
<script src="./script2.js"></script>
</body>
</html>