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

    <!-- PAGINA -->
    <!-- menu -->
    <div id="cont2" class="container">
        <div class="box">

            <h1 class="h1End">Parabens, Você conseguiu derrotar todos os inimigos!</h3>

            <button id="menuButton" class="menuEnd" onclick="mainmenu('Deseja voltar para o menu principal?')">Menu</button>


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
    </script>

    <script src="./login.js"></script>
    <script src="./script.js"></script>
    <script src="./script2.js"></script>
</body>

</html>