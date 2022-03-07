// LOCALSTORAGE PERSONAGEM

function select(e){

    let char = parseInt(e.alt, 10);
    let char2 = 1;
    
    localStorage.char = char;

    if(localStorage.char == char2){
        char2 += 1
        localStorage.char2 = char2;
    }
    else{
        localStorage.char2 = char2;
    }
}

// LOCALSTORAGE ARMA

function selectW(e){
    let weapon = e.alt;
    localStorage.weapon = weapon;

    localStorage.weapon2 = localStorage.char2;
}

// VERIFICANDO VIDA PARA FIM DE JOGO
var endgame = ()=>{
    setTimeout(() => {
        let health = document.getElementById("health");
        let health2 = document.getElementById("health2");
        let container = document.getElementsByClassName("container");
        let defaultContainer = container[0].innerHTML;
        //tela de vitoria
        if(health2.innerHTML <= 0){
            container[0].innerHTML = '<img style="height: 90vh; box-shadow: 0px 0px 100px black;" src="https://is.gd/nighttales_' + localStorage.char + '">';
            
            setTimeout(() => {
                container[0].innerHTML = defaultContainer;
                container[0].style.display = "none";
                winBox[0].style.display = "";

            }, 5000);

            // informacoes da partida
            let winBox = document.getElementsByClassName("winBox");
            winBox[0].style.backgroundImage = "url('./assets/backgrounds/" + localStorage.char2 + ".jpg')";

            let ataquesRealizados = document.getElementById("ataquesRealizados");
            let ataquesRecebidos = document.getElementById("ataquesRecebidos");

            ataquesRealizados.innerHTML = "Ataques Realizados: " + cliqueAtaque;
            ataquesRecebidos.innerHTML = "Ataques Recebidos: " + cliqueRecebe;

            // desbloquear inimigo derrotado
            localStorage.perms = localStorage.char2;
            let permissao = parseInt(localStorage.perms, 10);

            $.ajax({
                url:'permissoesadd.php',
                type:'POST',
                data:{
                    nome: localStorage.nome,
                    permissao: permissao
                },
            });

            //receber money por ganhar
            $.ajax({
                url:'moneyadd.php',
                type:'POST',
                data:{
                    nome: localStorage.nome,
                },
            });

            //resetar vidas (curas nao resetam)
            $('#levelButton').click(function(){
                $.ajax({
                    url:'resetvida.php',
                    type:'POST',
                    data:{
                        id: localStorage.char,
                        id2: localStorage.char2
                    },
                });





                // trocar inimigo
                let char2 = localStorage.char2;
                let char2int = parseInt(char2, 10);
                let char2ready = char2int + 1;

                localStorage.char2 = char2ready;

                if(localStorage.char == localStorage.char2){
                    char2ready = char2int + 2;
                    localStorage.char2 = char2ready;
                }
                localStorage.weapon2 = localStorage.char2;


                if(localStorage.char2 > 8){
                    window.location.href = "./endgame.php";
                }
                
                window.location.href = "./game.php";
            });

        }
        // tela de derrota
        if(health.innerHTML <= 0){
            container[0].innerHTML = '<img style="height: 90vh; box-shadow: 0px 0px 100px black;" src="https://is.gd/nighttales_' + localStorage.char2 + '">';

            setTimeout(() => {
                container[0].innerHTML = defaultContainer;
                container[0].style.display = "none";
                loseBox[0].style.display = "";
            }, 5000);
            let loseBox = document.getElementsByClassName("loseBox");
            loseBox[0].style.backgroundImage = "url('./assets/backgrounds/" + localStorage.char2 + ".jpg')"

            let ataquesRealizados2 = document.getElementById("ataquesRealizados2");
            let ataquesRecebidos2 = document.getElementById("ataquesRecebidos2");

            ataquesRealizados2.innerHTML = "Ataques Realizados: " + cliqueAtaque;
            ataquesRecebidos2.innerHTML = "Ataques Recebidos: " + cliqueRecebe;

            $('#loserButton').click(function(){
                $.ajax({
                    url:'reset.php',
                    type:'POST',
                    data:{
                        id: localStorage.char,
                        id2: localStorage.char2
                    },
                });

                window.location.href = "./home.php"

            });
        }
        setTimeout(() => {
            endgame();
        }, 300);
    }, 500);
}
endgame();



