
function limpar() {
    $(".form-control").val("");
    $("#tipo").val("-");
}


function validar() {
    var flag = true;
    if($("#nome").val()==='') { $("#nome").focus(); $("#msgErrorNome").show(); flag = false; }
    if($("#sobrenome").val()==='') { $("#sobrenome").focus(); $("#msgErrorSobrenome").show(); flag = false; }
    if($("#email").val()==='') { $("#email").focus(); $("#msgErrorEmail2").show(); flag = false; }
    if($("#username").val()==='') { $("#username").focus(); $("#msgErrorUser2").show();  flag = false; }
    if($("#tipo").val()==='-') { $("#tipo").focus(); $("#msgErrorTipo").show(); flag = false; }

    return flag;
}



function salvar()
{
    var dados = {
        token:$("#token").val(),
        nome:$("#nome").val(),
        sobrenome:$("#sobrenome").val(),
        email:$("#email").val(),
        login:$("#username").val(),
        tipo:$("#tipo").val(),
        acao:"novo"
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
                limpar();
            } else {
                $("#msgErrorReg").show();
            }
        },
        error:function(r,a){}
    });
}

$("#btnRegistro").click(function() {
    $("#msgSuccessReg,#msgErrorReg").hide();
    if(validar()){
        salvar();
    }
    return false;
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

$("#nome").focus(function(){
    $("#msgErrorNome").hide();
});

$("#sobrenome").focus(function(){
    $("#msgErrorSobrenome").hide();
});

$("#tipo").focus(function(){
    $("#msgErrorTipo").hide();
});


$("#username").change(function(){
    var params = {
        token:$("#token").val(),
        username:$("#username").val(),
        acao:"vuser"
    };
    $.ajax({
        url:"./logic/usuario.ajax.php",
        method:"post",
        data:params,
        dataType:"html",
        success:function(resposta) {
            if(resposta==='ok') {

            } else {
                $("#msgErrorUser").show();
                $("#username").val("");
            }
        },
        error:function(r,a){}
    });
}).focus(function(){
    $("#msgErrorUser,#msgErrorUser2").hide();
});