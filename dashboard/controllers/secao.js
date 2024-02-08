
$("#tbSecao").DataTable();

$("#tbSecao").on("click",".btn-rm",function(e){

    var item = $(this).attr("secao");

    if(confirm("Deseja realmente remover esta seção?"))
    {
        var dados = {token:$("#token").val(),acao:"rm", secao:item};

        $.ajax({
            url:'./logic/secao.ajax.php',
            method:'post',
            data:dados,
            dataType:'html',
            success:function(response){
                if(response==='ok') {
                    var linha = "#s" + dados.secao;
                    $(linha).remove();
                    alert("Seção Removida. As categorias desta seção foram realocadas para a seção Livre");
                } else {
                    alert("Não foi possível remover esta seção!");
                }
            },
            error:function(r) {
                console.log(r);
            }
        });
    }
    else
    {
        return false;
    }

});


$("#btnRegistro").click(function(){
    if($("#nome").val()!=="") {
        var dados = {
            token: $("#token").val(),
            acao: "nsecao",
            termo: $("#nome").val()
        };

        $.ajax({
            url: "./logic/secao.ajax.php",
            data: dados,
            dataType: "html",
            method: "post",
            success: function (response) {
                if (response === 'ok') {
                    location.reload();
                    $("#nome").val("");
                }
            }, error: function (r, e) {
                $("#nome").val("");
                alert(r);
            }
        });
        return true;
    } else {
        alert("Digite o nome desta nova seção!");
        $("#nome").focus();
        return false;
    }
});