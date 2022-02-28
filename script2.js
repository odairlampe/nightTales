function actions(e) {
    setTimeout(() => {
        let action = document.querySelectorAll(".action");
        let action2 = document.querySelectorAll(".action2");
        let img = document.querySelectorAll(".img-button");
        var verificarcura = document.getElementById('heal').innerHTML;
        var verificarcura2 = parseInt(verificarcura, 10)
        var verificarvida = document.getElementById('health').innerHTML;
        var verificarvida2 = parseInt(verificarvida, 10)
        if(e.alt == "cura"){
            if(verificarcura2 > 0 && verificarvida2 < 100){
                for (const i in action) {
                    action[i].classList.add("hide");
                    action2[i].classList.remove("hide");
                    for (let j = 0; j < img.length; j++) {
                    img[j].style.filter = "opacity(0.2)";
                    
                        setTimeout(() => {
                            action[i].classList.remove("hide")
                            action2[i].classList.add("hide")
                            for (let i = 0; i < img.length; i++) {
                                img[i].style.filter = "opacity(1)";
                            }
                        }, 5000);
                    }
                }
            }
        }
        if(e.alt == "ataque"){
            for (const i in action) {
                action[i].classList.add("hide");
                action2[i].classList.remove("hide");
                for (let j = 0; j < img.length; j++) {
                img[j].style.filter = "opacity(0.2)";
                
                    setTimeout(() => {
                        action[i].classList.remove("hide")
                        action2[i].classList.add("hide")
                        for (let i = 0; i < img.length; i++) {
                            img[i].style.filter = "opacity(1)";
                        }
                    }, 5000);
                }
            }
        }
        if(e.alt == "special"){
            if(cliqueSpecial >= 3){
                cliqueSpecial = 0;
            for (const i in action) {
                action[i].classList.add("hide");
                action2[i].classList.remove("hide");
                for (let j = 0; j < img.length; j++) {
                img[j].style.filter = "opacity(0.2)";
                
                    setTimeout(() => {
                        action[i].classList.remove("hide")
                        action2[i].classList.add("hide")
                        for (let i = 0; i < img.length; i++) {
                            img[i].style.filter = "opacity(1)";
                        }
                    }, 5000);
                }
            }
        }
    }
    }, 10);
}

// BOTAO DE MENU PRINCIPAL INGAME
function mainmenu(){
    if(window.confirm("O PROGRESSO SERÁ PERDIDO! DESEJA CONTINUAR?")){
        window.location.href = "./index.php"
    }
}
        
// BOTAO DE COMPRAR ATADURA
$(document).ready(function(){
    $('#comprarAtadura').click(function() {
        console.log("AAAAA");
        $.ajax({
            url:'compraratadura.php',
            type:'POST',
            data:{
                nome: localStorage.nome
            },
        });
    })
});



// HEALTH BAR

window.onload = function loadFunction(){
        let bar = document.getElementById("bar-in");
        let bar2 = document.getElementById("bar-in2");

        healthBar();
        soundtrack();

        function healthBar(){
            let health = document.getElementById("health");
            let health2 = document.getElementById("health2");

            bar.style.width = health.innerHTML + "%";
            bar2.style.width = health2.innerHTML + "%";

            setTimeout(() => {
                healthBar();
            }, 300);
        }
            // musica de fundo
            function soundtrack(){
                let r = Math.floor(Math.random() * (4 - 1)) + 1;
                let audio = new Audio('./assets/audios/track' + r + '.mp3');
                audio.volume = 0.1;
                audio.play();
             }
 }; 

 // SOUND EFFECTS
 let cliqueRecebe = 0;
 let cliqueSpecial = 0;
 $('.ataque').click(function(){
        let r1 = Math.floor(Math.random() * (6 - 1)) + 1;
        var audio1 = new Audio('./assets/audios/weapons/' + localStorage.weapon + '/' + r1 + '.mp3');
        audio1.play();
    //character harm sound
    setTimeout(() => {
        let r2 = Math.floor(Math.random() * (6 - 1)) + 1;
        var audio2 = new Audio('./assets/audios/wounds/' + localStorage.char2 + '/' + r2 + '.mp3');
        audio2.play();
    }, 150);
    //recebendo dano ou inimigo curando
    setTimeout(() => {
        var verificar = document.getElementById('verificar');
        var verificarfim = parseInt(document.getElementById('health2').innerHTML, 10);
        if(verificar.innerHTML == "ataque"){
            setTimeout(() => {
                let r3 = Math.floor(Math.random() * (6 - 1)) + 1;
                var audio3 = new Audio('./assets/audios/wounds/' + localStorage.char + '/' + r3 + '.mp3');
                audio3.play();
                cliqueRecebe += 1;
                cliqueSpecial += 1;
            }, 200);
            setTimeout(() => {
                let r4 = Math.floor(Math.random() * (6 - 1)) + 1;
                var audio4 = new Audio('./assets/audios/weapons/' + localStorage.weapon2 + '/' + r4 + '.mp3');
                audio4.play();
            }, 50);
        }
        if(verificar.innerHTML == "" && verificarfim > 0){
            var audio5 = new Audio('./assets/audios/healing/1.mp3');
            audio5.play();
        }
        verificar.innerHTML = "";
    }, 4100);
});



