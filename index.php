<?php

include 'conexao.php';
session_start();

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

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.11.1/dist/css/uikit.min.css" />

    <link rel="stylesheet" href="./fakeLoader.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css">
    <link rel="stylesheet" href="./style.css">

    <title>NightTales</title>
</head>
<body>

<div class="fakeLoader"></div>

<!-- login -->
<div id="cont1" class="container">
  <div class="box">
    
    <img class="logo" src="./assets/logo.png" alt="imagem do logo">
    <img class="characters-background" src="./assets/box.png" alt="sombra de personagens">

    <div class="box-buttons">
      <form action="logar.php" method="POST">
        <input class="input-login" name="nome" type="text" placeholder="Usuario">
        <input class="input-login" name="senha" type="text" placeholder="Senha">
        <input id="login" class="input-button" type="submit" value="Login">
      </form>
    </div>
    <div>
      <p class="cadastroP" id="verificarLogin" style="display: none;"></p>
      <p class="cadastroP">Ainda não possui login?</p>
      <input id="sidecall" class="input-button" type="button" value="Clique aqui">
      
        <div class="ui sidebar inverted vertical menu sidemenu">
          <div class="sideinputs">
            <input class="sideCadastro" type="text" placeholder="Nome" name="cNome">
            <input class="sideCadastro" type="text" placeholder="Senha" name="cSenha">
            <input class="sideCadastro" type="text" placeholder="Idade" name="cIdade">
            <input class="sideCadastro" type="text" placeholder="Cidade" name="cCidade">
            <input class="sideButton" id="cadastro" type="button" value="Cadastrar">
            <p id="avisocadastro"></p>
          </div>
        </div>
    </div>
  </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
<script src="./fakeLoader.min.js"></script>

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