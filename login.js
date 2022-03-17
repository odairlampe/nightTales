// verificar login no banco de dados
var login = function (tempo) {
    $.ajax({
        url: 'login.php',
        type: 'POST',
        data:{
            nome: $('input[name="nome"]').val(),
            senha: $('input[name="senha"]').val(),
        },

        success: function (data){
            $('#verificarLogin').html(data);
            setTimeout(function(){
                login(tempo); },
            tempo * 100);
            },
    });
}
login(1);


//salvar login no localstorage
$(document).ready(function(){
    $("#login").on('click', function(){
        let verificar = document.getElementById("verificarLogin");
        if(verificar.innerHTML != undefined){
            localStorage.nome = verificar.innerHTML;
        }
    });
});


//botao deslogar encerra sessao e apaga localstorage
$(document).ready(function(){
    $("#deslogar").on('click', function(){
        localStorage.nome = "";
        window.location.href="logout.php";
    });
});

//cadastrar
$(document).ready(function(){
    $("#cadastro").on('click', function(){
        let nome = $('input[name="cNome"]').val();
        let senha = $('input[name="cSenha"]').val();
        let idade = $('input[name="cIdade"]').val();
        let cidade = $('input[name="cCidade"]').val();
        if(nome != "" && senha != "" && idade != "" && cidade != ""){
            $.ajax({
                url:'cadastro.php',
                type:'POST',
                data:{
                    nome: $('input[name="cNome"]').val(),
                    senha: $('input[name="cSenha"]').val(),
                    idade: $('input[name="cIdade"]').val(),
                    cidade: $('input[name="cCidade"]').val(),
                },
                success:function(data){
                    $('#avisocadastro').html(data);
                }
            });
        }else{
            $('#avisocadastro').html("É preciso preencher todos os campos!");
        }
    });
});


// verificar permissoes de personagens
var perms = function(){
    $.ajax({
        url: 'permissoes.php',
        type: 'POST',
        data:{
            nome: localStorage.nome
        },

        success: function (data){
            $('#verificarPermissao').html(data);
            setTimeout(() => {
                perms();
            }, 1000);
        },
    });
}
perms();


function salvarPerms(){
    setTimeout(() => {
        let perms = document.getElementById("verificarPermissao").innerHTML;
        localStorage.perms = perms;
        salvarPerms();
    }, 1000);
};
salvarPerms();








// buscar money no banco de dados
var money = function(){
    $.ajax({
        url: 'money.php',
        type: 'POST',
        data:{
            nome: localStorage.nome
        },

        success: function (data){
            $('#money').html(data);
            setTimeout(() => {
                money();
            }, 300);
        },
    });
}
money();