$('.special').click(function(){
if(cliqueSpecial >= 3){
    let r1 = Math.floor(Math.random() * (6 - 1)) + 1;
    var audio1 = new Audio('./assets/audios/weapons/' + localStorage.weapon + '/' + r1 + '.mp3');
    audio1.play();
    var special = new Audio('./assets/audios/weapons/special.mp3')
    special.volume = 0.2
    special.play();
//character harm sound
setTimeout(() => {
    var scream = new Audio('./assets/audios/wounds/scream.mp3');
    scream.play();
}, 150);
//recebendo dano ou inimigo curando
setTimeout(() => {
    var verificar = document.getElementById('verificar');
    var verificarfim = parseInt(document.getElementById('health2').innerHTML, 10);
    if(verificar.innerHTML == "ataque"){
        setTimeout(() => {
            let r3 = Math.floor(Math.random() * (6 - 1)) + 1;
            var audio3 = new Audio('./assets/audios/wounds/' + localStorage.char + '/' + r3 + '.mp3');
            audio3.play();
            cliqueRecebe += 1;
            cliqueSpecial += 1;

        }, 200);
        setTimeout(() => {
            let r4 = Math.floor(Math.random() * (6 - 1)) + 1;
            var audio4 = new Audio('./assets/audios/weapons/' + localStorage.weapon2 + '/' + r4 + '.mp3');
            audio4.play();
        }, 50);
    }
    if(verificar.innerHTML == "" && verificarfim > 0){
        var audio5 = new Audio('./assets/audios/healing/1.mp3');
        audio5.play();
    }
    verificar.innerHTML = "";
}, 4100);
}
});


 $('.cura').click(function() {
        var verificarcura = parseInt(document.getElementById('heal').innerHTML, 10);
         var verificarvida = parseInt(document.getElementById('health').innerHTML, 10);
         var verificarfim = parseInt(document.getElementById('health2').innerHTML, 10);
         setTimeout(() => {
             if(verificarfim <= 0 || verificarvida == 100 || verificarcura == 0){
             }
             else{
                var audio6 = new Audio('./assets/audios/healing/1.mp3');
                audio6.play();
             }
         }, 100);

    setTimeout(() => {
        var verificar = document.getElementById('verificar');
        if(verificar.innerHTML == "ataque"){
            setTimeout(() => {
                let r3 = Math.floor(Math.random() * (6 - 1)) + 1;
                var audio3 = new Audio('./assets/audios/wounds/' + localStorage.char + '/' + r3 + '.mp3');
                audio3.play();
                cliqueSpecial += 1;
            }, 200);
            setTimeout(() => {
                let r4 = Math.floor(Math.random() * (6 - 1)) + 1;
                var audio4 = new Audio('./assets/audios/weapons/' + localStorage.weapon2 + '/' + r4 + '.mp3');
                audio4.play();
            }, 50);
            verificar.innerHTML = "";
        }
    }, 4100);
});


function specialBar(){
    let bar = document.getElementById("specialBar-in");
    if(cliqueSpecial == 0){
        bar.style.width = "85%"
    }
    if(cliqueSpecial == 1){
        bar.style.width = "66%"
    }
    if(cliqueSpecial == 2){
        bar.style.width = "33%"
    }
    if(cliqueSpecial == 3){
        bar.style.width = "0%"
    }
    setTimeout(() => {
        specialBar();
    }, 100);
}
specialBar();