//VERIFICAR PERMISSAO DE PERSONAGENS NO MODAL
function verPermissao() {
    let imagens = document.getElementsByClassName("selectCharacter");
    let cInfo = document.getElementsByClassName("cInfo");
    
    let imagens2 = document.getElementsByClassName("selectWeapon");
    let cInfoW = document.getElementsByClassName("cInfoW");

    let perms = parseInt(localStorage.perms, 10)
    for (var i = 0; i < imagens.length; i++){
        if(parseInt(imagens[i].alt, 10) > perms){
            imagens[i].style.filter = "brightness(0)";
            imagens[i].style.pointerEvents = "none";
            cInfo[i].style.color = "transparent";
            cInfo[i].style.textShadow = "0 0 10px rgba(255, 255, 255, 0.5)";

            imagens2[i].style.filter = "brightness(0)";
            imagens2[i].style.pointerEvents = "none";
            cInfoW[i].style.color = "transparent";
            cInfoW[i].style.textShadow = "0 0 10px rgba(255, 255, 255, 0.5)";
        }
    }
}
verPermissao();



//DEFINIR IMAGENS E QUANTIDADE DE VIDA

var health = function (tempo) {
    $.ajax({
        url: 'selectHealth.php',
        type: 'GET',
        data:{
            id: localStorage.char
        },

        success: function (data){
            $('#imgP1').attr('src', './assets/characters/' + localStorage.char + '.png');
            $('.img-button:eq(0)').attr('src', './assets/weapons/special/' + localStorage.weapon + '.png');
            $('.img-button:eq(1)').attr('src', './assets/weapons/special/' + localStorage.weapon + '.png');
            if(cliqueSpecial < 3){
                $('.img-button:eq(0)').css({
                    "filter": "opacity(0.2)"
                });
            }

            $('.img-button:eq(2)').attr('src', './assets/weapons/' + localStorage.weapon + '.png');
            $('.img-button:eq(3)').attr('src', './assets/weapons/' + localStorage.weapon + '.png');

            $('#imgP2').attr('src', './assets/characters/' + localStorage.char2 + '.png');
            $('.img-button-enemy:eq(0)').attr('src', './assets/weapons/' + localStorage.weapon2 + '.png');

            $('#health').html(data);
            setTimeout(function(){
                health(tempo); },
            tempo * 100);
            },
    });
}
health(1);

var health2 = function (tempo) {
    $.ajax({
        url: 'selectHealth.php',
        type: 'GET',
        data:{
            id: localStorage.char2
        },

        success: function (data){
            $('#health2').html(data);
            setTimeout(function(){
                health2(tempo); },
            tempo * 100);
            },
    });
}
health2(1);

// IMPRIMIR QUANTIDADE DE CURAS
var heal = function (tempo) {
    $.ajax({
        url: 'selectHeal.php',
        type: 'POST',
        data:{
            nome: localStorage.nome
        },

        success: function (data){
            $('#heal').html(data);
            setTimeout(function(){
                heal(tempo); },
            tempo * 100);
            },
    });
}
heal(1);

var heal2 = function (tempo) {
    $.ajax({
        url: 'selectHeal2.php',
        type: 'GET',
        data:{
            id: localStorage.char2
        },

        success: function (data){
            $('#heal2').html(data);
            setTimeout(function(){
                heal2(tempo); },
            tempo * 100);
            },
    });
}
heal2(1);



// REALIZAR ATAQUE
var cliqueAtaque = 0;
$(document).ready(function(){
    $(".ataque").on('click', function(){
        cliqueAtaque += 1;
        $.ajax({
            url:'ataque.php',
            type:'POST',
            data:{
                id: localStorage.char,
                id2: localStorage.char2,
                arma: localStorage.weapon,
                arma2: localStorage.weapon2
            },
            success:function(data){
                $('#verificar').html(data);
            }
        });
    });
});

// REALIZAR ATAQUE ESPECIAL

$(document).ready(function(){
    $(".special").on('click', function(){
        if(cliqueSpecial >= 3){
            cliqueAtaque += 1;
            $.ajax({
                url:'special.php',
                type:'POST',
                data:{
                    id: localStorage.char,
                    id2: localStorage.char2,
                    arma: localStorage.weapon
                },
                success:function(data){
                    $('#verificar').html(data);
                }
            });
        }
    });
});



// REALIZAR CURA

$(document).ready(function(){
    $(".cura").on('click', function(){
        $.ajax({
            url:'cura.php',
            type:'POST',
            data:{
                nome: localStorage.nome,
                id: localStorage.char,
                id2: localStorage.char2
            },
            success:function(data){
                $('#verificar').html(data);
            }
        });
    });
});