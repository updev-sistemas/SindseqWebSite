
function salvar()
{
    var dados = {
        token:$("#token").val(),
        codigo: $("#codigo").val(),
        acao:"edit",
        tipo:$("#tipo").val(),
        status:$("#status").val()
    };
    $.ajax({
        url:"./logic/usuario.ajax.php",
        method:"post",
        data:dados,
        dataType:"html",
        beforeSend:function(){
            $("#msgSuccessReg,#msgErrorReg").hide();
        },
        success:function(resposta) {
            if(resposta==='ok') {
                $("#msgSuccessReg").show();
            } else {
                $("#msgErrorReg").show();
            }
        },
        error:function(r,a){}
    });
}

$("#btnRegistro").click(function() {
    salvar();
});

$("#email").change(function(){
    var params = {
        token:$("#token").val(),
        email:$("#email").val(),
        acao:"vemail"
    };
    $.ajax({
        url:"./logic/usuario.ajax.php",
        method:"post",
        data:params,
        dataType:"html",
        beforeSend:function(){
            $("#msgErrorEmail").hide();
        },
        success:function(resposta) {
            if(resposta==='ok') {

            } else {
                $("#msgErrorEmail").show();
                $("#email").val("");
            }
        },
        error:function(r,a){}
    });
}).focus(function(){
    $("#msgErrorEmail,#msgErrorEmail2").hide();
});

