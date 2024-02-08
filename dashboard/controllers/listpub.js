$("#tbPublicacao").DataTable();

$(".btn-excluir").click(function(){

    var dados = {
        token: $.token,
        acao:'rm',
        pub:$(this).attr("publicacao")
    };



});