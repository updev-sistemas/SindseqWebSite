$(function(){

    function limpar(){
        $("#nome,#email,#conteudo,#assunto").val("");
        $("#motivo").val(0);
    }


    $("#btnSalvar").click(function(){
        var dados = {
            token:$("#token").val(),
            nome:$("#nome").val(),
            email:$("#email").val(),
            assunto:$("#assunto").val(),
            conteudo:$("#conteudo").val(),
            motivo:$("#motivo").val()
        }
        $.ajax({
            url:"./ajax/faleconosco.ajax.php",
            method:"post",
            data:dados,
            dataType:"html",
            beforeSend:function(){
                $(".alert").hide();
            },
            success:function(response) {
                if(response==='ok') {
                    $("#msgSuccess").show();
                } else {
                    $("#msgError").show();
                }
            },
            error:function(response) {

            },
            complete:function(){
                limpar();
            }
        });
    });
});